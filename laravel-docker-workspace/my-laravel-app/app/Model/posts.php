<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $fillable = ['name','comment'];
}
