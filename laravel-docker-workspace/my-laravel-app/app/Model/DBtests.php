<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DBtests extends Model
{
    protected $connection = 'mysql_3',$table = 'db_tests',$fillable = ['name','comment','image'];
}
