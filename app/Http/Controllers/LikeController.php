<?php

namespace App\Http\Controllers;

use App\Like;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($id)
    {
        $user_id = auth()->user()->id;

        $row = Like::where([
            "user_id" => $user_id,
            "article_id" => $id])->get();
        if (count($row) >= 1 ){
            return back();
        }

        $like = new Like;
        $like->user_id = $user_id;
        $like->article_id = $id;
        $like->save();

        return back();
    }
    public function remove($id)
    {

        $article_id = $id;
        $user_id = auth()->user()->id;
        $row = Like::where([
            "user_id" => $user_id,
            "article_id" => $article_id])->get();
        if (count($row) == 0 ){
            return back();
        }else if ($row[0] != []) {
            $like = Like::find($row[0]->id);
            $like->delete();
        }
        return back();
    }
}
