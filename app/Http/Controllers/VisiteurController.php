<?php

namespace App\Http\Controllers;

use App\Repositories\ServiceRepository;
use App\Repositories\VisiteurRepository;
use Illuminate\Http\Request;

class VisiteurController extends Controller
{
    protected $visiteurRepository;
    protected $serviceRepository;

    public function __construct(VisiteurRepository $visiteurRepository, ServiceRepository $serviceRepository){
        $this->visiteurRepository =$visiteurRepository;
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visiteurs = $this->visiteurRepository->getAll();
        return view('visiteur.index',compact('visiteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = $this->serviceRepository->getAll();
        return view('visiteur.add',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $visiteurs = $this->visiteurRepository->store($request->all());
        return redirect('visiteur');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visiteur = $this->visiteurRepository->getById($id);
        return view('visiteur.show',compact('visiteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = $this->serviceRepository->getAll();
        $visiteur = $this->visiteurRepository->getById($id);
        return view('visiteur.edit',compact('visiteur','services'));
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
        $this->visiteurRepository->update($id, $request->all());
        return redirect('visiteur');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->visiteurRepository->destroy($id);
        return redirect('visiteur');
    }

    public function historique($cni)
    {
        $entrees = $this->visiteurRepository->historique($cni);
        $visiteur = $this->visiteurRepository->getByCni($cni);
        return view("visiteur.historique",compact("visiteur","entrees"));
    }

}
