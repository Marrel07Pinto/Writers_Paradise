<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['p_Caption', 'post_img'];
 
    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }
    public function Comments()
    {
        return $this->hasMany(Comment::class);
    }
}
