<?php

namespace App\Http\Controllers;

use App\Repositories\CarteRepository;
use Illuminate\Http\Request;

class CarteController extends Controller
{
    protected $carteRepository;

    public function __construct(CarteRepository $carteRepository){
        $this->carteRepository =$carteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cartes = $this->carteRepository->getAll();
        return view('carte.index',compact('cartes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carte.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cartes = $this->carteRepository->store($request->all());
        return redirect('carte');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carte = $this->carteRepository->getById($id);
        return view('carte.show',compact('carte'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carte = $this->carteRepository->getById($id);
        return view('carte.edit',compact('carte'));
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
        $this->carteRepository->update($id, $request->all());
        return redirect('carte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->carteRepository->destroy($id);
        return redirect('carte');
    }

    public function getByCni($cni)
    {
        $carte = $this->carteRepository->getByCni($cni);
        return response()->json($carte);
    }
}
