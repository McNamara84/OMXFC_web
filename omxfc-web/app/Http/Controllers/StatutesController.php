<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatutesController extends Controller
{
    public function index()
    {
        return view('statutes'); // Return the statutes view
    }
}