<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicleCC extends Model
{
    use HasFactory;

    protected $table = 'vehicle_cc';
    protected $fillable = [
        'vehicle_type',
        'label',
    ] ;
}
