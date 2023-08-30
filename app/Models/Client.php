<?php

namespace App\Models;

use App\Traits\Trackable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Client extends Model implements TranslatableContract
{
    use HasFactory, Translatable, Trackable;
    protected $fillable = [
        'added_by',
        'web_img',
        'mobile_img',
    ];


}