<?php

// app/Http/Controllers/AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        // Logic to show the user list
        return view('admin.users');
    }

    public function uploads()
    {
        // Logic to handle uploads
        return view('admin.uploads');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
