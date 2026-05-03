<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inspection extends Model
{
    use SoftDeletes;

    protected $table = 'inspections';

    protected $fillable = [
        'fruit_id',
        'sku',
        'loading_area',
        'transport_departure',
        'transport_arrival',
        'driver',
        'status',
    ];

    protected $casts = [
        'transport_departure' => 'datetime',
        'transport_arrival' => 'datetime',
    ];

    public function fruit(): BelongsTo
    {
        return $this->belongsTo('fruits', 'id');
    }
}
