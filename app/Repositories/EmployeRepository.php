<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 07/11/2019
 * Time: 09:42
 */

namespace App\Repositories;


use App\Models\Employe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeRepository extends RessourceRepository{

    public function __construct(Employe $employe){
        $this->model =$employe;
    }

    public function getByService($service)
    {
        return DB::table("employes")->where("service_id",$service)->get();
    }
    public function nbEmploye()
    {
        $user = Auth::user();
        if($user->role=="admin")
        {
            return DB::table("employes")->count();
        }
        else
        {
            return DB::table("employes")
            ->join("services","employes.service_id","=","services.id")
            ->where("site_id",$user->site_id)
            ->count();

        }

    }
}
