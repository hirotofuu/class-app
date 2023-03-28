<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'teacher',
        'hyouka',
        'date',
        'format',
        'gakubu',
        'campus',
        'clas',
        'test',
    ];

    public function comments()
    {
        return $this->hasMany('App\models\Comment');
    }
}
