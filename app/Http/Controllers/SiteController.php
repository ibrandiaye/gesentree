<?php

namespace App\Http\Controllers;

use App\Repositories\SiteRepository;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    protected $siteRepository;

    public function __construct(SiteRepository $siteRepository){
        $this->siteRepository =$siteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $sites = $this->siteRepository->getAll();
        return view('site.index',compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sites = $this->siteRepository->store($request->all());
        return redirect('site');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $site = $this->siteRepository->getById($id);
        return view('site.show',compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = $this->siteRepository->getById($id);
        return view('site.edit',compact('site'));
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
        $this->siteRepository->update($id, $request->all());
        return redirect('site');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->siteRepository->destroy($id);
        return redirect('site');
    }
  
    
}
