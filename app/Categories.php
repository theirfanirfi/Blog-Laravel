<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Blog;
class Categories extends Model
{
    //
    protected $primaryKey = "cat_id";
    public function getBlogsCountForCat(){
        return Blog::where(['cat_id' => $this->cat_id])->count();
    }
}
