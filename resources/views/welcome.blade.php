@extends('layouts.app')

@section('content')

<!-------------------------------------------------------------->
<div id="carouselExampleIndicators"  class="carousel py-3 slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="/images/index7.jpeg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Vos offres sont attendus</h5>
        <p>Proposer des offres de ventes ou de locations immobilières</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/images/index8.jpeg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Vous cherchez de chambres ou de maisons à louer, à acheter ?</h5>
        <p>Faites des demandes d'achats ou de locations immobiliers</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="/images/index5.jpeg" alt="Third slide">

      <div class="carousel-caption d-none d-md-block">
        <h5>Rechercher et satisfaire vos besoins</h5>
        <p>Quelque soit ce que vous voulez, parcourez les annonces, triez selon vos critères.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<!------------------------------------------------------------------>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Les locations du moment</h1>
        <p class="lead text-muted">Nous vous avons sélectionné les meilleurs offres et demandes de locations immobilière. Vous n’avez qu’à choisir celui qui vous correspond le mieux !</p>
        <p>
          <!--<a href="{{ route('dmd.create')}}" class="btn btn-primary my-2">Demander</a>
          <a href="{{ route('offre.create')}}" class="btn btn-success my-2">Offrir.......</a><br>-->
          <a href="{{ route('search.get')}}" class="btn btn-dark w-50">Rechercher - Trier</a>
          
        </p>

      </div>
    </div>
  </section>

  
    @if(count($offs)!=0)
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
            @if($off->images == "")
              <img src="/images/img1.jpg" class="annonce-img">
            @else
              <img src="/getimg2/{{$off->images }}" class="annonce-img">
            @endif
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
@endif
{{count($dmds)}}

@if(count($dmds) != 0)
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
            @if($dmd->images == "")
              <img src="/images/img3.jpg" class="annonce-img">
            @else
              <img src="/getimg2/{{$dmd->images }}" class="annonce-img">
            @endif
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

@endif




@endsection

