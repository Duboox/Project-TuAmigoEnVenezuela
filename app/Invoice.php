<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['id_client', 'id_agent', 'type', 'ticket_type', 'exit_date', 'arrival_date', 'price', 'id_user'];
    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'id_user');
    }
}
