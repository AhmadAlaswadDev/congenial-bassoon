<?php

namespace App\Models;

use App\Traits\Trackable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OfferCompany extends Model implements TranslatableContract
{
    use HasFactory, Translatable, Trackable;

    protected $fillable = [
        'added_by',
        'location_url',
    ];

    public $translatedAttributes = ['name'];

    protected $with = ['translations'];

    ####### START REALTION #######
    public function offers(): HasMany
    {
        return $this->hasMany(Offer::class, 'offer_company_id');
    }
    ####### END REALTION #######
}
