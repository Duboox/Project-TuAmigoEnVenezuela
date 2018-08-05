<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class Agent extends Model
{
    use Notifiable, SoftDeletes, ShinobiTrait;
    
    protected $fillable = ['name', 'last_name', 'email', 'phone', 'birthday_date', 'rating', 'option', 'id_user'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'id_user');
    }
}
