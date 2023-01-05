<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvanteService extends Model
{
    //use HasFactory;
    use SoftDletes;

    public $table = 'advante_service';

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

    // one to many
    public function service()
    {
        return $this->belongsTo('App/Models/Service', 'service_id', 'id');
    }
}
