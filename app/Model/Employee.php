<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'surname',
        'name',
        'middlename',
        'sex',
        'DOB',
        'placeOfResidence',
        'id_subdivision',
        'id_position'
    ];
//    public function emp(): BelongsTo
//    {
//        return $this->belongsTo(Subdivision::class, 'id_subdivision', 'id');
//    }
//    public function emp_position(): BelongsTo
//    {
//        return $this->belongsTo(Position::class, 'id_position', 'id');
//    }
//    public function subdivision(): BelongsTo
//    {
//        return $this->belongsTo(Subdivision::class, 'id_subdivision');
//    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'id_position');
    }
    public function subdivision()
    {
        return $this->belongsTo(Subdivision::class, 'id_subdivision');
    }
}
