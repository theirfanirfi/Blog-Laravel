<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Categories as Cat;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\About;
use App\Contact;
use App\Blog;
class AdminController extends Controller
{
    //

    public function index(){
        $user = Auth::user();
        $blogs = Blog::all()->count();
        $users = User::all()->count();
        $categories = Cat::all()->count();
        return view('Admin.dashboard',['user' => $user, 'blogs' => $blogs, 'users' => $users, 'categories' => $categories]);
    }

    public function categories(){
        $user = Auth::user();
        $cats = Cat::all();
        return view('Admin.categories',['user' => $user, 'cats' => $cats]);
    }

    public function addcategory(Request $req){
        $title = $req->input('cat_title');
        $user = Auth::user();

        if($title == null){
            return redirect()->back()->with('error','Category title is required.');
        }else {
            $cat = new Cat();
            $cat->cat_title = $title;
            $cat->user_id = $user->id;
            if($cat->save()){
                return redirect()->back()->with('success','New category Added.');
            }else {
                return redirect()->back()->with('error','Error occurred in Adding the category. Please try again.');
            }
        }
    }

    public function editcat($id){
        $user = Auth::user();
        if($id == null){
            return redirect()->back()->with('error','Category is required.');
        }else {
            $cat = Cat::where(['cat_id' => $id]);
            if($cat->count() > 0 && $cat->first()->user_id == $user->id){
                $cats = Cat::all();
                return view('Admin.editcategory',['user' => $user,'cat' => $cat->first(), 'cats' => $cats]);
            }else {
                return redirect()->back()->with('error','Either the category does not exist in the system or it does not belong to you.');
            }
        }
    }

    public function editcategory(Request $req){
        $user = Auth::user();
        $title = $req->input('cat_title');
        $cat_id = $req->input('cat_id');
        if($title == null || $cat_id == null){
            return redirect()->back()->with('error','Category Fields are required.');
        }else {
            $cat = Cat::where(['cat_id' => $cat_id]);
            if($cat->count() > 0 && $cat->first()->user_id == $user->id){
                $cat = $cat->first();
                $cat->cat_title = $title;
                if($cat->save()){
                    return redirect()->back()->with('success','Category Updated.');
                }else {
                    return redirect()->back()->with('error','Error occurred in updating the category. Please try again.');
                }
            }else {
                return redirect()->back()->with('error','Either the category does not exist in the system or it does not belong to you.');
            }
        }
    }

    public function deletecat($id){
        $user = Auth::user();
        if($id == null){
            return redirect()->back()->with('error','Category is required.');
        }else {
            $cat = Cat::where(['cat_id' => $id]);
            if($cat->count() > 0 && $cat->first()->user_id == $user->id){
                if($cat->delete()){
                    return redirect()->back()->with('success','Category Updated.');
                }else {
                    return redirect()->back()->with('error','Error occurred in deleting the category. Please try again.');
                }
            }else {
                return redirect()->back()->with('error','Either the category does not exist in the system or it does not belong to you.');
            }
        }
    }



    /// users


    public function users(){
        $user = Auth::user();
        $users = User::where('id', '!=', $user->id)->get();
        return view('Admin.users',['user' => $user,'users' => $users]);
    }

