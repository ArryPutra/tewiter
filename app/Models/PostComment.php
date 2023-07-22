<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // SATU KOMENTAR MEMILIKI SATU POST
    public function Post() {
        return $this->belongsTo(Post::class);
    }

    // SATU KOMENTAR MEMILIKI SATU USER
    public function User() {
        return $this->belongsTo(User::class);
    }
}
