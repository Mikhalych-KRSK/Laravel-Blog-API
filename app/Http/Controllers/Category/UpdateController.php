<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $date = $request->validate();
        $category->update($date);

        return /*view("Редактирование категории", compact("category"))*/ ;
    }
}
