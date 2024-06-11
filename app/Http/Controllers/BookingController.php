<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Issues;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BookingController extends Controller
{
   
    public function index()
    {
        $bookings = Booking::all();
        $rows = User::where('role', '0')->get();
        return view('admin/booking/view', compact('bookings','rows'));
    }

    public function user_index()
    {   
      
       return view('user/book');
    }

    public function user_book(Request $request){

        $rules =[
            'date' =>'required',
            'issues_id' => 'required',
            'time' =>'required',
            'device' =>'required|string|max:255',
            'description' => 'required|string|max:255',  
            'brand' => 'required|string|max:255',  
            
        ];

        $messages = [
            'brand.required' => 'The brand field is required.',
            'issues_id.required' => 'The issue field is required.',
            'description.required' => 'The description field is required.',
            'status.required' => 'The status field is required.',
            'date.required' => 'The date field is required.',
            'time.required' => 'The time field is required.',
            'device.required' => 'The device field is required.',
        ];
    
        
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->route('book.view')->withErrors($validator)->withInput();
        }

        $user_id = auth()->user()->id;

        $input = $request->all();
        $input['user_id'] = $user_id;
          
        
        Booking::create($input);
        
        return redirect()->route('dashboard')->with('success', 'User created successfully.');
    }


    public function store(Request $request)
    {

        $rules =[
            'user_id' => 'required', 
            'date' =>'required',
            'time' =>'required',
            'device' =>'required|string|max:255',
            'description' => 'required|string|max:255',  
            'brand' => 'required|string|max:255',  
            'status' => 'required|string|max:255', 
        ];

        $messages = [
            'user_id.required' => 'The name field is required.',
            'brand.required' => 'The brand field is required.',
            'description.required' => 'The description field is required.',
            'status.required' => 'The status field is required.',
            'date.required' => 'The date field is required.',
            'time.required' => 'The time field is required.',
            'device.required' => 'The device field is required.',
        ];
    
        
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->route('booking.view')->withErrors($validator)->withInput();
        }

    
        $input = $request->all();
          
        
        Booking::create($input);
        
        return redirect()->route('booking.view')->with('success', 'User created successfully.');
    }


    public function user_status(){

        $id = auth()->user()->id;

        $booking = Booking::where('user_id', "$id")->get();
        return view('user/status' , compact('booking'));
    }
    

  
    public function edit(string $id)
    {
        $booking = Booking::find($id);
        $issue = Issues::all();
        $rows = User::where('role', '0')->get();
        return view('admin/booking/edit',compact('booking', 'rows', 'issue'));
    }

    
    public function update(Request $request, string $id)
    {
    
        $booking = Booking::findOrFail($id);

        $rules =[
            'user_id' => 'required', 
            'date' =>'required',
            'time' =>'required',
            'device' =>'required|string|max:255',
            'description' => 'required|string|max:255',  
            'brand' => 'required|string|max:255',  
            'status' => 'required|string|max:255', 
        ];

        $messages = [
            'user_id.required' => 'The name field is required.',
            'brand.required' => 'The brand field is required.',
            'description.required' => 'The description field is required.',
            'status.required' => 'The status field is required.',
            'date.required' => 'The date field is required.',
            'time.required' => 'The time field is required.',
            'device.required' => 'The device field is required.',
        ];


       
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    
      $input = $request->all();
      
        $booking->update($input);
    
        return redirect()->route('booking.view')->with('success', 'User updated successfully.');
    
    }


    
    public function destroy($id)
    {
        Booking::find($id)->delete();

        return redirect()->route('booking.view')->with('success', 'Vechicle deleted successfully.');
    }

    public function user_destroy($id)
    {
        Booking::find($id)->delete();

        return redirect()->route('status.view')->with('success', 'Vechicle deleted successfully.');
    }
}
