<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\MenuModel;
use App\Models\SubMenu;

class MenuController extends Controller
{
    public function addMenu(Request $request)
    {
        $menuname = $request->input('menuname');
        //MAKE menuname TO BE WITH SAMLL LETTERS
        $link = strtolower($menuname);
        //REMOVE SPACES
        $link = str_replace(' ', '', $link);
        $menuid = rand(100000, 999999);
        $data = array(
            'menuid' => $menuid,
            'menuname' => $menuname,
            'link' => $link,
            'icon' => 'icon',
            'status' => 'Active',
        );
        $result = DB::table('menu')->insert($data);
        if ($result == true) {
            return redirect()->back()->with('success', 'Menu added successfully');
        } else {
            return redirect()->back()->with('error', 'Menu not added');
        }
    }

    public function addSubMenu(){
        $menus = MenuModel::all();
        return view('addsubmenu', compact('menus'));
    }

    public function getMenu()
    {
        $menus = MenuModel::all();;
        return view('listmenu', compact('menus'));
    }

    public function getSubMenu()
    {
        $submenus = SubMenu::all();;
        return view('listsubmenu', compact('submenus'));
    }

    public function addSubMenuApp(Request $request)
    {
        $submenuname = $request->input('submenuname');
        $menuid = $request->input('menuid');
        $submenuid = rand(100000, 999999);
        $link = strtolower($submenuname);
        $link = str_replace(' ', '', $link);
        $data = array(
            'submenuid' => $submenuid,
            'parentMenuId' => $menuid,
            'SubmenuName' => $submenuname,
            'link' => $link,
        );
        $result = DB::table('submenu')->insert($data);
        if ($result == true) {
            return redirect()->back()->with('success', 'Sub Menu added successfully');
        } else {
            return redirect()->back()->with('error', 'Sub Menu not added');
        }
    }
}
