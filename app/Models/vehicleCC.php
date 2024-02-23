<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CC;
class vehicleCC extends Model
{
    use HasFactory;

    protected $table = 'vehicle_cc';
    protected $fillable = [
        'vehicle_type',
        'label',
    ] ;

    public function ccs(){
        return $this->hasMany(CC::class, 'vehicle_cc_id','id');
    }
}
