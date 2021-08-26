<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    
    protected $fillable = [
      'title',
      'user_id',
    ];
    public function comments()
    {
      return $this->hasMany(Comment::class);
    }
}
