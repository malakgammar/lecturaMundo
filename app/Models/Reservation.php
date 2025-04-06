<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'livre_id',
        'date_reservation',
        'date_expiration',
        'statut'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function livre()
    {
        return $this->belongsTo(Livre::class, 'livre_id');
    }
}
