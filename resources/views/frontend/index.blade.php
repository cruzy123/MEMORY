@extends('frontend.layout')
@section('content')
    <section class="hoc container clear">
        <!-- ################################################################################################ -->
        <div class="sectiontitle">
        <h6 class="heading">Quelques demandes populaires</h6>
        </div>

        <div class="card-columns">
            @foreach ($documents as $item)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-success">{{ $item->doc_libelle }}</h5><hr>
                        <p class="card-text">{{ $item->doc_description }}</p>
                    </div>
                </div>                
            @endforeach
        </div>

        {{-- <ul class="nospace group center">
        <li class="one_third first">
            <article><a href="#"><i></i></a>
            <h6>Demande d'autorisation d'absence</h6>
            <p class="btmspace-30">Dans les cas d'urgence cette demande vous permet de vous absentez </p>
            <footer><a class="btn" href="#">Détails</a></footer>
            </article>
        </li>
        <li class="one_third">
            <article><a href="#"><i></i></a>
            <h6 class="heading">Attestation de présence au poste</h6>
            <p class="btmspace-30">Cette demande vous permet de justifier votre présence au poste </p>
            <footer><a class="btn" href="#">Détails</a></footer>
            </article>
        </li>
        <li class="one_third">
            <article><a href="#"><i></i></a>
            <h6 class="heading">Demande de congés de maternité</h6>
            <p class="btmspace-30">Cette demande concerne les femmes ayants récemment accouchées</p>
            <footer><a class="btn" href="#">Détails</a></footer>
            </article>
        </li>
        </ul> --}}
    <!-- ################################################################################################ -->
  </section>
@endsection