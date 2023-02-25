<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $date = $request->validated();
        Category::firstOrCreate([ "title" => $date["title"]]);

        return redirect()->route("category.index");
    }
}
