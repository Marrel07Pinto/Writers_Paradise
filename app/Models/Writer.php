<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;
    //protected $primaryKey ='writer_id';
    public function order()
    {
        return $this->hasOne(Order::class);
    }
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Posts()
    {
        return $this->belongsToMany(Post::class);
    }
    protected $fillable = [
        'user_id',
        'w_firstname',
        'w_phone',
        'w_address',
        'w_postcode',
        'w_img',
        
    ];
}
