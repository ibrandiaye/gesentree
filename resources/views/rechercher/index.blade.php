@extends('welcome')
@section('title', '| rechercher')


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
            <h4 class="page-title">Liste Rechercher</h4>
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

        <div class="card ">
            <div class="card-header">LISTE D'ENREGISTREMENT DES Départements</div>
            <div class="card-body">

                <table  id="datatable-buttons" class="table table-bordered table-responsive-md table-striped text-center datatable-buttons">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Prenom</th>
                            <th>Nom</th>
                            <th>Date Naissance</th>
                            <th>Prenom Pere</th>
                            <th>Prenom Mere</th>
                            <th>nom Mere</th>
                             <th> Motif</th>
                            <th>Nom</th>

                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($recherchers as $rechercher)
                        <tr>
                            <td>{{ $rechercher->id }}</td>
                            <td>{{ $rechercher->prenom }}</td>
                            <td>{{ $rechercher->nom }}</td>
                            <td>{{ $rechercher->datenaiss }}</td>
                            <td>{{ $rechercher->prenompere }}</td>
                            <td>{{ $rechercher->nom }}</td>
                             <td>{{ $rechercher->prenommere }}</td>
                            <td>{{ $rechercher->nommere }}</td>
                            <td>{{ $rechercher->motif }}</td>
                            <td>
                                <a href="{{ route('rechercher.edit', $rechercher->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['rechercher.destroy', $rechercher->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!}



                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




@endsection
