<?php

namespace Shimadotdev\IranRegions\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{

    protected $fillable = [
        'slug',
        'is_active',
        'latitude',
        'longitude',
        'calling_code'
    ];

    public $timestamps = false;

}
