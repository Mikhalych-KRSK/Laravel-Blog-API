<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(10);
        $likedPosts = Post::withCount("likedUsers")->get();
        return /*view("Сайт (посты)", compact("posts","likedPosts"))*/ ; 
    }
}
