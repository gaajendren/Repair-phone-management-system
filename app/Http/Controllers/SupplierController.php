<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();

        return view('admin/supplier/view', compact('suppliers'));
    }



    public function store(Request $request)
    {
      
       

        $rules =[
            'company_name' => 'required|string|max:255', 
            'email' => 'required|string|max:255',  
            'contact' => 'required|string|max:255',  
            'address' => 'required|string|max:255',  

        ];

        $messages = [
            'company_name.required' => 'The name field is required.',
            'address.required' => 'The device field is required.',
            'email.required' => 'The name field is required.',
            'contact.required' => 'The device field is required.',
        ];
    
        
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->route('supplier.view')->withErrors($validator)->withInput();
        }

    
        $input = $request->all();
          
        
        Supplier::create($input);
        
        return redirect()->route('supplier.view')->with('success', 'User created successfully.');
    }
    

  
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);
        return view('admin/supplier/edit',compact('supplier'));
    }

    
    public function update(Request $request, string $id)
    {
    
        $supplier = Supplier::findOrFail($id);


        $rules =[
            'company_name' => 'required|string|max:255', 
            'email' => 'required|string|max:255',  
            'contact' => 'required|string|max:255',  
            'address' => 'required|string|max:255',  

        ];

        $messages = [
            'company_name.required' => 'The name field is required.',
            'address.required' => 'The device field is required.',
            'email.required' => 'The name field is required.',
            'contact.required' => 'The device field is required.',
        ];
    
       
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


    
    
      $input = $request->all();
      
        $supplier->update($input);
    
        return redirect()->route('supplier.view')->with('success', 'User updated successfully.');
    
    }


    
    public function destroy($id)
    {
        Supplier::find($id)->delete();

        return redirect()->route('supplier.view')->with('success', 'Vechicle deleted successfully.');
    }
}
