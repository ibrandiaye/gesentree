{{-- \resources\views\permissions\create.blade.php --}}
@extends('welcome')

@section('title', '| Enregister Département')

@section('content')
<div class="row">

    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                    <li class="breadcrumb-item active"><a href="javascript: void(0);">Rechercher </a></li>
                </ol>
            </div>
            <h4 class="page-title">Enregistrer  Rechercher</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="{{ route('rechercher.store') }}" method="POST">
            @csrf
             <div class="card">
                <div class="card-header  text-center">FORMULAIRE D'ENREGISTREMENT </div>
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
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Prenom</label>
                                <input type="text" name="prenom"  value="{{ old('prenom') }}" class="form-control"  required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nom </label>
                                <input type="text" name="nom"  value="{{ old('nom') }}" class="form-control"  required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Date Naissance </label>
                                <input type="text" name="datenaiss"  value="{{ old('datenaiss') }}" class="form-control"  required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Prenom Pere </label>
                                <input type="text" name="prenompere"  value="{{ old('prenompere') }}" class="form-control"  required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Prenom Mere </label>
                                <input type="text" name="prenommere"  value="{{ old('prenommere') }}" class="form-control"  required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nom Mere </label>
                                <input type="text" name="nommere"  value="{{ old('nommere') }}" class="form-control"  required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Motif </label>
                                <input type="text" name="motif"  value="{{ old('motif') }}" class="form-control"  required>
                            </div>
                        </div>
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


