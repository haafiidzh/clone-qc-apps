<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fruit extends Model
{
    use SoftDeletes;

    protected $table = 'fruits';

    protected $fillable = [
        'name',
        'description',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo('categories', 'id');
    }

    public function characteristic(): BelongsTo
    {
        return $this->belongsTo('characteristics', 'id');
    }

    public function inspections(): HasMany
    {
        return $this->hasMany('inspections', 'fruit_id');
    }
}
