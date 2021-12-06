@extends('layout')
@section('content')
<div class="container-fluid p-3">


    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <ol class="breadcrumb bg-primary col-md-12">
            <li class="breadcrumb-item active text-light" aria-current="page">Dashboard</li>
            <li class="breadcrumb-item text-light"><a class="text-light " style="text-decoration:none;!important" href="#">Employés / Gérer</a></li>
        </ol>    
    </div>
    
    <div class="row">
        <div class="card" style="display:flex;margin:auto;width:98%;">
            <img src="" alt="">
            <div class="card-body">
                <h5 class="card-title">Liste des employés</h5><hr>
                <table class="table table-responsive-lg responsive-table" width="100%" id="liste" style="font-size:80%;">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Poste</th>
                            <th>Nom Prénoms</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Sexe</th>
                            <th>Date de naissance</th>
                            <th align="center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->em_poste }}</td>
                                <td>{{ $value->em_nom.' '.$value->em_prenoms }}</td>
                                <td>{{ $value->em_contact }}</td>
                                <td>{{ $value->em_email }}</td>
                                <td>{{ $value->em_sexe }}</td>
                                <td>{{ $value->em_date_naissance }}</td>
                                <td align="center">
                                    <a href="#" class="btn btn-primary"><i class="fa fa-eye"></i></a>
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