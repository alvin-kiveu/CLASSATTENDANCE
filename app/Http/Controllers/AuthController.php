<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginUser(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        //$password = bcrypt($password);
        //CHECK IF EMAIL IS ALREADY REGISTERED FROM MYSQL DATABASE ON TABLE users
        $userNameCheck = DB::table('members')->where('username', $username)->first();
        if ($userNameCheck) {
            //CHECK IF PASSWORD IS CORRECT
            if (password_verify($password, $userNameCheck->password)) {
                //CREATE SESSION
                $request->session()->put('userEmailLogin', $userNameCheck->username);
                return redirect('/home')->with('success', 'Login successfully to your account');
            } else {
                return redirect()->back()->with('error', 'The password you entered is incorrect');
            }
        } else {
            return redirect()->back()->with('error', 'The username you entered is not recognized as an account '.$password.'');
        }
    }


    public function logoutUser(Request $request)
    {
        $request->session()->forget('userEmailLogin');
        return redirect('/login')->with('success', 'You have been logged out');
    }

    public function systermInfo()
    {
        //GET TOOTAL MENU COUNT
        $totalMenuCount = DB::table('menu')->count();
        //GET TOTAL MEMBERS COUNT
        $totalMemberCount = DB::table('members')->count();
        $data = array(
            'totalMenuCount' => $totalMenuCount,
            'totalMemberCount' => $totalMemberCount
        );

        return response()->json($data);
    }
}
