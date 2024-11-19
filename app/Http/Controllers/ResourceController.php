<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resource; // Import the Resource model

class ResourceController extends Controller
{
    public function index()
    {
        // Fetch all resources from the database
        $resources = Resource::all();

        // Pass the resources to the view
        return view('resources.index', compact('resources'));
    }
}
