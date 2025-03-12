<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\VisiteurRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $visiteurRepository;
    protected $serviceRepository;
    protected $employeRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(VisiteurRepository $visiteurRepository,ServiceRepository $serviceRepository,
    EmployeRepository $employeRepository)
    {
        $this->middleware('auth');
        $this->serviceRepository = $serviceRepository;
        $this->visiteurRepository = $visiteurRepository;
        $this->employeRepository = $employeRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nbEntreeJour = $this->visiteurRepository->nbVisiteurToday();
        $nbEntreeMois = $this->visiteurRepository->nbVisiteurMonth();
        $nbEntreeAnnee = $this->visiteurRepository->nbVisiteurYear();
        $nbService = $this->serviceRepository->nbService();
        $nbEmploye = $this->employeRepository->nbEmploye();
        //dd($nbEmploye);
        return view('home',compact("nbEntreeJour","nbEntreeMois","nbEntreeAnnee","nbEntreeAnnee",
    "nbService","nbEmploye"));
    }
}
