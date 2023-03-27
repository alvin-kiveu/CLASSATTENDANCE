<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function AddStudent(Request $request){
        $studentname = $request->input('studentname');
        $password = $request->input('password');
        $courseid = $request->input('courseid');
        //CONVERT STUDENT NAME TO LOWER CASE
        $studentnameemail = strtolower($studentname);
        //REMOVE SPACES FROM THE STUDENT NAME
        $studentnameemail = str_replace(' ', '', $studentnameemail);
        //CREATE A STUDENT EMAIL FROM THE STUDENT NAME AND APPEND @student.ac.ke
        $studentemail = $studentnameemail . "@student.ac.ke";
        
        $studentid = DB::table('students')->count();
        //ENCRIPT THE PASSWORD
        $password = md5($password);
        //CREATE A STUDENT ID ACCODEING TO NUMBER OF STUDENTS REGISTERED
        $studentid = "STU" . $studentid;
        $data = array('studentid' => $studentid, 'studentname'=>$studentname, 'studentemail' => $studentemail, 'password' => $password, 'courseid'=>$courseid);
        DB::table('students')->insert($data);
        return redirect()->back()->with('success', 'Student Added Successfully');
    }
}
