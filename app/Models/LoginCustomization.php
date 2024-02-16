<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginCustomization extends Model
{
    use HasFactory;

    protected $table = "login_customizations";

    protected $fillable = [
        'login_box_color',
        'background_image',
        'logo_image',
        'text_color',
        'font_family',
        'additional_styles',
    ];
}
