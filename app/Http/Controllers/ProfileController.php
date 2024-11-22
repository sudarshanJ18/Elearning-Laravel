<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class ProfileController extends Controller
{
    // Show the user's profile
    public function show()
    {
        $user = Auth::user(); // Get logged in user
        return view('profile.show', compact('user')); // Return the profile view with user data
    }

    // Update user profile details
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            // Add validation rules for other fields as needed
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save(); // Save updated data

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully!');
    }

    // Change user password
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->password = Hash::make($request->new_password); // Hash and save new password
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Password changed successfully!');
    }
}
