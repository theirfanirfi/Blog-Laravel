<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\About;
use App\Contact;
use App\Categories as Cat;
class FrontendController extends Controller
{
    //

    public function index(){
        $blogs = Blog::all();
        $cats = Cat::all();
        return View('Frontend.home',['blogs' => $blogs, 'cats' => $cats, 'title' => 'home']);
    }

    public function blog($id){
        $blog = Blog::find($id);
        return view('Frontend.singleblog',['b' => $blog, 'title' => $blog->blog_title]);
    }

    public function blogsByCat($id){
        $blogs = Blog::where(['cat_id' => $id]);
        $cats = Cat::all();
        $cat = Cat::find($id);
        return View('Frontend.home',['blogs' => $blogs, 'cats' => $cats,'title' => $cat->cat_title]);
    }

    public function about(){
        $about = About::all()->first();
        $cats = Cat::all();

        return view('Frontend.about',['about' => $about, 'cats' => $cats,'title' => 'About Us']);
    }

    public function contactus(){
        $contact = Contact::all()->first();
        $cats = Cat::all();

        return view('Frontend.contact',['contact' => $contact, 'cats' => $cats, 'title' => 'Contact Us']);
    }
}
