<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['id_client', 'id_agent', 'type', 'ticket_type', 'exit_date', 'arrival_date', 'price', 'id_user'];
    protected $dates = ['deleted_at'];

    public function client()
    {
        return $this->hasOne('App\Client', 'id', 'id_client');
    }

    public function agent()
    {
        return $this->hasOne('App\Agent', 'id', 'id_agent');
    }

    public function ticket_type()
    {
        return $this->hasOne('App\Ticket_type', 'id', 'id_ticket_type');
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
