@extends('layout')
@section('content')
    <div class="container-fluid p-3">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <ol class="breadcrumb bg-primary col-md-12">
                <li class="breadcrumb-item active text-light" aria-current="page">Dashboard</li>
                <li class="breadcrumb-item text-light"><a class="text-light " style="text-decoration:none;!important" href="/demandes">Voir pièces</a></li>
            </ol>    
        </div>
        
        <div class="row justify-content-center">
            <div class="card col-md-6 p-2 m-2" >
                <img src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $infos[0]->doc_libelle }} ( Informations additionnelles )</h5><hr>
                    <div class="p-3">
                        @foreach ($infos as $value)
                                
                            <div class="row m-2">
                                <div class="form-group col-md-12">
                                    <label for="nom">Type de pièces : {{ $value->info_doc_type }} </label>
                                    <br><span class="text-primary">&ensp;&ensp;&ensp;&ensp;Libelle : {{ $value->info_libelle }} </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection