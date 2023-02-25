<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $date = $request->validate();
        $post->update($date);

        return /*view("Редактирование категории", compact("post"))*/ ;
    }
}
