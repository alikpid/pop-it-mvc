<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdivision extends Model
{
    use HasFactory;
    public $timestamps = false;

//    public function employees()
//    {
//        return $this->hasMany(Employee::class, 'id_subdivision');
//    }

    public function type()
    {
        return $this->belongsTo(SubdivisionType::class, 'id_type');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'id_subdivision');
    }
}
