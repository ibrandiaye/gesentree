{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Modifier Employe')

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
            <h4 class="page-title">Modifier un Employe</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">

        {!! Form::model($employe, ['method'=>'PATCH','route'=>['employe.update', $employe->id]]) !!}
            @csrf
             <div class="card ">
                <div class="card-header text-center">FORMULAIRE DE MODIFICATION Département</div>
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
                            <input type="text" name="prenom"  value="{{ $employe->prenom }}" class="form-control"  required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Nom</label>
                        <input type="text" name="nom" class="form-control" value="{{$employe->nom}}"   required>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Titre Employe</label>
                            <input type="text" name="titre"  value="{{ $employe->titre }}" class="form-control"  required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Service</label>
                        <select class="form-control" name="service_id" required="">
                            <option value="">Selectionner</option>
                            @foreach ($services as $service)
                            <option {{old('service_id', $employe->service_id) == $service->id ? 'selected' : ''}}
                                value="{{$service->id}}">{{$service->nom}}</option>
                                @endforeach

                        </select>
                    </div>
                    <div>
                        <center>
                            <button type="submit" class="btn btn-success btn btn-lg "> MODIFIER</button>
                        </center>
                    </div>


                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>


@endsection
