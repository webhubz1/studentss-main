<?php

namespace App\Http\Controllers;

use App\Models\Student;  // Import the Student model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get the total number of students
        $totalStudents = Student::count();

        // Pass the totalStudents variable to the view
        return view('home', compact('totalStudents'));
    }               
}
