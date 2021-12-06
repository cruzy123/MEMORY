@extends('layout')
@section('content')
    <div class="container-fluid p-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb bg-primary col-md-12">
                <li class="breadcrumb-item active text-light" aria-current="page">Dashboard</li>
                <li class="breadcrumb-item text-light"><a class="text-light " style="text-decoration:none;!important" href="/demandes">Voir demande</a></li>
            </ol>    
        </div>
        
        <div class="row justify-content-center">
            <div class="card col-md-5 p-2 m-2" style="border-style:none;" >
                <img src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">Informations du demandeur</h5><hr>
                    <div class="p-3">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nom">Nom<span class="text-danger">&nbsp;*</span></label>
                                <input id="nom" disabled class="form-control bg-primary text-light" value="{{ $info->em_nom }}" type="text" name="nom">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="prenoms">Prenoms<span class="text-danger">&nbsp;*</span></label>
                                <input id="prenoms" disabled class="form-control bg-primary text-light" value="{{ $info->em_prenoms }}" type="text" name="prenoms">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nom">Email<span class="text-danger">&nbsp;*</span></label>
                                <input id="email" disabled class="form-control bg-primary text-light" value="{{ $info->em_email }}" type="email" name="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nom">Téléphone</label>
                                <input id="tel" disabled class="form-control bg-primary text-light" value="{{ $info->em_contact }}" type="tel" name="telephone">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nom">Sexe<span class="text-danger">&nbsp;*</span></label>
                                <input disabled id="telpro" class="form-control bg-primary text-light" value="{{ $info->em_sexe }}" type="tel" name="telephonepro">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="poste">Poste<span class="text-danger">&nbsp;*</span></label>
                                <input disabled id="poste" class="form-control bg-primary text-light" value="{{ $info->em_poste }}" type="text" name="poste">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-5 p-2 m-2" >
                <img src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">Informations fournises</h5><hr>
                    <div class="p-3">
                        @foreach ($infos as $value)
                                
                            <div class="row m-2">
                                <div class="form-group col-md-12">
                                    <label for="nom">Info : {{ $value->info_libelle }} <span class="text-primary">( {{ $value->info_doc_type }} )</span></label><br>
                                    @if ($value->info_doc_type == 'Fichier')
                                        @if($value->deminfo_value != '')
                                            <a class="btn btn-outline-primary" target="_blank" href="/read/{{ $value->deminfo_value }}">Voir le fichier <i class="fa fa-eye"></i></a>
                                        @else
                                            <span class="text-danger">Non fournie <i class="fa fa-2x fa-angry text-danger"></i></span>
                                        @endif
                                    @else
                                        <span class="text-primary">{{ $value->deminfo_value }}</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection