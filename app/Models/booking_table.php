<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking_table extends Model
{
    use HasFactory;
    protected $table='booking_tables';
    protected $guarded=[];
}
