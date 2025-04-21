<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 07/11/2019
 * Time: 09:42
 */

namespace App\Repositories;


use App\Models\Carte;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarteRepository extends RessourceRepository{

    public function __construct(Carte $carte){
        $this->model =$carte;
    }

    public function getByCni($cni)
    {
        return DB::table("cartes")->where("numcni",$cni)->first();
    }

}
