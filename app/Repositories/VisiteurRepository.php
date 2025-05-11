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
        if($user->role=="admin" || $user->role=="visiteur")
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
        if($user->role=="admin" || $user->role=="visiteur")
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
        if($user->role=="admin" || $user->role=="visiteur")
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


    public function nbVisiteurTodayGroupByService()
    {
        $aujourdhui = \Carbon\Carbon::today();
        $user = Auth::user();
        if($user->role=="admin" || $user->role=="visiteur")
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->select("services.nom","services.id", DB::raw('count(visiteurs.id) as nb'))
            ->whereDate('visiteurs.created_at', $aujourdhui)
            ->groupBy("services.nom","services.id")
            ->get();
        }
        else
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->select("services.nom","services.id", DB::raw('count(visiteurs.id) as nb'))
            ->whereDate('visiteurs.created_at', $aujourdhui)
            ->where("visiteurs.site_id",$user->site_id)
            ->groupBy("services.nom","services.id")
            ->get();

        }

    }
    public function nbVisiteurMonthGroupByService()
    {
        $moisEnCours = \Carbon\Carbon::now()->month;
        $anneeEnCours = \Carbon\Carbon::now()->year;        $user = Auth::user();
        if($user->role=="admin" || $user->role=="visiteur")
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->select("services.nom","services.id", DB::raw('count(visiteurs.id) as nb'))
            ->whereMonth('visiteurs.created_at', $moisEnCours)
            ->whereYear('visiteurs.created_at', $anneeEnCours)
            ->groupBy("services.nom","services.id")
            ->get();
        }
        else
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->select("services.nom","services.id", DB::raw('count(visiteurs.id) as nb'))
            ->whereMonth('visiteurs.created_at', $moisEnCours)
            ->whereYear('visiteurs.created_at', $anneeEnCours)
            ->where("visiteurs.site_id",$user->site_id)
            ->groupBy("services.nom","services.id")
            ->get();

        }

    }
    public function nbVisiteurYearGroupByService()
    {
        $anneeEnCours = \Carbon\Carbon::now()->year;
        $user = Auth::user();
        if($user->role=="admin" || $user->role=="visiteur")
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->select("services.nom","services.id", DB::raw('count(visiteurs.id) as nb'))
            ->whereYear('visiteurs.created_at', $anneeEnCours)
            ->groupBy("services.nom","services.id")
            ->get();
        }
        else
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->select("services.nom","services.id", DB::raw('count(visiteurs.id) as nb'))
            ->whereYear('visiteurs.created_at', $anneeEnCours)
            ->where("visiteurs.site_id",$user->site_id)
            ->groupBy("services.nom","services.id")
            ->get();

        }

    }

    public function VisiteurToday()
    {
        $aujourdhui = \Carbon\Carbon::today();
        $user = Auth::user();
        if($user->role=="admin" || $user->role=="visiteur")
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie")            ->whereDate('visiteurs.created_at', $aujourdhui)
            ->get();
        }
        else
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie")            ->whereDate('visiteurs.created_at', $aujourdhui)
            ->where("visiteurs.site_id",$user->site_id)
            ->get();

        }

    }
    public function visiteurMonth()
    {
        $moisEnCours = \Carbon\Carbon::now()->month;
        $anneeEnCours = \Carbon\Carbon::now()->year;
        $user = Auth::user();
        if($user->role=="admin" || $user->role=="visiteur")
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie")            ->whereMonth('visiteurs.created_at', $moisEnCours)
            ->whereYear('visiteurs.created_at', $anneeEnCours)
            ->get();
        }
        else
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie")            ->whereMonth('visiteurs.created_at', $moisEnCours)
            ->whereYear('visiteurs.created_at', $anneeEnCours)
            ->where("visiteurs.site_id",$user->site_id)
            ->get();

        }

    }
    public function visiteurYear()
    {
        $anneeEnCours = \Carbon\Carbon::now()->year;
        $user = Auth::user();
        if($user->role=="admin" || $user->role=="visiteur")
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie","entrees.id as entree_id")
            ->whereYear('visiteurs.created_at', $anneeEnCours)
            ->get();
        }
        else
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie","entrees.id as entree_id")
            ->whereYear('visiteurs.created_at', $anneeEnCours)
            ->where("visiteurs.site_id",$user->site_id)
            ->get();

        }

    }

    public function VisiteurTodayInService()
    {
        $aujourdhui = \Carbon\Carbon::today();
        $user = Auth::user();
        if($user->role=="admin" || $user->role=="visiteur")
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie","entrees.id as entree_id")
            ->whereNull("entrees.sortie")
             ->whereDate('visiteurs.created_at', $aujourdhui)
            ->get();
        }
        else
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie","entrees.id as entree_id")
             ->whereDate('visiteurs.created_at', $aujourdhui)
             ->whereNull("entrees.sortie")
            ->where("visiteurs.site_id",$user->site_id)
            ->get();

        }

    }
    public function historique($cni)
    {
        return DB::table("entrees")
        ->join("visiteurs",'entrees.visiteur_id','=','visiteurs.id')
        ->join("services",'entrees.service_id','=','services.id')

        ->select("entrees.*","services.nom as service")
        ->where("visiteurs.numcni",$cni)
        ->get();
    }

    public function getByCni($cni)
    {
        return DB::table("visiteurs")->where("numcni",$cni)->first();
    }




    public function VisiteurTodayByService($service)
    {
        $aujourdhui = \Carbon\Carbon::today();
        $user = Auth::user();
        if($user->role=="admin" || $user->role=="visiteur")
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie")
            ->whereDate('visiteurs.created_at', $aujourdhui)
            ->where("services.id",$service)
            ->get();
        }
        else
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie")
            ->whereDate('visiteurs.created_at', $aujourdhui)
            ->where("visiteurs.site_id",$user->site_id)
            ->where("services.id",$service)
            ->get();

        }

    }
    public function visiteurMonthByService($service)
    {
        $moisEnCours = \Carbon\Carbon::now()->month;
        $anneeEnCours = \Carbon\Carbon::now()->year;
        $user = Auth::user();
        if($user->role=="admin" || $user->role=="visiteur")
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie")            ->whereMonth('visiteurs.created_at', $moisEnCours)
            ->whereYear('visiteurs.created_at', $anneeEnCours)
            ->where("services.id",$service)
            ->get();
        }
        else
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie")            ->whereMonth('visiteurs.created_at', $moisEnCours)
            ->whereYear('visiteurs.created_at', $anneeEnCours)
            ->where("visiteurs.site_id",$user->site_id)
            ->where("services.id",$service)
            ->get();

        }

    }
    public function visiteurYearByService($service)
    {
        $anneeEnCours = \Carbon\Carbon::now()->year;
        $user = Auth::user();
        if($user->role=="admin" || $user->role=="visiteur")
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie","entrees.id as entree_id")
            ->whereYear('visiteurs.created_at', $anneeEnCours)
            ->where("services.id",$service)
            ->get();
        }
        else
        {
            return DB::table("visiteurs")
            ->join("services","visiteurs.service_id","=","services.id")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("services.nom as service","visiteurs.*","entrees.created_at as entree","entrees.sortie","entrees.id as entree_id")
            ->whereYear('visiteurs.created_at', $anneeEnCours)
            ->where("visiteurs.site_id",$user->site_id)
            ->where("services.id",$service)
            ->get();

        }

    }

    public function verifierVisiteur($cni)
    {
        $user = Auth::user();
        if($user->role=="admin" || $user->role=="visiteur")
        {
            return DB::table("visiteurs")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("visiteurs.*",)
            ->where("visiteurs.numcni",$cni)
            ->whereNull("entrees.sortie")
            ->get();
        }
        else
        {
            return DB::table("visiteurs")
            ->join("entrees","visiteurs.id","=","entrees.visiteur_id")
            ->select("visiteurs.*","entrees.created_at as entree","entrees.sortie","entrees.id as entree_id")
            ->where("visiteurs.site_id",$user->site_id)
            ->where("visiteurs.numcni",$cni)
            ->whereNull("entrees.sortie")
            ->get();

        }

    }

    // DB::table("entrees")->where("id",$id)

}
