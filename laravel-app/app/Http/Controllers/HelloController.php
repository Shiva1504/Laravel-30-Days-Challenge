<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    // Method to return a greeting
    public function index()
    {
        return "Hello from Controller!";
    }

    // Method with parameter
    public function showUser($id)
    {
        return "User ID from Controller: " . $id;
    }
}
