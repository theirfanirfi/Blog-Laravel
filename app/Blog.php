<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;
use App\User;
class Blog extends Model
{
    //
    public function getBlogCategory(){
        if($this->cat_id != 0){
        return Categories::find($this->cat_id)->cat_title;
        }else {
            return "Default";
        }
    }

    public function getAuthor(){
        return User::find($this->user_id)->name;
    }
}
