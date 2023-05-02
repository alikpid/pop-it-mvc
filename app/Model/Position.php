<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Position extends Model
{
    protected $table = 'employee_positions';
    use HasFactory;
    public $timestamps = false;

    public function emp_position_type(): BelongsTo
    {
        return $this->belongsTo(PositionType::class, 'id_type', 'id');
    }
}