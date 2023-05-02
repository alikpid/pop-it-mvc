<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'employee_positions';
    use HasFactory;
    public $timestamps = false;
}