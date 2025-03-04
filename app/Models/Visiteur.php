<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_id','service_id','employe_id','nom','prenom','datenaiss','lieunaiss','numelec','numcni','commune',
        'sexe','nationalite','date_emission','date_expiration','mrz','photo','numcarte'
    ];
}
