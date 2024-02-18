<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationOption extends Model
{
    use HasFactory;

    protected $table='education-options';

    protected $fillable = ['value','label','hidden'];
}
