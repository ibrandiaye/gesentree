{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Modifier Département')

@section('content')
<div class="row">

    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Site </a></li>
                </ol>
            </div>
            <h4 class="page-title">Enregistrer un Site</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">

        {!! Form::model($user, ['method'=>'PATCH','route'=>['user.update', $user->id]]) !!}
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
                        <input type="text" name="name" class="form-control" value="{{$user->name}}"   required>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>email </label>
                            <input type="email" name="email"  value=" {{$user->email }}" class="form-control"required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>Site</label>
                        <select class="form-control" name="site_id" id="site_id">
                            <option value="">Selectionnez</option>
                            @foreach ($sites as $site)
                            <option value="{{$site->id}}" {{$site->id==$user->site_id  ? 'selected' : ''}}>{{$site->nom}}</option>
                                @endforeach

                        </select>
                    </div>


                    <div class="col-lg-6">
                        <label>Role</label>
                        <select class="form-control" name="role" required="">
                            <option value="">Selectionner</option>
                            <option value="admin" {{$user->role=="admin" ? 'selected' : ''}}>Admin</option>
                            <option value="utilisateur" {{$user->role=="utilisateur" ? 'selected' : ''}}>Utilisateur</option>
                            <option value="visiteur" {{$user->role=="visiteur" ? 'selected' : ''}}>Utilisateur</option>

                        </select>
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
