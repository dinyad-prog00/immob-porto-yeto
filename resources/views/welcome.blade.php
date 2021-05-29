@extends('layouts.app')

@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Les locations du moment</h1>
        <p class="lead text-muted">Nous vous avons sélectionné les meilleurs offres et demande de locations immobilière. Vous n’avez qu’à choisir celui qui vous correspond le mieux !</p>
        <p>
          <a href="{{ route('dmd.create')}}" class="btn btn-primary my-2">Demander</a>
          <a href="{{ route('offre.create')}}" class="btn btn-success my-2">Offrir.......</a><br>
          <a href="{{ route('search.get')}}" class="btn btn-dark w-50">Rechercher - Trier</a>
          
        </p>

      </div>
    </div>
  </section>

  
    
      <div class="col-lg-6 col-md-8 mx-auto text-center">
        <h1 class="fw-light">Offres</h1>
       
      </div>
    
  


    <div class="album py-5 bg-light mt-2">
    <div class="container ">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">



      @foreach($offs as $off)
        @if($off->user_id != Auth::id())
        <div class="col mb-2">
          <div class="card shadow-sm">
            <img src="/images/img1.jpg">
            <div class="card-body">
                <h3>{{ $off->titre }}</h3>
                @if($off->type == 'location')
                  <h4 class="text-muted">A louer</h4>
                @else
                  <h4 class="text-muted">A vendre</h4>
                @endif
                <h6 >{{ $off->user->name }}</h6>
              
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{route('offre.show2',$off->id)}}">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Consulter</button>
                  </a>
                  @if($off->dejaSous(Auth::id()) == false )
                  <a href="/offre/{{ $off->id }}/souscreate">
                  <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#staticBackdropLive{{ $off->id }}">Souscrire</button></a>
                  @endif
                </div>
                <small class="text-muted"><strong>{{ $off->prix }}FCFA</strong></small>
              </div>
            </div>
          </div>
        </div>
        @endif
        
     @endforeach

    </div>
</div>
</div>
      <div class="col-lg-6 col-md-8 mx-auto text-center">
        <h1 class="fw-light">Demandes</h1>
       
      </div>
   

  <div class="album py-5 bg-light mt-2">
    <div class="container ">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @foreach($dmds as $dmd)
           @if($dmd->user_id != Auth::id())
        <div class="col mb-2">
          <div class="card shadow-sm">
            <img src="/images/img3.jpg">
            <div class="card-body">
                <h3>{{ $dmd->titre }}</h3>
                @if($dmd->type == 'location')
                  <h4 class="text-muted">A louer</h4>
                @else
                  <h4 class="text-muted">A vendre</h4>
                @endif
                <h6 >{{ $dmd->user->name }} </h6>
              
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Voir</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Offrir</button>
                </div>
                <small class="text-muted"><strong>{{ $dmd->prix }}FCFA</strong></small>
              </div>
            </div>
          </div>
        </div>
          @endif
    @endforeach
    </div>
</div>
</div>





@endsection