<?php
namespace App\Repositories;

use App\Models\Rechercher;
use App\Repositories\RessourceRepository;
use Illuminate\Support\Facades\DB;

class RechercherRepository extends RessourceRepository{
    public function __construct(Rechercher $rechercher){
        $this->model = $rechercher;
    }


}
