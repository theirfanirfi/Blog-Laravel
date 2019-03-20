<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Categories as Cat;
class FrontendController extends Controller
{
    //

    public function index(){
        $blogs = Blog::all();
        $cats = Cat::all();
        return View('Frontend.home',['blogs' => $blogs, 'cats' => $cats]);
    }

    public function blog($id){
        $blog = Blog::find($id);
        return view('Frontend.singleblog',['b' => $blog]);
    }

    public function blogsByCat($id){
        $blogs = Blog::where(['cat_id' => $id]);
        $cats = Cat::all();
        return View('Frontend.home',['blogs' => $blogs, 'cats' => $cats]);
    }
}
