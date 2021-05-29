@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row start-content-center py-lg-5">
        <div class="col-md-12 py-5" >
            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                      {{ session('message') }}
                </div>
            @endif
            <div class="card">
                
                <div class="card-header">
                    {{ __('Tableau de bord') }}
                    
                    <div class="btn-group ml-5">
                      <button type="button" class="btn btn-info"> + Créer </button>
                      <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false" id="dropdown" aria-haspopup="true">
                        <span class="visually-hidden"></span>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdown">
                        <li><h6 class="dropdown-header" href="#">Annonce</h6></li>
                        <li><a class="dropdown-item" href="{{route('offre.create')}}">Offre</a></li>
                        <li><a class="dropdown-item" href="{{route('dmd.create')}}">Demande</a></li>
                      </ul>
                    </div>

                   
                </div>

                <div class="card-body">
                    <nav>
                      <div class="nav nav-tabs mb-3 start-content-center" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-offre-tab" data-toggle="tab" href="#nav-offre" role="tab" aria-controls="nav-offre" aria-selected="true">Mes offres</a>
                        <a class="nav-link" id="nav-dmd-tab" data-toggle="tab" href="#nav-dmd" role="tab" aria-controls="nav-dmd" aria-selected="false">Mes demandes</a>
                        <a class="nav-link" id="nav-sous-tab" data-toggle="tab" href="#nav-sous" role="tab" aria-controls="nav-sous" aria-selected="false">Mes souscriptions</a>
                      </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

              <div class="bd-example">
                  

        <div class="tab-content" id="nav-tabContent">

          <div class="tab-pane fade show card-body active" id="nav-offre" role="tabpanel" aria-labelledby="nav-offre-tab">
            <div class="album  bg-light mt-2">
              <div class="container ">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    @if(count(Auth::user()->offres) == 0)
                    
                    <img src="images/vide.png">
                    
                    @endif

                    
                  
        


                  @foreach(Auth::user()->offres as $off)
                  <div class="col mb-2">
                    <div class="card shadow-sm">
                      @if($off->images == "")
                      <img src="/images/img1.jpg" class="annonce-img">
                      @else
                      <img src="/getimg2/{{$off->images }}" class="annonce-img">
                      @endif

                      <div class="card-body">
                          <h3>{{ $off->titre }}</h3>
                          <p class="card-text">{{ $off->created_at->format("d/m/Y H:i:s") }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="{{route('offre.show',$off->id)}}">
                              <button type="button" class="btn btn-sm btn-outline-secondary">Consulter</button>
                            </a>
                            <a href="{{route('offre.edit',$off->id)}}">
                              <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
                            </a>
                            
                          </div>
                          <small class="text-muted"><strong>{{ $off->prix }}FCFA</strong></small>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade card-body" id="nav-dmd" role="tabpanel" aria-labelledby="nav-dmd-tab">
            <div class="album  bg-light mt-2">
              <div class="container ">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                  @if(count(Auth::user()->demandes) == 0)
                    
                    <img src="images/vide.png">
                    
                    @endif
                  @foreach(Auth::user()->demandes as $dmd)
                  <div class="col mb-2">
                    <div class="card shadow-sm">
                      @if($dmd->images == "")
                      <img src="/images/img3.jpg" class="annonce-img">
                      @else
                      <img src="/getimg2/{{$dmd->images }}" class="annonce-img">
                      @endif
                      <div class="card-body">
                          <h3>{{ $dmd->titre }}</h3>
                          <h6 class="text-muted">{{ $dmd->user->name }} </h6>
                        <p class="card-text">{{ $dmd->description }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="{{route('dmd.show',$dmd->id)}}">
                              <button type="button" class="btn btn-sm btn-outline-secondary">Consulter</button>
                            </a>
                            <a href="{{route('dmd.edit',$dmd->id)}}">
                              <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
                            </a>
                            
                          </div>

                          <small class="text-muted"><strong>{{ $dmd->prix }}FCFA</strong></small>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane fade card-body" id="nav-sous" role="tabpanel" aria-labelledby="nav-sous-tab">

            @if(count($souss) == 0)
            <div class="container ">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    
                    <img src="images/vide.png">
                  </div>
                </div>
                    
            @else
            <div class="card">
                
                 <div class="card-header">
                  <h3>Souscriptions</h3>
                 </div>
                 <div class="card-body externe" >
                
             <table class="table table-borderless table-striped table-hover table-sm interne">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="diny">Titre</th>
                    <th class="diny">Message</th>
                    <th class="diny">Date heure</th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                @foreach( $souss as $sous )
                  <tr>
                    <td>{{ $sous->id }}</td>
                    <td>{{ $sous->titre }}</td>
                    <td>{{ $sous->message }}</td>
                    <td>{{ $sous->created_at->format("d/m/Y  H:i:s") }}</td>
                    <td><a href="{{route('sous.show',$sous->id)}}" role="button" class="btn btn-primary btn-sm">Voir</a></td>
                    <td><a href="{{route('rdv.create',$sous->id)}}" role="button" class="btn btn-success btn-sm">Rendez-vous</a></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              </div>
            </div>
              @endif
            
          </div>

        </div>
    </div>

    
    
@endsection
