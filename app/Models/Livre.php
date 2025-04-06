<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $fillable = [ 
        'nomlivre', 
        'nomauteur', 
        'description', 
        'date_pub',
        'categorie_id',
        'image' 
    ];
    public function categorie()
{
    return $this->belongsTo(Categorie::class);
}
public function estDisponible()
{
    return $this->status == 1;
}

}
