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
        'students.user',
        'sections' => function($q){
        	$q->orderBy('orderInt');
        }
      ])->withCount(['students','reviews'])->get();

      $related = $course->relatedCourses();
      // dd($course);
      $colors = array('panel-success','panel-warning','panel-danger','panel-col-pink','panel-col-cyan','panel-col-teal');
      //van de 0 a 5

      return view('courses.courseDetail', compact('course','colors'));
    }

    public function episode(){
    	return view('courses.episode');
    }
}
