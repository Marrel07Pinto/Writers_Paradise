<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey ='book_id';
    use HasFactory;
    
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
   
}
