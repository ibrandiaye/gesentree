@extends('welcome')
@section('title', '| visiteur')


@section('content')
<div class="row">

    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Visiteur </a></li>
                </ol>
            </div>
            <h4 class="page-title">Liste Visiteur</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('message'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card card-profile-feed">
        <div class="card-header card-header-action" style="padding: 0px; height: 90px;">
            <div class="media ">
                <div class="media-img-wrap d-flex mr-10">
                    <div class="avatar avatar-sm">
                        <img src="{{ asset('uploads/'.$visiteur->photo) }}" height="80" style="margin-top: 0px;padding-top: 0px;" alt="user" class="avatar-img rounded-circle">
                    </div>
                </div>
                <div class="media-body align-items-center"  style="margin-left: 40px;">
                    <div class="text-capitalize font-weight-500 text-dark">{{$visiteur->prenom}} {{$visiteur->nom}}</div>
                    <div>{!!$visiteur->mrz !!}</div>
                </div>
            </div>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><span><i style="margin-left: 0px;" class="ion ion-md-calendar font-18 text-light-20   mr-10"></i><span> Date Naissance:</span></span><span class="ml-5 text-dark">{{$visiteur->datenaiss}}</span></li>
            <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10" style="margin-left: 0px;" ></i><span> Lieu de Naissance:</span></span><span class="ml-5 text-dark">{{$visiteur->lieunaiss}}</span></li>
            <li class="list-group-item"><span><i class="ion ion-md-home font-18 text-light-20 mr-10"></i><span> Numéro CNI:</span></span><span class="ml-5 text-dark">{{$visiteur->numcni}}</span></li>
            <li class="list-group-item"><span><i class="ion ion-md-pin font-18 text-light-20 mr-10"></i><span> Commune:</span></span><span class="ml-5 text-dark">{{$visiteur->commune}}</span></li>
            <li class="list-group-item"><span><i class="ion ion-md-calendar font-18 text-light-20 mr-10"></i><span> Sexe :</span></span><span class="ml-5 text-dark">{{$visiteur->sexe}}</span></li>
            <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span> Nationalité:</span></span><span class="ml-5 text-dark">{{$visiteur->nationalite}}</span></li>



            <li class="list-group-item"><span><i class="ion ion-md-calendar font-18 text-light-20 mr-10"></i><span> Parent :</span></span><span class="ml-5 text-dark">{{$visiteur->prenompere}};{{$visiteur->prenommere}};{{$visiteur->nommere}}</span></li>
            @if ($visiteur->commentaire)

           <li class="list-group-item"><span><i class="ion ion-md-calendar font-18 text-light-20 mr-10"></i><span> Commentaire :</span></span><span class="ml-5 text-danger">{{$visiteur->commentaire}}</span></li>
           @endif
           @foreach ($entrees as $entree)
           <h4>{{ $entree->service }}</h4>
           <li class="list-group-item"><span><i class="ion ion-md-pin font-18 text-light-20 mr-10"></i><span> Date Entree:</span></span><span class="ml-5 text-dark">{{ date('d-m-Y H:i', strtotime($entree->created_at)) }}</span></li>
           <li class="list-group-item"><span><i class="ion ion-md-pin font-18 text-light-20 mr-10"></i><span> Date Sortie:</span></span><span class="ml-5 text-dark">
                   {{ date('d-m-Y H:i', strtotime($entree->sortie)) }}
              </span></li>

           @endforeach
        </ul>
     </div>
    </div>
</div>

@endsection
