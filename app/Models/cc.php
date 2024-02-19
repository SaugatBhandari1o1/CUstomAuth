<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cc extends Model
{
    use HasFactory;

    protected $table = 'cc';

    protected $fillable = [
        'cc',
        'vehicle_cc_id',
    ] ;

    public function vehicle_cc_id(){
        return $this->belongsTo(vehicleCC::class);
    }
}
