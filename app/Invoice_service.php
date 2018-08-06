<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_service extends Model
{
    public function service()
    {
        return $this->hasOne('App\Service', 'id', 'id_service');
    }
}
