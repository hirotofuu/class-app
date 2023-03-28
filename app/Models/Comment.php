<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tweet_id',
        'namae',
        'content',
        'date',
    ];

    public function tweet(){
        return $this->belongsTo('App\Models\Tweet');
    }
}
