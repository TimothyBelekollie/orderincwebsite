<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable=['name','description','slug','start_date','end_date','status','budget','client_id'];
}


