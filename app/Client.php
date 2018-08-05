<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'last_name', 'email', 'phone', 'birthday_date', 'option', 'id_user'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'id_user');
    }
}
