<?php

namespace App\Http\Controllers;
use App\Course;
use Illuminate\Http\Request;
use App\Episode;
use App\Mail\NewStudentInCourse;
use App\Student;
use Illuminate\Support\Facades\DB;

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

    //  $users = Course::where('id' , $course->id)->first()->with('students.user')->paginate();

    $users = DB::table('course_student')
                ->join('students', 'students.id', '=', 'course_student.student_id')
                ->join('users', 'users.id', '=', 'students.user_id')
                ->select('users.*')
                ->where('course_student.course_id', $course->id)
                ->paginate(20);


    return view('courses.courseDetail', compact('course','colors','users'));
    }

    public function episode(Course $course, Episode $episode){
      dd($episode);
    	//return view('courses.episode');
    }

    public function inscribe (Course $course) {
  		$course->students()->attach(auth()->user()->student->id);
      //return  new NewStudentInCourse($course, "admin");
   		\Mail::to($course->administrator->user)->send(new NewStudentInCourse($course, auth()->user()->name));
  		return back()->with('message', [__("Te has inscrito correctamente al curso"),'bg-teal']);
  	}


    public function subscribed () {
  		$courses = Course::whereHas('students', function($query) {
  			$query->where('user_id', auth()->id());
  		})->get();
  		return view('courses.subscribed', compact('courses'));
  	}

}
