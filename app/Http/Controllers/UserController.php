<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $users =  User::all();
        return view('admin/user/view', compact('users'));
    }

    public function store(Request $request)
    {
        $rules = [
        'name' => 'required|string|max:255',
        'role' => 'required|integer|min:1|max:255',
        'email' => 'required|email|unique:users,email',
        'contact' => 'required|string|max:15', 
        'address' => 'required|string|max:255',
        'password' => 'required|string|min:8|confirmed',
        ];
    
      
        $messages = [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'role.required' => 'The role field is required.',
            'email.unique' => 'The email has already been taken.',
            'contact.required' => 'The contact number field is required.',
            'address.required' => 'The address field is required.',
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    
        
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $input = $request->all();
        
        $input['password'] = bcrypt($request->password);

        User::create($input);
        
        return redirect()->route('admin.user.view')->with('success', 'User created successfully.');

    }

   
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }

    
    public function update(Request $request, string $id)
    {
    
        $user = User::findOrFail($id);


        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'contact' => 'required|string|max:15',
            'address' => 'required|string|max:255',
         
        ];

        $messages = [      
            'email.unique' => 'The email has already been taken.',    
        ];
    
       
        $validator = Validator::make($request->all(), $rules, $messages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $input = $request->all();
        $user->update($input);
    
        return redirect()->route('admin.user.view')->with('success', 'User updated successfully.');
    
    }

  
    public function destroy(string $id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.user.view')->with('success', 'Vechicle deleted successfully.');
    }
}
