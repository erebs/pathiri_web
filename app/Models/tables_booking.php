<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tables_booking extends Model
{
    use HasFactory;
    protected $table='tables_bookings';
    protected $guarded=[];
}
