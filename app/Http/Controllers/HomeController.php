<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Issues;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Carbon;



class HomeController extends Controller
{
   
    public function index()
    {
        if (auth()->user()->role != 0) {
        
            return $this->redirectToRole(auth()->user()->role);
        }
        return view('user/dashboard');
    }


    public function adminHome()
    {
     
        if (auth()->user()->role != 1) {
         
            return $this->redirectToRole(auth()->user()->role);
        }

       $completed_booking_price = Booking::where('status', 'Completed')->sum('price');

       $total_booking = Booking::count();

       $completed_booking_count = Booking::where('status', 'Completed')->count();

       $startDate = Carbon::now()->startOfMonth();
       $endDate = Carbon::now()->endOfMonth();
   
       $completed_booking_sum_this_month = Booking::where('status', 'Completed')->whereBetween('created_at', [$startDate, $endDate])->sum('price');

   // Count total bookings where status is neither 'completed' nor 'cancelled'
       $total_booking_in_progress = Booking::whereNotIn('status', ['Completed', 'Cancelled'])->count();

       $completed_booking_sum_this_week = Booking::where('status', 'Completed')->whereBetween('created_at', [$startDate, $endDate])->sum('price');


       $data = DB::table('bookings')
       ->select(
           DB::raw('SUM(price) as total'),
           DB::raw('device'),
           DB::raw('MONTH(created_at) as month'),
           DB::raw('YEAR(created_at) as year')
       )
       ->where('status', 'Completed')
       ->where('created_at', '>=', Carbon::now()->subMonths(12))
       ->groupBy('device', 'year', 'month')
       ->orderBy('year', 'asc') 
       ->orderBy('month', 'asc') 
       ->get();

   $processedData = $this->processData($data);

   $data1 = DB::table('bookings')
   ->join('issues', 'bookings.issues_id', '=', 'issues.id')
   ->select(
       DB::raw('count(bookings.id) as total'),
       DB::raw('issues.name as issue_name')   
   )
   ->where('bookings.device', '=', 'Phone')
   ->groupBy('issues.name')
   ->get();

   $data2 = DB::table('bookings')
   ->join('issues', 'bookings.issues_id', '=', 'issues.id')
   ->select(
       DB::raw('count(bookings.id) as total'),
       DB::raw('issues.name as issue_name')   
   )
   ->where('bookings.device', '=', 'Laptop')
   ->groupBy('issues.name')
   ->get();

    $processedData1 = $this->processPieData($data1);
    $processedData2 = $this->processPieData($data2);

   return view('admin/dashboard', [
    'completed_booking_price' => $completed_booking_price,
    'total_booking' => $total_booking,
    'completed_booking_count' => $completed_booking_count,
    'completed_booking_sum_this_month' => $completed_booking_sum_this_month,
    'total_booking_in_progress' => $total_booking_in_progress,
    'completed_booking_sum_this_week' => $completed_booking_sum_this_week,
    'chartData' => json_encode($processedData),
    'pieChartData' => json_encode($processedData1),
    'pieChartData1' => json_encode($processedData2),
]);

    }



    private function processPieData($data)
    {   
        $colorPalette = [
            '#496989',  
            '#58A399',  
            '#A8CD9F',  
            '#E2F4C5',  
            '#9eaa89',  // Light Blue
            '#5a614e', // Light Purple
            '#717a62', // Light Gray
        ];
    
        $result = [
            'labels' => [],
            'datasets' => []
        ];
    
        // Initialize counter for iterating over predefined colors
        $colorIndex = 0;
    
        foreach ($data as $record) {
            $result['labels'][] = $record->issue_name;
        }
    
        $datasets = [
            [
                'label' => 'Phone',
                'data' => [],
                'backgroundColor' => [],
                'borderColor' => [],
                'borderWidth' => 1
            ]
        ];
    
        foreach ($data as $record) {
            if ($colorIndex < count($colorPalette)) {
                // Use predefined color
                $color = $colorPalette[$colorIndex];
            } else {
                // Generate random color
                $color = 'rgba(' . mt_rand(0, 255) . ', ' . mt_rand(0, 255) . ', ' . mt_rand(0, 255) . ', 1)';
            }
    
            $datasets[0]['data'][] = $record->total;
            $datasets[0]['backgroundColor'][] = $color;
            $datasets[0]['borderColor'][] = $color;
    
            $colorIndex++;
        }
    
        $result['datasets'] = $datasets;
    
        return $result;
    }
    


    private function processData($data)
{
    $devices = ['Laptop', 'Phone'];
    $months = [];
    $totals = [];


    for ($i = 12; $i >= 0; $i--) {
        $months[] = Carbon::now()->subMonths($i)->format('M Y');
    }

    foreach ($devices as $device) {
        $totals[$device] = array_fill(0, 13, 0);
    }

    foreach ($data as $record) {
        $key = Carbon::create($record->year, $record->month, 1)->format('M Y');
        $index = array_search($key, $months);
        if ($index !== false) {
            $totals[$record->device][$index] = $record->total;
        }
    }

    $result = [
        'labels' => $months,
        'datasets' => []
    ];

    foreach ($devices as $device) {
        $result['datasets'][] = [
            'label' => $device,
            'data' => $totals[$device],
            'fill' => false,
            'borderColor' => ($device == 'Laptop') ? 'rgba(75, 192, 192, 1)' : 'rgba(255, 159, 64, 1)',
            'tension' => 0.1
        ];
    }




    return $result;
}

   
    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    private function redirectToRole($role)
    {
        switch ($role) {
            case 1:
                return redirect()->route('home.admin');
            case 0:
                return redirect()->route('dashboard');
        }
    }
}
