{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Modifier Service')

@section('content')
<div class="row">

    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Service </a></li>
                </ol>
            </div>
            <h4 class="page-title">Modifier un Service</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">

        {!! Form::model($service, ['method'=>'PATCH','route'=>['service.update', $service->id]]) !!}
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
                            <label>Nom</label>
                        <input type="text" name="nom" class="form-control" value="{{$service->nom}}"   required>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <label>Site</label>
                        <select class="form-control" name="site_id" required="">
                            <option value="">Selectionner</option>
                            @foreach ($sites as $site)
                            <option {{old('site_id', $service->site_id) == $site->id ? 'selected' : ''}}
                                value="{{$site->id}}">{{$site->nom}}</option>
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
