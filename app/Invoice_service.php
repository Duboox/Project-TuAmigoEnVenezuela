<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class Invoice_service extends Model
{
    use Notifiable, SoftDeletes, ShinobiTrait;

    protected $fillable = ['id_invoice', 'id_service', 'id_user'];
    protected $dates = ['deleted_at'];

    public function service()
    {
        return $this->hasOne('App\Service', 'id', 'id_service');
    }

    public function Invoice()
    {
        return $this->belongsTo('App\Invoice', 'id', 'id_invoice');
    }
}
