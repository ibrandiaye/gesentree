@extends('welcome')

@section('content')
<div class="row">

    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tableau de bord</a></li>
                </ol>
            </div>
{{--             <h4 class="page-title">Liste Visiteur</h4>
 --}}        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-xl-3">
        <div class="card widget-box-three">
            <div class="card-body">
                <div class="float-right mt-2">
                    <i class="mdi mdi-chart-areaspline display-3 m-0"></i>
                </div>
                <div class="overflow-hidden">
                    <p class="text-uppercase font-weight-medium text-truncate mb-2">Total de l'année</p>
                    <h2 class="mb-0"><span data-plugin="counterup">{{$nbEntreeAnnee}}</span> <i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                    {{-- <p class="text-muted mt-2 m-0"><span class="font-weight-medium">Last:</span> 30.4k</p> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-lg-6 col-xl-3">
        <div class="card widget-box-three">
            <div class="card-body">
                <div class="float-right mt-2">
                    <i class="mdi mdi-calendar display-3 m-0"></i>
                </div>
                <div class="overflow-hidden">
                    <p class="text-uppercase font-weight-medium text-truncate mb-2">Total Mois</p>
                    <h2 class="mb-0"><span data-plugin="counterup">{{$nbEntreeMois}}</span> <i class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                    {{-- <p class="text-muted mt-2 m-0"><span class="font-weight-medium">Last:</span> 1250</p> --}}
                </div>

            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-lg-6 col-xl-3">
        <div class="card widget-box-three">
            <div class="card-body">
                <div class="float-right mt-2">
                    <i class="mdi mdi-av-timer display-3 m-0"></i>
                </div>
                <div class="overflow-hidden">
                    <p class="text-uppercase font-weight-medium text-truncate mb-2">Total Jour </p>
                    <h2 class="mb-0"><span data-plugin="counterup">{{$nbEntreeJour}}</span><i class="mdi mdi-arrow-up text-success font-24"></i></h2>
                    {{-- <p class="text-muted mt-2 m-0"><span class="font-weight-medium">Last:</span> 40.33k</p> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->

    <div class="col-lg-6 col-xl-3">
        <div class="card widget-box-three">
            <div class="card-body">
                <div class="float-right mt-2">
                    <i class="mdi mdi-layers display-3 m-0"></i>
                </div>
                <div class="overflow-hidden">
                    <p class="text-uppercase font-weight-medium text-truncate mb-2">Total Sevice</p>
                    <h2 class="mb-0"><span data-plugin="counterup">{{$nbService}}</span> <i class="mdi mdi-arrow-down text-danger font-24"></i></h2>
                    {{-- <p class="text-muted mt-2 m-0"><span class="font-weight-medium">Last:</span> 956</p> --}}
                </div>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
<!-- end row -->
{{-- <div class="row">
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

       
    </div>
</div> --}}

@endsection
