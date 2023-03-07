<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use App\Models\Comment;

class StoreController extends Controller
{
    public function __invoke(Post $post, StoreRequest $request)
    {
        $date = $request->validated();
        $date["user_id"] = auth()->user()->id;
        $date["post_id"] = $post->id;
        
        Comment::create($date);

        return redirect()->route("post.show", $post->id);
    }
}

?>