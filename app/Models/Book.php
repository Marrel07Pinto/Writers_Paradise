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
        return $this->hasone(order::class,'book_id')
    }
}
