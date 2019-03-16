<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    //login  page

    public function index(){
        return view('login');
    }

    public function login(Request $req){
        $email = $req->input('email');
        $password = $req->input('password');
        if($email == null || $password == null){
            return redirect()->back()->with('error',"None of the field can be empty.");
        }else {
            if(Auth::attempt(['email' => $email, 'password' => $password])){
                return redirect('admin/');
            }else {
             return redirect()->back()->with('error',"Invalid Credentials.");
            }
        }
    }
    
    //register
    public function register(Request $req){
        $name = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');
        if($email == null || $password == null || $name == null){

            return redirect()->back()->with('error',"None of the field can be empty.");
        }else {

            $user = User::where(['email' => $email]);
            if($user->count() > 0){
            return redirect()->back()->with('error',"Email or Username is already taken. Please use another one.");
            }else {
                $user = new User();
                $user->name = $name;
                $user->email = $email;
                $user->password = Hash::make($password);
                if($user->save()){
                    if(Auth::attempt(['email' => $email, 'password' => $password])){
                        return redirect('admin/');
                    }else {
                        return redirect('/login')->with('error',"Emrror occurred in opening the Dashboard page. Please login manually.");
                    }
                }
            }
            
        }
    }
}
