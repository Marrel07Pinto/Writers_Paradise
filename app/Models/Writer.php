<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;
    protected $primaryKey ='writer_id';
    public function order()
    {
        return $this->hasOne(Order::class,'writer_id');
    }
    public function Books()
    {
        return $this->belongsToMany(Book::class,'book_id');
    }
}
