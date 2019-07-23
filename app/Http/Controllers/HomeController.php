<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $courses = Course::withCount(['students'])
        ->with('category','reviews')
        ->where('status', Course::PUBLISHED)
        ->latest()
        ->paginate(12);
  
        return view('home' ,compact('courses'));
    }
}
