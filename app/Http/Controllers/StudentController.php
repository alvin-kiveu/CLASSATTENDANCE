<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function AddStudent(Request $request)
    {
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
        $data = array('studentid' => $studentid, 'studentname' => $studentname, 'studentemail' => $studentemail, 'password' => $password, 'courseid' => $courseid);
        DB::table('students')->insert($data);
        return redirect()->back()->with('success', 'Student Added Successfully');
    }

    //STUDENT LOGIN API

    public function studentLogin(Request $request)
    {
        $studentRegNo = $request->input('studentRegNo');
        $userPass = $request->input('userPass');
        //ENCRYPT THE PASSWORD
        $userPass = md5($userPass);

        //CHECK IF USER EXIT IN students TABLE WITH THE PROVIDED REGISTRATION NUMBER AND PASSWORD
        $student = DB::table('students')->where('studentid', $studentRegNo)->where('password', $userPass)->first();
        if ($student) {
            //IF USER EXIST RETURN THE USER DETAILS
            return response()->json(
                [
                    'ResultCode' => '200',
                    'successMessage' => 'Successfully Logged In',
                ]
            );
        } else {
            //IF USER DOES NOT EXIST RETURN ERROR MESSAGE
            return response()->json([
                'ResultCode' => '201',
                'errorMessage' => 'Invalid Student Registration Number or Password',
            ]);
        }
    }

    public function getStudentiInfo(Request $request)
    {
        $studentRegNo = $request->input('studentRegNo');

        //CHECK IF USER EXIT IN students TABLE WITH THE PROVIDED REGISTRATION NUMBER AND PASSWORD
        $student = DB::table('students')->where('studentid', $studentRegNo)->first();
        if ($student) {
            //IF USER EXIST RETURN THE USER DETAILS
            $courseid = $student->courseid;
            $course = DB::table('classes')->where('classid', $courseid)->first();
            return response()->json(
                [
                    'ResultCode' => '200',
                    'successMessage' => 'User info fetch successfully',
                    'studentid' => $student->studentid,
                    'studentname' => $student->studentname,
                    'studentemail' => $student->studentemail,
                    'coursename' => $course->classname,
                ]
            );
        } else {
            //IF USER DOES NOT EXIST RETURN ERROR MESSAGE
            return response()->json([
                'ResultCode' => '201',
                'errorMessage' => 'Invalid Student Registration Number or Password',
            ]);
        }
    }


    public function studentiSign(Request $request)
    {
        $studentRegNo = $request->input('studentRegNo');
        $lessonId = $request->input('lessonId');

        //CHECK IF USER EXIT IN students TABLE WITH THE PROVIDED REGISTRATION NUMBER AND PASSWORD
        $student = DB::table('students')->where('studentid', $studentRegNo)->first();
        if ($student) {
            //GET LESSON DETAILS
            $lesson = DB::table('lesson')->where('lesssoncode', $lessonId)->first();
            //GET COURSE DETAILS
            $courseLesson = $lesson->classid;
            $lessonName = $lesson->name;
            //IF USER EXIST RETURN THE USER DETAILS
            $courseid = $student->courseid;
            //CHECK IF STUDENT IS REGISTERED FOR THE COURSE
            if ($courseLesson != $courseid) {
                return response()->json([
                    'ResultCode' => '201',
                    'errorMessage' => 'This lesson does not belong to your course',
                ]);
            } else {
                //CHECK IF STUDENT HAS ALREADY SIGNED IN FOR THE LESSON
                $studentSign = DB::table('student_sign')->where('studentid', $studentRegNo)->where('lessonid', $lessonId)->first();
                if ($studentSign) {
                    //IF STUDENT HAS ALREADY SIGNED IN FOR THE LESSON RETURN ERROR MESSAGE
                    return response()->json([
                        'ResultCode' => '201',
                        'errorMessage' => 'You have already signed in for this lesson',
                    ]);
                } else {
                    //IF STUDENT HAS NOT SIGNED IN FOR THE LESSON INSERT THE STUDENT SIGN IN DETAILS
                    $data = array('studentid' => $studentRegNo, 'lessonid' => $lessonId);
                    $insertdata = DB::table('student_sign')->insert($data);
                    if ($insertdata) {
                        $course = DB::table('classes')->where('classid', $courseid)->first();
                        return response()->json(
                            [
                                'ResultCode' => '200',
                                'successMessage' => 'User info fetch successfully',
                                'studentid' => $student->studentid,
                                'studentname' => $student->studentname,
                                'coursename' => $course->classname,
                                'lessonname' => $lessonName,
                            ]
                        );
                    } else {
                        return response()->json([
                            'ResultCode' => '201',
                            'errorMessage' => 'Error signing in',
                        ]);
                    }
                }
            }
        } else {
            //IF USER DOES NOT EXIST RETURN ERROR MESSAGE
            return response()->json([
                'ResultCode' => '201',
                'errorMessage' => 'Invalid Student Registration Number or Password',
            ]);
        }
    }

    //DELETE STUDENT

    public function deleteStudent(Request $request)
    {
        $studentid = $request->route('id');
        $deleteStudent = DB::table('students')->where('ID', $studentid)->delete();
        if ($deleteStudent == true) {
            return redirect()->back()->with('success', 'Student Deleted Successfully');
        } else {
            return redirect()->back()->with('error', 'Error Deleting Student');
        }
    }
}
