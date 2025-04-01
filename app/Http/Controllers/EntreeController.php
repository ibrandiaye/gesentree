<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeRepository;
use App\Repositories\EntreeRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\VisiteurRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EntreeController extends Controller
{
    protected $entreeRepository;
    protected $employeRepository;
    protected $visiteurRepository;
    protected $serviceRepository;

    public function __construct(EntreeRepository $entreeRepository, EmployeRepository $employeRepository,
    VisiteurRepository $visiteurRepository,ServiceRepository $serviceRepository){
        $this->entreeRepository =$entreeRepository;
        $this->employeRepository = $employeRepository;
        $this->visiteurRepository = $visiteurRepository;
        $this->serviceRepository = $serviceRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role=="admin")
        {
            $visiteurs = $this->visiteurRepository->get();
        }
        else
        {
            $visiteurs = $this->visiteurRepository->getBySite($user->site_id);

        }
       // $entrees = $this->entreeRepository->getAll();
        return view('entree.index',compact('visiteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->role=="admin")
            $services = $this->serviceRepository->getAll();
        else
            $services = $this->serviceRepository->getBySite($user->site_id);
        $employes = $this->employeRepository->getAll();
        return view('entree.add',compact('employes','services','employes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->service_id);

        $user = Auth::user();
        $base64Image = $request->input('image'); // Récupérer l'image encodée
        $fileName = '';
        if (preg_match('/^data:image\/(\w+);base64,/', $base64Image, $matches)) {
            $extension = $matches[1]; // Récupérer l'extension (png, jpg, etc.)
            $base64Image = substr($base64Image, strpos($base64Image, ',') + 1); // Supprimer le préfixe
            $base64Image = base64_decode($base64Image); // Décoder en binaire

            // Générer un nom unique
            $fileName = 'image_' . time() . '.' . $extension;
            $filePath = public_path('uploads/' . $fileName);

            // Enregistrer l'image dans public/uploads/
            file_put_contents($filePath, $base64Image);

        }
        if($user->role=="admin") 
        {
            $service = $this->serviceRepository->getById($request->service_id);
            $request->merge(["site_id"=>$service->site_id,'photo'=>$fileName]);

        }
        else
        {
            $request->merge(["site_id"=>$user->site_id,'photo'=>$fileName]);

        }
        $chercher = DB::table("recherchers")
        ->where([['nom',$request->nom],['prenom',$request->prenom],['datenaiss',$request->datenaiss]])
        ->orwhere([['nom',$request->nom],['prenom',$request->prenom],['prenompere',$request->prenompere]])
        ->orwhere([['nom',$request->nom],['prenom',$request->prenom],['nommere',$request->nommere],['prenommere',$request->prenommere]])
        ->first();
        $message = null;
        if($chercher)
        {
            $request->merge(["commentaire"=>$chercher->motif]);
            $visiteur =  $this->visiteurRepository->store($request->only([ 'site_id','service_id','employe_id','nom','prenom','datenaiss','lieunaiss','numelec','numcni','commune',
            'sexe','nationalite','date_emission','date_expiration','mrz','photo','numcarte','prenompere','nommere','prenommere','commentaire']));
            $message = " Attention Personne Rechercher pour motif : ".$chercher->motif;
        }
        else
        {
            $visiteur =  $this->visiteurRepository->store($request->only([ 'site_id','service_id','employe_id','nom','prenom','datenaiss','lieunaiss','numelec','numcni','commune',
            'sexe','nationalite','date_emission','date_expiration','mrz','photo','numcarte','prenompere','nommere','prenommere']));
        }
      
        $request->merge(["visiteur_id"=>$visiteur->id]);
        $entrees = $this->entreeRepository->store($request->all());
        if($chercher)
            return redirect('visiteur/by/site/'.$request->site_id)->with("message",$message);
        else
        return redirect('visiteur/by/site/'.$request->site_id)->with("success","Enregistrement avec succée");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entree = $this->entreeRepository->getById($id);
        return view('entree.show',compact('entree'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employes = $this->employeRepository->getAll();
        $entree = $this->entreeRepository->getById($id);
        return view('entree.edit',compact('entree','employes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->entreeRepository->update($id, $request->all());
        return redirect('entree');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->entreeRepository->destroy($id);
        return redirect('entree');
    }

    public function getVisiteurBySite($site)
    {
        $user = Auth::user();
        if($user->role=="admin")
        {
            $visiteurs = $this->visiteurRepository->get();
        }
        else
        {
            $visiteurs = $this->visiteurRepository->getBySite($user->site_id);

        }
        return view("entree.index",compact("visiteurs"));
    }

    public function saveSortir($id)
    {
        DB::table("entrees")->where("id",$id)->update(['sortie'=> date('Y-m-d H:i:s')]);
        return redirect()->back()->with("success","Sortie Enregistre avec succés");
    }
   
}
