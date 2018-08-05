<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['name', 'last_name', 'email', 'phone', 'birthday_date', 'rating', 'option', 'id_user'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'id_user');
    }
}
