<?php

namespace App\Http\Controllers;

use App\Models\Issues;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    
    public function index()
    {
        $issues = Issues::all();

        return view('admin/issue/view', compact('issues'));
    }



    public function store(Request $request)
    {
      
    

        $rules =[
            'name' => 'required|string|max:255',
            'device' => 'required|string|max:255',  
        ];

        $messages = [
            'name.required' => 'The name field is required.',
            'device.required' => 'The device field is required.',
        ];
    
        
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->route('Issues.view')->withErrors($validator)->withInput();
        }

      
       
    
            $input = $request->all();
           
        
        Issues::create($input);
        
        return redirect()->route('issue.view')->with('success', 'User created successfully.');
    }
    


  
    public function edit(string $id)
    {
        $issue = Issues::find($id);
        return view('admin/issue/edit',compact('issue'));
    }

    
    public function update(Request $request, string $id)
    {
    
        $issue = Issues::findOrFail($id);


        $rules = [
            'name' => 'required|string|max:255',
           
            'device' => 'required|string|max:255',  
        ];

        $messages = [      
            'name.required' => 'The name field is required.',
            'device.required' => 'The device field is required.',
        ];
    
       
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


    
    
      $input = $request->all();
     

        $issue->update($input);
    
        return redirect()->route('issue.view')->with('success', 'User updated successfully.');
    
    }


    
    public function destroy($id)
    {
        Issues::find($id)->delete();

        return redirect()->route('issue.view')->with('success', 'Vechicle deleted successfully.');
    }
}
