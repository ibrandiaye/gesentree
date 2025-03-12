<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 07/11/2019
 * Time: 09:42
 */

namespace App\Repositories;


use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceRepository extends RessourceRepository{

    public function __construct(Service $service){
        $this->model =$service;
    }

    public function getBySite($site)
    {
        return DB::table("services")->where("site_id",$site)->get();
    }
    public function nbService()
    {
        $user = Auth::user();
        if($user->role=="admin")
        {
            return DB::table("services")->count();
        }
        else
        {
            return DB::table("services")
            
            ->where("site_id",$user->site_id)
            ->count();

        }

    }
}
