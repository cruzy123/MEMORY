@extends('frontend.layout')
@section('content')
    <section class="hoc container clear">
        <!-- ################################################################################################ -->
        <div class="sectiontitle">
        <h6 class="heading">Liste des demandes</h6>
        </div>

        <div class="card-deck">
            @foreach ($documents as $item)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-success">
                    <img class="img-fluid" style="width:100px!important;height:100px!important" src="{{ asset('assets/images/demo/vecteur.png') }}" alt="">&nbsp;&nbsp;&nbsp;{{ $item->doc_libelle }}</h5><hr>
                        <p class="card-text">{{ $item->doc_description }}</p>
                    </div>
                    <div align="center" class="card-footer">
                        <a class="btn btn-outline-success" href="/make-demande/{{ $item->doc_id }}">Faire une demande</a>
                    </div>
                </div>                
            @endforeach
        </div>
  </section>
@endsection