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
        'id_position',
        'image',
    ];
    public function position()
    {
        return $this->belongsTo(Position::class, 'id_position');
    }
    public function subdivision()
    {
        return $this->belongsTo(Subdivision::class, 'id_subdivision');
    }
    public function firedEmployee()
    {
        return $this->hasOne(FiredEmployee::class, 'id_employee', 'id');
    }
    public static function search(string $query)
    {
        return self::where('surname', 'LIKE', '%' . $query . '%')->get();
    }
}
