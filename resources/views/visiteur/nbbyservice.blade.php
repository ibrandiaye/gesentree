@extends('welcome')
@section('title', '| service')


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
            <h4 class="page-title">Nombre de Visiteurs Par service</h4>
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
            <div class="card-header"> Nombre de Visiteurs Par service</div>
            <div class="card-body">

                <table  id="datatable-buttons" class="table table-bordered table-responsive-md table-striped text-center datatable-buttons">
                    <thead>
                        <tr>

                            <th>Site</th>
                            <th>Nombre</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->nom ?? " " }}</td>
                            <td>{{ $service->nb }}</td>
                            <td>
                               {{--  <a href="{{ route('service.edit', $service->id) }}" role="button" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                {!! Form::open(['method' => 'DELETE', 'route'=>['service.destroy', $service->id], 'style'=> 'display:inline', 'onclick'=>"if(!confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?')) { return false; }"]) !!}
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                {!! Form::close() !!} --}}

                                <a href="{{ route('visiteur.par.periode', ['periode'=>$periode,'service'=>$service->id]) }}" role="button" class="btn btn-primary"><i class="fas fa-eye"></i></a>

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
