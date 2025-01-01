<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable=['title','slug','content','image_path','author_id','category_id','status','published_at'];
}


