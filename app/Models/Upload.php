<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;


    protected $primaryKey = "uid";
    protected $table = "uploads";

    protected $fillable = ['name','email','status','education'];
}
