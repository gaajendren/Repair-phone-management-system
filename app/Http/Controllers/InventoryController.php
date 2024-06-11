<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Inventory;
use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    public function index()
    {
        $inventories = Inventory::all();
        $suppliers = Supplier::all();
        $categories = Category::all();

        return view('admin/inventory/view', compact('inventories', 'suppliers', 'categories'));
    }



    public function store(Request $request)
    {

        $rules =[
            'item_name' => 'required|string|max:255', 
            'brand' => 'required|string|max:255',  
            'description' => 'required|string|max:255',  
            'quantity' => 'required|integer',  
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',  
        ];

        $messages = [
            'item_name.required' => 'The name field is required.',
            'brand.required' => 'The device field is required.',
            'description.required' => 'The name field is required.',
            'quantity.required' => 'The device field is required.',
            'price.required' => 'The device field is required.',
        ];
    
        
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->route('inventory.view')->withErrors($validator)->withInput();
        }

    
        $input = $request->all();
          
        
        Inventory::create($input);
        
        return redirect()->route('inventory.view')->with('success', 'User created successfully.');
    }
    

  
    public function edit(string $id)
    {
        $inventory = Inventory::find($id);
        $suppliers = Supplier::all();
        $categories = Category::all();
        return view('admin/inventory/edit',compact('inventory', 'suppliers', 'categories'));
    }

    
    public function update(Request $request, string $id)
    {
    
        $inventory = Inventory::findOrFail($id);


        $rules =[
            'item_name' => 'required|string|max:255', 
            'brand' => 'required|string|max:255',  
            'description' => 'required|string|max:255',  
            'quantity' => 'required|integer',  
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',  

        ];

        $messages = [
            'item_name.required' => 'The name field is required.',
            'brand.required' => 'The device field is required.',
            'description.required' => 'The name field is required.',
            'quantity.required' => 'The device field is required.',
            'price.required' => 'The device field is required.',
        ];


       
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

    
      $input = $request->all();
      
        $inventory->update($input);
    
        return redirect()->route('inventory.view')->with('success', 'User updated successfully.');
    
    }


    
    public function destroy($id)
    {
        Inventory::find($id)->delete();

        return redirect()->route('inventory.view')->with('success', 'Vechicle deleted successfully.');
    }
}