    public function adduser(Request $req){
        $user = Auth::user();

        $name = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');
        $cpassword = $req->input('cpassword');
        $role = $req->input('role');

        if($name == "" || $email == "" || $password == "" || $cpassword == "" || $role == "" || $role > 3 || $role < 1){
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else if($password != $cpassword) {
            return redirect()->back()->with('error','Confirm password does not match.');
        }else {

            $checkUser = User::where(['email' => $email]);
            if($checkUser->count() > 0){
            return redirect()->back()->with('error','User with the entered email already exists. Please use any other email.');
            }else {
            $u = new User();
            $u->name = $name;
            $u->email = $email;
            $u->role = $role;
            $u->password = Hash::make($password);
            if($u->save()){
                return redirect()->back()->with('success','Users Added');
            }else {
                return redirect()->back()->with('error','Error occurred in Adding the user. Please try again.');
            }

        }
    }

    }

    public function edituser($id){
        $user = Auth::user();
        $users = User::where('id', '!=',$user->id)->get();
        if($id == ""){
            return redirect()->back()->with('error','User Profile must be provided.');
        }else if($user->role != 1){
            return redirect()->back()->with('error','You do not have the permissions to edit user profiles');
        }else {
            $userProfile = User::find($id);
            return view('Admin.edituser',['user' => $user,'up' => $userProfile, 'users' => $users]);
        }

    }

    public function updateuser(Request $req){
        $id = $req->input('user_id');
        $name = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');
        $cpassword = $req->input('cpassword');
        $role = $req->input('role');



        if($name == "" || $role == "" || $role > 3 || $role < 1){
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else if(($password != "" && $cpassword == "") || ($password == "" && $cpassword != "")){
            return redirect()->back()->with('error','None of the fields can be empty.');
        }
        else if($password != "" && $cpassword != "" && $password != $cpassword) {
            return redirect()->back()->with('error','Confirm password does not match.');
        }else {
            $u = User::find($id);
            $u->name = $name;

            if($email != "" && $u->email != $email){
             $u->email = $email;
            }

            // else {
            //    // return redirect()->back()->with('error','User with the entered email already exists. Please use any other email.');
            // }

            $u->role = $role;

            if($password != ""){
            $u->password = Hash::make($password);
            }

            if($u->save()){
                return redirect()->back()->with('success','User Updated.');
            }else {
                return redirect()->back()->with('error','Error occurred in Updating the user. Please try again.');
            }


    }
    }

    public function deleteUser($id){
        $user = Auth::user();
        if($id == "" || $id == null){
            return redirect()->back()->with('error','Please Provide User.');
        }else {
            $ud = User::find($id);
            if($ud->delete()){
                return redirect('admin/users')->with('success','User Deleted.');
            }else {
                return redirect()->back()->with('error','Error occurred in deleting the user. Please try again.');
            }
        }
    }

    public function about(){
        $user = Auth::user();
        $about = About::all()->first();
        return view('Admin.aboutus',['user' => $user,'about' => $about]);
    }

    public function saveabout(Request $req){
        $desc = $req->input('about_description');

        $user = Auth::user();
        if($user->role ==1 ){
        if($desc == "" || $desc == null){
            return redirect()->back()->with('error','Page description can not be empty.');
        }else {
            $about = About::all();
            if($about->count() > 0){
                $na = $about->first();
                $na->about_description = $desc;
                if($na->save()){
                    return redirect()->back()->with('success','Page Updated.');
                }else {
            return redirect()->back()->with('error','Error occurred in Updating the About Us page. Please try again.');

                }
            }else {
                $na = new About();
                $na->about_description = $desc;
                if($na->save()){
                    return redirect()->back()->with('success','Page Updated.');
                }else {
            return redirect()->back()->with('error','Error occurred in Updating the About Us page. Please try again.');

                }
            }
        }
    }else {
        return redirect()->back()->with('error','You do not have the permission to make changes in the About page.');

    }
    }


    public function contact(){
        $user = Auth::user();
        $contact = Contact::all()->first();
        return view('Admin.contactus',['user' => $user, 'contact' => $contact]);
    }


    public function savecontactusdescription(Request $req){
        $desc = $req->input('contact_description');

        $user = Auth::user();
        if($user->role ==1 ){
        if($desc == "" || $desc == null){
            return redirect()->back()->with('error','Page description cannot be empty.');
        }else {
            $contact = Contact::all();
            if($contact->count() > 0){
                $nc = $contact->first();
                $nc->contact_description = $desc;
                if($nc->save()){
                    return redirect()->back()->with('success','Page Updated.');
                }else {
            return redirect()->back()->with('error','Error occurred in Updating the Contact Us page. Please try again.');

                }
            }else {
                $nc = new Contact();
                $nc->contact_description = $desc;
                if($nc->save()){
                    return redirect()->back()->with('success','Page Updated.');
                }else {
            return redirect()->back()->with('error','Error occurred in Updating the Contact Us page. Please try again.');

                }
            }
        }
    }else {
        return redirect()->back()->with('error','You do not have the permission to make changes in the Contact Us page.');

    }
    }

    public function profile(){
        $user = Auth::user();
        return view('Admin.profile',['user' => $user]);
    }

    public function changeprofile(Request $req){
        $user = Auth::user();
        $name = $req->input('name');
        $email = $req->input('email');

        if($name == "" || $email == ""){
            return redirect()->back()->with('error','Full name or Email field cannot be empty.');
        }else {
            $u = User::where(['email' => $email]);
            if($u->count() > 0 && $user->email != $email){
                return redirect()->back()->with('error','The email is already taken.');
            }else {
            $user->name = $name;
            $user->email = $email;
            if($user->save()){
                return redirect()->back()->with('success','Profile Details updated.');
            }else {
                return redirect()->back()->with('error','Error occurred in updating the profile details. Please try again.');

            }
        }
        }
    }

    public function changeprofileimage(Request $req){
        $user = Auth::user();
        $DESTINATION_PATH = "images/profile";
        if($req->hasFile('profile_image')){
            $file = $req->file('profile_image');

            $IMAGE_FILE_NAME = $file->getClientOriginalName();
            if($file->move($DESTINATION_PATH,$IMAGE_FILE_NAME)){
            $user->profile_image = $IMAGE_FILE_NAME;
            if($user->save()){
                return redirect()->back()->with('success','Profile Image updated.');
            }else{
                return redirect()->back()->with('error','Image Uploaded but not saved in the database. Please try it again.');
            }
            }else {
                return redirect()->back()->with('error','Error occurred in uploading the File.');
            }

        }else {
            return redirect()->back()->with('error','Image is not selected.');
        }
    }

    public function changepassword(Request $req){
        $user = Auth::user();
        $cpass = $req->input('cpass');
        $newpass = $req->input('npass');

        if($cpass == "" || $newpass == ""){
            return redirect()->back()->with('error','None of the field can be empty.');
        }else {
            if(Hash::check($cpass, $user->password)){
                $user->password = Hash::make($newpass);
                if($user->save()){
                return redirect()->back()->with('success','Password Updated.');
                }else {
                return redirect()->back()->with('error','Error occurred in updating the password. Please try again.');
                }
            }else {
                return redirect()->back()->with('error','Invalid current password.');
            }
        }
    }
}
