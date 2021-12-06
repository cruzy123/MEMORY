{{-- {{ dd($demandes) }} --}}

@extends('layout')
@section('content')
<div class="container-fluid p-3">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb bg-primary col-md-12">
            <li class="breadcrumb-item active text-light" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item text-light"><a class="text-light " style="text-decoration:none;!important" href="/customer/manage-users">Demandes / Gérer</a></li>
        </ol>    
    </div>
    
    <div class="row">
        <div class="card" style="display:flex;margin:auto;width:98%;">
            <img src="" alt="">
            <div class="card-body">
                <h5 class="card-title">Liste des demandes</h5><hr>
                <table class="table table-responsive-lg responsive-table" width="100%" id="liste" style="font-size:80%;">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Document</th>
                            <th>Demandeur</th>
                            <th>Date demande</th>
                            <th>Statut</th>
                            <th align="center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($demandes as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->dem_code }}</td>
                                <td>{{ $value->doc_libelle }}</td>
                                <td>{{ $value->em_nom.' '.$value->em_prenoms }}</td>
                                <td>{{ $value->dem_creation_date }}</td>
                                @if ($value->dem_statut == 1)
                                    <td class="text-success text-bold" align="center">Validée</td>
                                    <td align="center">
                                        <a href="/view-demande/{{ $value->dem_id }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </td>
                                @elseif($value->dem_statut == 0)
                                    <td class="text-danger text-bold" align="center">Rejetée</td>
                                    <td align="center">
                                        <a href="/view-demande/{{ $value->dem_id }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                    </td>
                                @else
                                    <td class="text-warning text-bold" align="center"><strong>En attente</strong> </td>
                                    <td align="center">
                                        <a href="/view-demande/{{ $value->dem_id }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                        <a href="/validate/{{ $value->dem_id }}" class="btn btn-success"><i class="fa fa-thumbs-o-up"></i></a>
                                        <a href="/reject/{{ $value->dem_id }}" class="btn btn-danger"><i class="fa fa-thumbs-o-down"></i></a>
                                    </td>
                                @endif                                
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
    
    </div>
@endsection