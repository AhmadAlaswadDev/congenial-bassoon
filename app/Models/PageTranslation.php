<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'locale',
        'title',
        'content',
        'meta_title',
        'meta_description',
        'meta_image',
        'meta_keywords',
    ];
}
