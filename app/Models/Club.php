<?php

namespace App\Models;

use App\Enums\Duration;
use App\Traits\Trackable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Club extends Model implements TranslatableContract
{
    use HasFactory, Translatable, Trackable;

    protected $fillable = ['duration', 'duration_type', 'times', 'status', 'added_by', 'price', 'color', 'added_by' , 'is_coming_soon' , 'vat' , 'vat_type'];

    protected $with = ['translations'];

    public $translatedAttributes = ['name', 'description'];


    ######### START RELATIONS ##########
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'club_services')->withTimestamps();
    }
    ######### END RELATIONS ##########



    public function getServicesIds(): array
    {
        return $this->services->pluck('id')?->toArray() ?? [];
    }

    public function getTimesAttribute()
    {
        return $this->attributes['times'] == -1 ? (__('general.unlimited')) : $this->attributes['times'];
    }
    /**
     * return origianal attribute regard custom above getter.
     * used to display well for admin panel
     */
    public function getTimesOriginalAttribute()
    {
        return $this->attributes['times'];
    }

    public function getDurationAttribute()
    {
        return $this->attributes['duration'] . ' ' . __('general.' . $this->attributes['duration_type']);
    }

    /**
     * return origianal attribute regard custom above getter.
     * used to display well for admin panel
     */
    public function getDurationOriginalAttribute()
    {
        return $this->attributes['duration'];
    }


    /**
     * Get Encrypted Id
     */
    public function getEncryptedId()
    {
        return encrypt($this->id);
    }
}
