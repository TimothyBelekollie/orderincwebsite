<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        // Retrieve all users with the role 'Admin_001'
        $users = User::where('user_role', '!=', 'Admin_001')->get();

        // Pass the users to the index view
        return view('backend.users.index', compact('users'))
            ->with('success', count($users) . ' users retrieved successfully.');
    }


    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('backend.users.create'); // Return the create user form view
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',


        ]);

      #  $validated['password'] = Hash::make($validated['password']); // Hash the password
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $password="password";
        $user->user_role="Admin_user";
        $user->password=Hash::make($password);
        $user->save();


        // User::create($validated); // Create a new user

        return redirect()->route('backend.users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id); // Find the user or return 404
        return view('backend.users.edit', compact('user')); // Pass user to the view
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // Find the user or return 404

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // Allow the current email
           // 'password' => 'nullable|string|min:8|confirmed',
           // 'phone' => 'nullable|string|max:15',
            // 'user_role' => 'required|string'
        ]);

        // if ($request->filled('password')) {
        //     $validated['password'] = Hash::make($validated['password']); // Hash the password if provided
        // } else {
        //     unset($validated['password']); // Do not update the password if it's not provided
        // }

        $user->update($validated); // Update the user

        return redirect()->route('backend.users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id); // Find the user or return 404

        $user->delete(); // Delete the user

        return redirect()->route('backend.users.index')->with('success', 'User deleted successfully.');
    }
}
