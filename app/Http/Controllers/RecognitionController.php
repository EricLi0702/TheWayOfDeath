<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Recognition;
use Illuminate\Support\Facades\Auth;

class RecognitionController extends Controller
{
    //
    public function getRecognition(){

    }

    public function createRecognition(Request $request){
        $this->validate($request,[
            'type'=>'required',
            'students'=>'required',
            'awardTitle'=>'required',
            'publishDate'=>'required',
            'description'=>'required',
            'imgUrl'=>'required',
            'classId'=>'required'
        ]);
        $userId = Auth::user()->id;
        $postId = Post::create([
            'userId'=>$userId,
            'contentId'=>19,
            'classId'=>$request->classId,
            'schoolId'=>$request->schoolId
        ])->id;
        Recognition::create([
            'type'=>$request->type,
            'students'=>json_encode($request->students),
            'awardTitle'=>$request->awardTitle,
            'publishDate'=>$request->publishDate,
            'description'=>$request->description,
            'imgUrl'=>$request->imgUrl,
            'postId'=>$postId
        ]);
        return response()->json([
            'msg' => 'ok'
        ], 201);
    }

    public function updateRecognition(){

    }

    public function deleteRecognition(){

    }
}
