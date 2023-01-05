<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvanteUser extends Model
{
    //use HasFactory;
    use SoftDeletes;

    public $table = 'advante_user';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'service_id', 
        'advante',
        'updated_at',
        'created_at',
        'deleted_at',
    ];
}