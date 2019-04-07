<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'price', 'type', 'type_id', 'description','created_by'
    ];
    public function typeOut() {
        return $this->hasOne('App\OutcomeCategory', 'id', 'type');
    }
    public function promotion() {
        return $this->hasOne('App\UserPromotions', 'transaction_id', 'id');
    }
}
