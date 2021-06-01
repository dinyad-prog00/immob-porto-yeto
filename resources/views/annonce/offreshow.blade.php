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
                    {{$off->titre}}
                    
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
                  
                </div>

                 <div class=" py-5 bg-light mt-2">
                  <div class="container ">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    <div class="col mb-2">
                    <div class="card shadow-sm">
                       @if($off->images == "")
                        <img src="/images/img1.jpg" class="annonce-img">
                        @else
                        <img src="/getimg2/{{$off->images }}" class="annonce-img" alt="Image">
                       @endif
                       
                      <div class="card-body">
                          <h3>{{ $off->titre }}</h3>
                          
                        
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group"> 
                            @if($off->user_id == Auth::id())
                            <a href="{{route('offre.edit',$off->id)}}">
                              <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
                            </a>
                            @else
                              @if($off->dejaSous(Auth::id()) == false )
                                <a href="/offre/{{ $off->id }}/souscreate">
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#staticBackdropLive{{ $off->id }}">Souscrire</button></a>
                              @endif
                              <a href="mailto:{{$off->user->email}}" title="Envoyer un émail à {{$off->user->name}}">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Contacter</button>
                              </a>
                            @endif
                          
                          </div>
                          
                          <small class="text-muted"><strong>{{ $off->prix }}FCFA</strong></small>
                        </div>
                      </div>
                    </div>
                  </div>  

                  <div class="col">
                    @if( count($off->user->profile) != 0)
                    
                    <h4>Par {{ $off->user->name }} {{ $off->user->profile[0]->prenom }} </h4>
                    @else
                    <h4>Par {{ $off->user->name }}</h4>
                    @endif

                    <strong>Publié</strong> le <br> {{ $off->created_at->format("d/m/Y")}} à {{ $off->created_at->format("H:i:s")}}<br/> <br>

                    <strong>Dernière modification : <br> </strong> {{ $off->updated_at->format("d/m/Y H:i:s")}}

                    <br><br>

                    <strong>Localisation : </strong> <br>
                    {{ $off->localisation}} <br>

                    <hr>
                    <div class="row">
                      <div class="col">
                          <strong>Etat : </strong>
                          @if($off->etat == "active")
                          <span class="text-success">Actif</span>
                          @else
                          <span class="text-danger">Non actif</span>
                          @endif
                      </div>
                      <div class="col">
                        @if($off->user_id == Auth::id())
                    <div class="d-flex justify-content-between align-items-center">
                      
                      @if($off->etat == "desactive")
                      <div class="btn-group">
                      <a role="button" class="btn btn-outline-success btn-sm"
                                onclick="event.preventDefault(); document.getElementById('active{{ $off->id }}').submit();">
                        Activer
                      </a>
                      </div>

                      <form id="active{{ $off->id }}" action="{{ route('offre.active', $off->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PATCH')
                      </form>
                      @else
                      <div class="btn-group">
                      <a role="button" class="btn btn-outline-danger btn-sm"
                                onclick="event.preventDefault(); document.getElementById('desactive{{ $off->id }}').submit();">
                        Désactiver
                      </a>
                      </div>

                      <form id="desactive{{ $off->id }}" action="{{ route('offre.desactive', $off->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PATCH')
                      </form>
                      @endif
                      
                      
                    </div>
                    @endif
                  </div>
                  </div>
                  <hr>

                    

                  </div> 

                  <div class="col ">
                    <h4>Description</h4>
                    <p class="card-text">{{ $off->description }}</p>
                  </div>                
                  </div>



              </div>
            </div>
            </div>
            @if($off->user_id == Auth::id())
            <div class="card">
                
                 <div class="card-header">
                  <h3>Les souscrits</h3>
                 </div>
                 <div class="card-body externe">
                  @if(count($sous) == 0)
                  <div class="container ">

                      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                          
                          <img src="images/vide.png" alt="Aucun">
                        </div>
                      </div>
                          
                  @else

                  <table class="table table-borderless table-striped table-hover table-sm interne">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Titre</th>
                        <th>Message</th>
                        <th>Date heure</th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach($sous as $s)
                      <tr>
                       <td>></td>
                       <td>{{ $s->user->name }}</td>
                       <td>{{ $s->titre }}</td>
                       <td>{{ $s->message }}</td>
                       <td>{{ $s->created_at->format("d/m/Y  H:i:s") }}</td>
                       <td><a href="{{route('sous.show',$s->id)}}" role="button" class="btn btn-primary btn-sm">Voir</a></td>
                       </tr>
                      
                      @endforeach
                    </tbody>
                  </table>
                  @endif
                   
                 </div>
            </div>
            @endif
        </div>
    </div>
</div>

  
    
@endsection
