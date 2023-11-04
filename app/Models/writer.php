<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class writer extends Model
{
    use HasFactory;
    protected $primaryKey ='writer_id';
    public function order()
    {
        return $this->hasOne(order::class,'writer_id');
    }
}
