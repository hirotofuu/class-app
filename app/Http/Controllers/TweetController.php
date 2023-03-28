<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function index(){
        $syokiTweet=Tweet::where('hyouka','=','楽');
        $tweets=$syokiTweet->paginate(22);
        return $tweets;
    }


    public function show(Tweet $tweet){
        return $tweet;
    }


    public function search($word){
        $keyword=$word;
        $query=Tweet::query();
        $query->where('title','LIKE',"%{$keyword}%")
            ->orwhere('teacher','LIKE',"%{$keyword}%");
        $searchTweets=$query->get();
        return $searchTweets;
        }

        public function category($word){
            $categoryWord=$word;
            $query=Tweet::query();
            $query->where("gakubu","=",$categoryWord);
            $categoryTweets=$query->get();
            return $categoryTweets;
        }

        public function siborikomi($word){
            $siborikomiWord=$word;
            $query=Tweet::query();
            $query->where('hyouka','=','楽')->where('campus','=',$siborikomiWord);
            $siborikomiTweets=$query->paginate(22);
            return $siborikomiTweets;
            }

    public function store(Request $request){
        Tweet::create([
            'title'=>$request->title,
            'teacher'=>$request->teacher,
            'hyouka'=>$request->hyouka,
            'date'=>$request->date,
            'format'=>$request->format,
            'gakubu'=>$request->gakubu,
            'campus'=>$request->campus,
            'clas'=>$request->clas,
            'test'=>$request->test,
        ]);
    }
}
