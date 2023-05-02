<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
//    public function subdivision()
//    {
//        return $this->belongsTo(Subdivision::class, 'id_subdivision');
//    }
}
