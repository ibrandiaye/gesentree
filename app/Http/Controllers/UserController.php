<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Repositories\SiteRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userRepository;
    protected $departementRepository;
    protected $arrondissementRepository;
    protected $siteRepository;

    public function __construct(UserRepository $userRepository,SiteRepository $siteRepository){
        $this->userRepository =$userRepository;
        $this->siteRepository = $siteRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->getAll();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sites = $this->siteRepository->getAll();
        return view('user.add',compact('sites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'role' => 'required|string',
       
        'password' => 'required|string|min:8|confirmed|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',

        //'g-recaptcha-response' => 'required|captcha',
        ], [
           
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.regex' => 'Le mot de passe doit contenir au moins une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial.',
        ]);
   
        //$users = $this->userRepository->store($request->all());
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
         
            'password' => Hash::make($request['password']),
            'role'=>$request['role'],
            'site_id'=>$request['site_id']

        ]);
        return redirect('user');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->getById($id);
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sites = $this->siteRepository->getAll();
        $user = $this->userRepository->getById($id);
        return view('user.edit',compact('user','sites'));
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
        
        $this->userRepository->update($id, $request->all());
        if(Auth::user()->role=="admin")
            return redirect('user');
        else
            return redirect()->back()->with('success', 'Utilisateur modifier avec succès.'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->destroy($id);
        return redirect('user');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, 
        [
                'password' => 'required|string|min:8|confirmed|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
            ], 
            messages: [
                'password.required' => 'Le mot de passe est obligatoire.',
                'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
                'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
                'password.regex' => 'Le mot de passe doit contenir au moins une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial.',
            ]);
        if(Auth::user()->role=="admin")
        {
            User::where("id",$request->id)->update(["password"=>Hash::make($request['password'])]);
            return redirect(to: 'user');

        }
            
        else 
        {
            User::where("id",Auth::user()->id)->update(["password"=>Hash::make($request['password'])]);
            return redirect('modifier/motdepasse')->with('success', 'Utilisateur modifier avec succès.'); 
        }


    }

    public function modifierMotDePasse()
    {
        
        return view("user.edit-password");
    }
    
}
