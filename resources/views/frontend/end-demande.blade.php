@extends('frontend.layout')
@section('content')
    <section class="hoc container clear">

        <div class="row justify-content-center">
                <div class="card col-md-7">
                    <div class="card-body">
                        <h5 class="card-title text-success">Demande envoyée</h5><hr>
                        <p class="card-text">Votre demande a bien été soumise. Le temps pour le service administration de la consulter et
                             vous aurez un retour.<br>Suivez votre demande avec ce code <span class="text-bold text-success">{{ $code }}</span></p>
                    </div>
                </div>
        </div>
  </section>
@endsection