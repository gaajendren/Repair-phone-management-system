<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issues;

class DeviceController extends Controller
{
    public function fetchIssues(Request $request)
    {
        $device = $request->query('device');
        
        $issues = Issues::where('device', $device)->get(['id', 'name']);
        return response()->json($issues);
    }
}
