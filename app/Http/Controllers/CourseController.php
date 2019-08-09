<?php

namespace App\Http\Controllers;
use App\Course;
use Illuminate\Http\Request;
use App\Episode;
use App\Mail\NewStudentInCourse;
use App\Student;
use App\Reaction;
use Illuminate\Support\Facades\DB;
use App\review;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

  public function __construct(){
    $this->middleware('auth')->only(['episode']);
  }


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

      //$related = $course->relatedCourses();
      $colors = array('panel-success','panel-warning','panel-danger','panel-col-pink','panel-col-cyan','panel-col-teal');
      //van de 0 a 5
    $users = DB::table('course_student')
                ->join('students', 'students.id', '=', 'course_student.student_id')
                ->join('users', 'users.id', '=', 'students.user_id')
                ->select('users.*')
                ->where('course_student.course_id', $course->id)
                ->paginate(20);

    return view('courses.courseDetail', compact('course','colors','users'));
    }



    public function episode(Course $course, Episode $episode){
     // dd($episode);
      $help = Episode::__smart($episode->orderEpisode, $episode->section_id);
      $caps = Episode::__optional($episode->orderEpisode , $episode->section_id);
      $reactions = Reaction::get_reaction($episode->id);
      $myReaction = Reaction::my_reaction($episode->id, Auth::id());
    	return view('courses.episode', compact('episode','help', 'course','caps','reactions','myReaction'));
    }

    public function inscribe (Course $course) {
  		$course->students()->attach(auth()->user()->student->id);
      //return  new NewStudentInCourse($course, "admin");
   		\Mail::to($course->administrator->user)->send(new NewStudentInCourse($course, auth()->user()->name));
  		return back()->with('message', [__("Te has inscrito correctamente al curso"),'bg-teal']);
  	}

    public function reacction(Request $request){
     echo $request->value;
     
    $aux = Reaction::where('episode_id', $request->episode)
    ->where('user_id', $request->user)->first();

    if($aux != null){
      Reaction::find($aux->id)->update([
       'reaction'=>$request->value
      ]);
    }else{
       Reaction::create([
        'episode_id' =>$request->episode,
        'user_id' => $request->user,
        'reaction'=>$request->value,
       ]);
    }

     
    }
    public function subscribed () {
  		$courses = Course::whereHas('students', function($query) {
  			$query->where('user_id', auth()->id());
  		})->paginate(15);


  		return view('courses.subscribed', compact('courses'));
  	}

    public function addReview () {
    Review::create([
      "user_id" => auth()->id(),
      "course_id" => request('course_id'),
      "rating" => (int) request('rating_input'),
      "comment" => request('message')
    ]);
    return back()->with('message', [__("Has valorado el curso correctamente, Gracias!!"),'bg-teal']);
  }

  


}
