<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    protected $primaryKey = "uid";
    protected $table = "uploads";

    protected $fillable = ['name','email','status','education','document'];
}
