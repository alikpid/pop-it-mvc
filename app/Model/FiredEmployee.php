<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FiredEmployee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'reason',
        'quiteDate',
        'id_employee'
    ];

}
