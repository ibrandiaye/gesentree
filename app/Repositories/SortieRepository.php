<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 07/11/2019
 * Time: 09:42
 */

namespace App\Repositories;


use App\Models\Sortie;

class SortieRepository extends RessourceRepository{

    public function __construct(Sortie $sortie){
        $this->model =$sortie;
    }
}
