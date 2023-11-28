<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    
    use HasFactory;
    protected $primaryKey ='book_id';
    public function order()
    {
        return $this->belongsTo(Order::class,'book_id');
    }
    public function writers()
    {
        return $this->belongsToMany(Writer::class,'writer_id');
    }
   
}
