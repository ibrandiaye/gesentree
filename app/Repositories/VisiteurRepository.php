<?php
/**
 * Created by PhpStorm.
 * User: ibra8
 * Date: 07/11/2019
 * Time: 09:42
 */

namespace App\Repositories;


use App\Models\Visiteur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VisiteurRepository extends RessourceRepository{

    public function __construct(Visiteur $visiteur){
        $this->model =$visiteur;
    }

    public function getBySite($site)
    {
        return Visiteur::with(["entree"])
        ->where('site_id',$site)
        ->get();
    }
    public function get()
    {
        return Visiteur::with(["entree"])
        ->get();
    }
    public function nbVisiteurToday()
    {
        $aujourdhui = \Carbon\Carbon::today();
        $user = Auth::user();
        if($user->role=="admin")
        {
            return DB::table("visiteurs")->whereDate('created_at', $aujourdhui)->count();
        }
        else
        {
            return DB::table("visiteurs")
            ->whereDate('created_at', $aujourdhui)
            ->where("site_id",$user->site_id)
            ->count();

        }

    }
    public function nbVisiteurMonth()
    {
        $moisEnCours = \Carbon\Carbon::now()->month;
        $anneeEnCours = \Carbon\Carbon::now()->year;        $user = Auth::user();
        if($user->role=="admin")
        {
            return DB::table("visiteurs")->whereMonth('created_at', $moisEnCours)
            ->whereYear('created_at', $anneeEnCours)
            ->count();
        }
        else
        {
            return DB::table("visiteurs")
            ->whereMonth('created_at', $moisEnCours)
            ->whereYear('created_at', $anneeEnCours)
            ->where("site_id",$user->site_id)
            ->count();

        }

    }
    public function nbVisiteurYear()
    {
        $anneeEnCours = \Carbon\Carbon::now()->year;
        $user = Auth::user();
        if($user->role=="admin")
        {
            return DB::table("visiteurs")->whereYear('created_at', $anneeEnCours)->count();
        }
        else
        {
            return DB::table("visiteurs")
            ->whereYear('created_at', $anneeEnCours)
            ->where("site_id",$user->site_id)
            ->count();

        }

    }
}
