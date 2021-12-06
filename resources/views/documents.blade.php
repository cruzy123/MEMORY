@extends('layout')
@section('content')
<div class="container-fluid p-3">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb bg-primary col-md-12">
            <li class="breadcrumb-item active text-light" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item text-light"><a class="text-light " style="text-decoration:none;!important" href="/customer/manage-users">Documents / Gérer</a></li>
        </ol>    
    </div>
    
    <div class="row">
        <div class="card" style="display:flex;margin:auto;width:98%;">
            <img src="" alt="">
            <div class="card-body">
                <h5 class="card-title">Liste des documents</h5><hr>
                <table class="table table-responsive-lg responsive-table" width="100%" id="liste" style="font-size:80%;">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Document</th>
                            <th>Description</th>
                            <th>Infos à joindre</th>
                            <th align="center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($documents as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->doc_libelle }}</td>
                                <td>{{ $value->doc_description }}</td>
                                <td align="center"><a href="/document/{{ $value->doc_id }}">Voir les pièces à joindre</a></td>
                                <td>
                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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