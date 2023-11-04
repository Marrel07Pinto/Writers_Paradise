<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $primaryKey ='order_id';
    public function writer()
    {
        return $this->belongsTo(writer::class,'writer_id');
    }
}
