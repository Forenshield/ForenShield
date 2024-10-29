<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    function index() {
        return view('welcome');
    }
}
