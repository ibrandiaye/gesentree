<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    protected $employeRepository;
    protected $serviceRepository;

    public function __construct(EmployeRepository $employeRepository, ServiceRepository $serviceRepository){
        $this->employeRepository =$employeRepository;
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = $this->employeRepository->getAll();
        return view('employe.index',compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = $this->serviceRepository->getAll();
        return view('employe.add',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employes = $this->employeRepository->store($request->all());
        return redirect('employe');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = $this->employeRepository->getById($id);
        return view('employe.show',compact('employe'));
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
        $employe = $this->employeRepository->getById($id);
        return view('employe.edit',compact('employe','services'));
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
        $this->employeRepository->update($id, $request->all());
        return redirect('employe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->employeRepository->destroy($id);
        return redirect('employe');
    }
}
