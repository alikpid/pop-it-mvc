<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subdivision extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function employees()
    {
        return $this->hasMany(Employee::class, 'id_subdivision');
    }
}
