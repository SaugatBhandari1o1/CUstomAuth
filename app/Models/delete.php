<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delete extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'uploads';

    // DB::table('uploads')-> where('')
}
