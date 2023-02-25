<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $date = $request->validated();
        Post::firstOrCreate([ "title" => $date["title"]]);

        return redirect()->route("post.index");
    }
}
