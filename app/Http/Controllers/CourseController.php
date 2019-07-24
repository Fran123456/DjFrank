<?php

namespace App\Http\Controllers;
use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Course $course){
      $course->load([
        'category',
        'goals',
        'level',
        'requirements',
        'reviews.user',
        'administrator',
        'sections' => function($q){
        	$q->orderBy('orderInt');
        }
      ])->withCount(['students','reviews'])->get();

      $related = $course->relatedCourses();
     // dd($course);
      return view('courses.courseDetail', compact('course'));
    }
}
