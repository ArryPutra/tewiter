<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // POST MEMILIKI 1 KATEGORI (belongsTo)
    public function PostCategory() {
        return $this->belongsTo(PostCategory::class);
    }

    // POST MEMILIKI 1 PENGGUNA (belongsTo)
    public function User() {
        return $this->belongsTo(User::class);
    }

    // SATU POST MEMILIKI BANYAK KOMENTAR
    public function PostComment() {
        return $this->hasMany(PostComment::class);
    }

    // SATU POST MEMILIKI BANYAK LIKE
    public function PostLike() {
        return $this->hasMany(PostLike::class);
    }
}
