<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //protected $fillable = [
    //    'id', 'lesson', 'memo', 'count',
    //];
    protected $fillable = [
        'id', 'lesson'
    ];
}
