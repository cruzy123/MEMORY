@extends('frontend.layout')
@section('content')
    <section class="hoc container clear">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><span class="text-success">{{ $infos[0]->doc_libelle }}</span></h5><hr>
                <p class="card-text">
                    <form action="/make-demande" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="p-3">
                            <input name="document" value="{{ $infos[0]->doc_id }}" hidden="true">
                            @foreach ($infos as $value)                                
                                <div class="row m-2">
                                    <div class="form-group col-md-12">
                                        <label for="nom">Type de pièces : {{ $value->info_doc_type }} </label>               
                                        <div class="row m-3">
                                            <div class="form-group col-md-6">
                                                <span class="text-success">Libelle : {{ $value->info_libelle }} </span>
                                            </div>
                                            <div class="form-group col-md-6">
                                                @if($value->info_doc_type == 'Fichier')
                                                    <input required class="form-control-file" type="file" name="piece{{ $value->info_id }}" id="piece{{ $value->info_id }}">
                                                @else
                                                    <input required class="form-control" type="text" name="piece{{ $value->info_id }}" id="">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group col-md-12">
                                <button class="btn btn-success" type="submit">Soumettre la demande</button>
                            </div>
                        </div>
                    </form>
                </p>
            </div>
        </div>

  </section>
@endsection