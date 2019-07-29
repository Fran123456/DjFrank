<?php

namespace App\Mail;

use App\Course;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewStudentInCourse extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

     private $course;
   	private $student_name;


    public function __construct(Course $course, $student_name)
    {
      $this->course = $course;
      $this->student_name = $student_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
	        ->subject(__("Nuevo estudiante inscrito en tu curso"))
	        ->markdown('emails.new_student_in_course')
	        ->with('course', $this->course)
	        ->with('student', $this->student_name);
    }
}
