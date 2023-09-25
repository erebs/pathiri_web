<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restaurent_item extends Model
{
    use HasFactory;
    protected $table='restaurent_items';
    protected $guarded=[];


        public function GetCat()
    {
        return $this->belongsTo(restaurent_category::class, 'catid', 'id');
    }
}
