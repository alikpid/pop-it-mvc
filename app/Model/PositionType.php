<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PositionType extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function position_type(): HasMany
    {
        return $this->hasMany(Position::class, 'id_type', 'id');
    }
}