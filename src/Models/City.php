<?php

namespace Shimadotdev\IranRegions\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;

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
