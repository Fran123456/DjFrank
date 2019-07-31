<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Rules\StrengthPassword;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
     public function index () {
    	$user = auth()->user()->load('socialAccount', 'student','administrator');
    	$status = User::navigation();
    	$nCursos = DB::table('course_student')->where('student_id', $user->student->id)->get();
    	$nCursos = count($nCursos);
    	$sub = DB::table('subscriptions')->where('user_id' , Auth()->user()->id)->first();
    	//dd($user);
    	return view('profile.profile', compact('user','nCursos','sub'));
    }

    public function updatePassword () {
		$this->validate(request(), [
			'password' => ['confirmed', new StrengthPassword]
		]);

		$user = auth()->user();
		$user->password = bcrypt(request('password'));
		$user->save();
	    return back()->with('message', [__("Se ha actualizado correctamente la contraseña"),'bg-teal']);
    }

    public function password(){
    	return view('profile.password');
    }
}
