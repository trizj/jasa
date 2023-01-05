<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    //use HasFactory;
    use SoftDeletes;

    public $table = 'service';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];
    protected $fillable = [
        'users_id',
        'title',
        'description',
        'delivery_time',
        'revision_limit',
        'price',
        'note',
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    // one to one
    public function user()
    {
        return $this->belongsTo('App/Models/User', 'users_id', 'id');
    }

    public function AdvanteUser()
    {
        return $this->hasMany('App\Models\AdvanteUser', 'service_id');
    }

    public function AdvanteService()
    {
        return $this->hasMany('App\Models\AdvanteService', 'service_id');
    }

    public function ThumbnailService()
    {
        return $this->hasMany('App\Models\ServiceThumbnail', 'service_id');
    }

    public function Tagline()
    {
        return $this->hasMany('App\Models\Tagline', 'service_id');
    }

    public function Order()
    {
        return $this->hasMany('App\Models\Order', 'service_id');
    }

}
