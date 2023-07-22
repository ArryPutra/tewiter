<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function UserFollow() {
        return $this->belongsTo(User::class, 'follow_user_id');
    }
    public function UserFollower() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
