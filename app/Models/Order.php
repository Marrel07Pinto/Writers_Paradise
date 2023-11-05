<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey ='order_id';
    public function writer()
    {
        return $this->belongsTo(Writer::class,'writer_id');
    }
    public function books()
    {
        return $this->hasMany(Book::class,'order_id');
    }
}  
