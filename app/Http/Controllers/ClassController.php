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


}
