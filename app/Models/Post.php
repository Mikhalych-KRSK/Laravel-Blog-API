<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    protected $guarded = false;

    protected $withCount = ["likedUsers"];

    public function category()
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    public function likedUsers()
    {
        return $this->belongsToMany(User::class, "post_user_likes", "post_id", "user_id");
    }

}
