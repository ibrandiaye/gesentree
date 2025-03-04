{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Enregister Employe')

@section('content')
<div class="row">

    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Employe </a></li>
                </ol>
            </div>
            <h4 class="page-title">Enregistrer un Employe</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="{{ route('employe.store') }}" method="POST">
            @csrf
             <div class="card">
                <div class="card-header  text-center">FORMULAIRE D'ENREGISTREMENT D'UN Département</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Prenom Employe</label>
                            <input type="text" name="prenom"  value="{{ old('prenom') }}" class="form-control"  required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nom Employe</label>
                            <input type="text" name="nom"  value="{{ old('nom') }}" class="form-control"  required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Titre Employe</label>
                            <input type="text" name="titre"  value="{{ old('titre') }}" class="form-control"  required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Service</label>
                        <select class="form-control" name="service_id" required="">
                            <option value="">Selectionner</option>
                            @foreach ($services as $service)
                            <option value="{{$service->id}}">{{$service->nom}}</option>
                                @endforeach

                        </select>
                    </div>

                    <div>
                        <center>
                            <button type="submit" class="btn btn-success btn btn-lg "> ENREGISTRER</button>
                        </center>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>


@endsection


