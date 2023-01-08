<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';

    protected $fillable = [
        'province_id', 'city_id', 'name'
    ];

    public function city(){
        return $this->belongsTo(City::class, 'id', 'city_id');
    }
}
