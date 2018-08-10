<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['correlative', 'id_client', 'id_agent', 'luggage', 'hand_luggage', 'origin', 'destination', 'adults', 'kids', 'bebys', 'exit_date', 'exit_time', 'arrival_date', 'exit_rate', 'price', 'id_user'];
    protected $dates = ['deleted_at'];

    public function client()
    {
        return $this->hasOne('App\Client', 'id', 'id_client');
    }

    public function agent()
    {
        return $this->hasOne('App\Agent', 'id', 'id_agent');
    }

    public function invoice_service()
    {
        return $this->hasMany('App\Invoice_service', 'id_invoice');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'id_user');
    }
}
