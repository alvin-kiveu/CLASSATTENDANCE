<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\SubMenu;
use App\Models\PagesModel;

class PagesController extends Controller
{
    public function appAddpage()
    {
        $menus = MenuModel::all();
        $submenus = SubMenu::all();
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
        $pages = PagesModel::all();
        return view('listpages', compact('pages'));
    }
}
