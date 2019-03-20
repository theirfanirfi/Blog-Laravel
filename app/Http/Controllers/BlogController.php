<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Categories as Cat;
use App\Blog;
class BlogController extends Controller
{
    //

    public function addblog(){
        $user = Auth::user();
        $cats = Cat::all();
        return view('Admin.addblog',['user' => $user, 'cats' => $cats]);
    }

    public function publishblog(Request $req){
        $user = Auth::user();
        if($user->role == 1 || $user->role == 3){
            $blog_title = $req->input('blog_title');
            $blog_excerpt = $req->input('blog_excerpt');
            $blog_slugs = $req->input('blog_slugs');
            $cat_id = $req->input('cat_id');
            $blog_tags = $req->input('blog_tags');
            $keywords = $req->input('keywords');
            $blog_description = $req->input('blog_description');
            $IMAGE_FILE_NAME = "";
            $DESTINATION_PATH = "images";
            $messages = array();
            $messages['error'] = "";
            $messages['success'] = "";
            if($blog_title == "" || $cat_id == "" || $blog_description == ""){
                return redirect()->back()->with('error','Title, Category and Description fields are required.');
            }else {

                $blog = new Blog();
                $blog->blog_title = $blog_title;
                $blog->blog_excerpt = $blog_excerpt;
                $blog->slug = $blog_slugs;
                $blog->cat_id = $cat_id;
                $blog->user_id = $user->id;
                $blog->tags = $blog_tags;
                $blog->keywords = $keywords;
                $blog->blog_description = $blog_description;

            if($req->hasFile('blog_image')){
                $file = $req->file('blog_image');
                $IMAGE_FILE_NAME = $file->getClientOriginalName();
                if($file->move($DESTINATION_PATH,$IMAGE_FILE_NAME)){
                $blog->blog_image = $IMAGE_FILE_NAME;
                }else {
                    $messages['error'] = "Error Occurred in uploading the image.";
                }
            }

            if($blog->save()){
                $messages['success'] = "Blog post published";
                return redirect('/admin/editblog/'.$blog->id)->with('messages',$messages);
            }else {
                return redirect()->back()->with('error','Error occurred in publishing the post. Please try again.');
            }
        }

        }else {
            return redirect()->back()->with('error','Sorry, you do not have the permission to publish a blog post. Contact with Administrator.');
        }
    }

    public function editblog($id){

        $user = Auth::user();
        $blog = Blog::find($id);
        $cats = Cat::all();
        return view('Admin.editblog',['user' => $user, 'cats' => $cats,'blog' => $blog]);

    }


    public function updateblog(Request $req){
        $user = Auth::user();

            $blog_id = $req->input('blog_id');
            $blog_title = $req->input('blog_title');
            $blog_excerpt = $req->input('blog_excerpt');
            $blog_slugs = $req->input('blog_slugs');
            $cat_id = $req->input('cat_id');
            $blog_tags = $req->input('blog_tags');
            $keywords = $req->input('keywords');
            $blog_description = $req->input('blog_description');
            $IMAGE_FILE_NAME = "";
            $DESTINATION_PATH = "images";
            $messages = array();
            $messages['error'] = "";
            $messages['success'] = "";
            if($blog_title == "" || $cat_id == "" || $blog_description == "" || $blog_id == ""){
                return redirect()->back()->with('error','Title, Category and Description fields are required.');
            }else {

                $blog = Blog::find($blog_id);
                $blog->blog_title = $blog_title;
                $blog->blog_excerpt = $blog_excerpt;
                $blog->slug = $blog_slugs;
                $blog->cat_id = $cat_id;
                $blog->user_id = $user->id;
                $blog->tags = $blog_tags;
                $blog->keywords = $keywords;
                $blog->blog_description = $blog_description;

            if($req->hasFile('blog_image')){
                $file = $req->file('blog_image');
                $IMAGE_FILE_NAME = $file->getClientOriginalName();
                if($file->move($DESTINATION_PATH,$IMAGE_FILE_NAME)){
                $blog->blog_image = $IMAGE_FILE_NAME;
                }else {
                    $messages['error'] = "Error Occurred in uploading the image.";
                }
            }

            if($blog->save()){
                $messages['success'] = "Blog post updated";
                return redirect()->back()->with('messages',$messages);
            }else {
                return redirect()->back()->with('error','Error occurred in updating the post. Please try again.');
            }
        }
    }

    public function deleteblog($id){
        $user = Auth::user();
        if($user->role == 1){
            if($id == "" || $id == null){
                return redirect()->back()->with('error','Blog must be provided to delete.');
            }else {
                $blog = Blog::find($id);
                if($blog->delete()){
                    return redirect('admin/blogs')->with('success','Blog deleted.');
                }else {
                return redirect()->back()->with('error','Error occurred in deleting the blog. Please try again.');
                }
            }
        }else {
            return redirect()->back()->with('error','Sorry, you do not have the permission to delete a post. Contact with Administrator.');
        }
    }

    public function index(){
        $user = Auth::user();
        $blogs = Blog::all();
        return view('Admin.blogs',['user' => $user, 'blogs' => $blogs]);
    }

    public function catblogs($id){
        $user = Auth::user();
        if($id == "" || $id == null){
            return redirect()->back()->with('error','Please provide the category to show blogs.');
        }else {
            $blogs = Blog::where(['cat_id' => $id])->get();
            $cat = Cat::find($id);
            return View('Admin.catblogs',['user' => $user, 'blogs' =>$blogs, 'cat' => $cat]);
        }
    }

}
