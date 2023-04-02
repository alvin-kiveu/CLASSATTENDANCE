<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\LessonModel;

class ClassController extends Controller
{
    public function addClass(Request $request)
    {
        $classname = $request->input('classname');
        $yearofstudy = $request->input('yearofstudy');
        //MAKE menuname TO BE WITH SAMLL LETTERS
        $classid = rand(100000, 999999);
        $data = array(
            'classid' => $classid,
            'classname' => $classname,
            'yearofstudy' => $yearofstudy,
        );
        $result = DB::table('classes')->insert($data);
        if ($result == true) {
            return redirect()->back()->with('success', 'Class added successfully');
        } else {
            return redirect()->back()->with('error', 'Class not added');
        }
    }

    public function getClass()
    {
        $classes = ClassModel::all();;
        return view('listclass', compact('classes'));
    }

    public function addLesson(){
        $classes = ClassModel::all();
        return view('addlesson', compact('classes'));
    }

    public function addlessonApp(Request $request)
    {
        $lessonname = $request->input('lessonname');
        $classid = $request->input('classid');
        $lesssoncode = rand(1000, 9999).'-'.rand(1000, 9999).'-'.rand(1000, 9999);

        $data = array(
            'name' => $lessonname,
            'classid' => $classid,
            'lesssoncode' => $lesssoncode,
        );
        $result = DB::table('lesson')->insert($data);
        if ($result == true) {
            return redirect()->back()->with('success', 'Lesson added successfully');
        } else {
            return redirect()->back()->with('error', 'Lesson not added');
        }
    }





    public function getLesson()
    {
        $lesson = LessonModel::all();;
        return view('listlesson', compact('lesson'));
    }

    //DELETE
    public function deleteClass(Request $request)
    {
        $id = $request->route('id');
        //GET LESSON
        $class = DB::table('classes')->where('ID', $id)->first();
        //GET LESSON ID
        $classid = $class->classid;
        //GET LESSON DETAILS
        $lesson = DB::table('lesson')->where('classid', $classid)->first();
        $lesssoncode = $lesson->lesssoncode;
        //DELETE ATTENDANCE
        $result = DB::table('student_sign')->where('lessonid', $lesssoncode)->delete();
        //DELETE LESSON
        $result = DB::table('lesson')->where('classid', $classid)->delete();
        //DELETE CLASS
        $result = DB::table('classes')->where('ID', $id)->delete();
        if ($result == true) {
            return redirect()->back()->with('success', 'Class deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Class not deleted');
        }
    }

    //DELETE LESSON

    public function deleteLesson(Request $request)
    {
        $id = $request->route('id');
        //GET LESSON
        $lesson = DB::table('lesson')->where('ID', $id)->first();
        //GET LESSON ID
        $lesssoncode = $lesson->lesssoncode;
        //DELETE ATTENDANCE
        $result = DB::table('student_sign')->where('lessonid', $lesssoncode)->delete();
        //DELETE LESSON
        $result = DB::table('lesson')->where('ID', $id)->delete();
        if ($result == true) {
            return redirect()->back()->with('success', 'Lesson deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Lesson not deleted');
        }
    }


}
