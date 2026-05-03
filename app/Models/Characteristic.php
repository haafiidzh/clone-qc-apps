<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Characteristic extends Model
{
    protected $table = 'characteristics';

    protected $fillable = [
        'name',
        'description',
    ];

    public function fruits(): HasMany
    {
        return $this->hasMany('fruits', 'id');
    }
}
