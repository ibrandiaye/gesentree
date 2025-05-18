<?php

namespace App\Http\Controllers;

use App\Repositories\RechercherRepository;
use Illuminate\Http\Request;

class RechercherController extends Controller
{
    protected $rechercherRepository;

    public function __construct(RechercherRepository $rechercherRepository){
        $this->rechercherRepository =$rechercherRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $recherchers = $this->rechercherRepository->getAll();
        return view('rechercher.index',compact('recherchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rechercher.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recherchers = $this->rechercherRepository->store($request->all());
        return redirect('rechercher');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rechercher = $this->rechercherRepository->getById($id);
        return view('rechercher.show',compact('rechercher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rechercher = $this->rechercherRepository->getById($id);
        return view('rechercher.edit',compact('rechercher'));
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
        $this->rechercherRepository->update($id, $request->all());
        return redirect('rechercher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->rechercherRepository->destroy($id);
        return redirect('rechercher');
    }


}
