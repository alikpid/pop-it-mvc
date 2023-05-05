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

    public function type()
    {
        return $this->belongsTo(PositionType::class, 'id_type');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'id_position');
    }
}