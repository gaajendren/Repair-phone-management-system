<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Category::all();

        return view('admin/category/view', compact('categories'));
    }



    public function store(Request $request)
    {
      
       

        $rules =[
            'name' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'device' => 'required|string|max:255',  
        ];

        $messages = [
            'name.required' => 'The name field is required.',
            'img.required' => 'The image field is required.',
            'img.image' => 'The image must be an image file.',
            'img.mimes' => 'The image must be a file of jpeg,png,jpg,gif',
            'img.max' => 'The image may not be greater than 2048 kilobytes.',
            'device.required' => 'The device field is required.',
        ];
    
        
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->route('category.view')->withErrors($validator)->withInput();
        }

      
            $image = $request->file('img');
            $imagePath = $image->store('categoty_picture', 'public'); 
    
            $input = $request->all();
            $input['img'] = $imagePath;
        
        Category::create($input);
        
        return redirect()->route('category.view')->with('success', 'User created successfully.');
    }
    
  
    public function show(Category $category)
    {
        
    }

  
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('admin/category/edit',compact('category'));
    }

    
    public function update(Request $request, string $id)
    {
    
        $category = Category::findOrFail($id);


        $rules = [
            'name' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'device' => 'required|string|max:255',  
        ];

        $messages = [      
            'img.image' => 'The image must be an image file.',
            'img.mimes' => 'The image must be a file of jpeg,png,jpg,gif',
            'img.max' => 'The image may not be greater than 2048 kilobytes.',
        ];
    
       
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


      $image = $request->file('img');
      $imagePath = $image->store('categoty_picture', 'public'); 
    
      $input = $request->all();
      $input['img'] = $imagePath;

        $category->update($input);
    
        return redirect()->route('category.view')->with('success', 'User updated successfully.');
    
    }


    
    public function destroy(Category $category , $id)
    {
        Category::find($id)->delete();

        return redirect()->route('category.view')->with('success', 'Vechicle deleted successfully.');
    }
}
