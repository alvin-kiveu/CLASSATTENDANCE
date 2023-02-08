<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\LessonModel;
use PDF;

class PagesController extends Controller
{
    public function appAddpage()
    {
        $menus = ClassModel::all();
        $submenus = LessonModel::all();
        return view('addpage', compact('menus', 'submenus'));
    }

    public function addPage(Request $request)
    {
        $pagename = $request->input('pagename');
        $menutype = $request->input('menutype');
        $menutypeid = $request->input('menutypeid');
        $submenutypeid = $request->input('submenutypeid');
        $content = $request->input('content');

        if ($content != null) {
            if ($menutype != 'none') {
                if ($menutype == 'menu') {
                    $menuid = $menutypeid;
                } else {
                    $menuid = $submenutypeid;
                }

                $data = array(
                    'pagename' => $pagename,
                    'menutypeid' => $menuid,
                    'content' => $content,
                );

                $result = DB::table('page')->insert($data);
                if ($result == true) {
                    return redirect()->back()->with('success', 'Page added successfully');
                } else {
                    return redirect()->back()->with('error', 'Page not added');
                }
            } else {
                return redirect()->back()->with('error', 'Please select a menu type');
            }
        } else {
            return redirect()->back()->with('error', 'Please add content');
        }
    }

    public function getPages()
    {
        $pages = LessonModel::all();
        return view('listpages', compact('pages'));
    }

    public function getshowLesonQrcode(Request $request)
    {
        //get lid
        $lid = $request->route('lid');

        //GET WHERE LESSON ID = $lid

        $lesson = LessonModel::where('lesssoncode', $lid)->first();
        $classid = $lesson->classid;
        $lessonName = $lesson->name;

        //GET CLASS NAME
        $class = ClassModel::where('classid', $classid)->first();
        $className = $class->classname;
        $yearofstudy = $class->yearofstudy;

        $filename = $lessonName.'Y'. $yearofstudy . '.pdf';

        PDF::SetTitle($lessonName);
        PDF::AddPage();
        PDF::Write(0, 'Lesson Name : ' . $lessonName);
        PDF::Ln();
        PDF::Write(0, 'Lesson Code : ' . $lid);
        PDF::Ln();
        PDF::Write(0, 'Class Name : ' . $className);
        PDF::Ln();
        PDF::Write(0, 'Year of Study : Year ' . $yearofstudy);
        PDF::Ln();

        $style = array(
            'border' => 2,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(249,249,249),
            'bgcolor' => array(0,2,8),
            'module_width' => 1, // width of a single module in points
            'module_height' => 1 // height of a single module in points
        );

        //CONVERT $productCode TO STRING
        $lid = (string)$lid;

        PDF::write2DBarcode($lid, 'QRCODE,M', 12, 40, 60, 50, $style, 'N');

        PDF::Output($filename);
    }
}
