<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    use HasFactory;
    protected $fillable = [
        'employe_id',"visiteur_id","sortie"
 
    ];
    public function sortie()
    {
        return $this->hasOne(Sortie::class);
    }
}
