<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 07/11/2019
 * Time: 09:42
 */

namespace App\Repositories;


use App\Models\Entree;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EntreeRepository extends RessourceRepository{

    public function __construct(Entree $entree){
        $this->model =$entree;
    }

    public function deleteByVisiteur($visiteur_id)
    {
        return DB::table("entrees")->where("visiteur_id",$visiteur_id)->delete();
    }

}
