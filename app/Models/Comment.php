<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "comments";
    protected $guarded = false;

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function getDateAttribute()
    {
        //return Атрибут::parse();
    }

}

?>