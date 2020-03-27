<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'user';

    protected $fillable = ['id','name','age','address','telephone'];
}
