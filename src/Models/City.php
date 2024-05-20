<?php

namespace Shimadotdev\IranRegions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{

    protected $fillable = [
        'slug',
        'is_active',
        'province_id',
        'latitude',
        'longitude'
    ];

    public $timestamps = false;

    public function province() : BelongsTo {

        return  $this->belongsTo(Province::class);

    }


}
