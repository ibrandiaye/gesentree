<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carte extends Model
{
    use HasFactory;

    protected $fillable = [
      'nom','prenom','datenaiss','lieunaiss','numelec','numcni','commune',
        'sexe','nationalite','date_emission','date_expiration','mrz','photo','numcarte'

    ];
}
