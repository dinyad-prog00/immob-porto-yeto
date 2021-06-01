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
                
                <div class="card-header bg-dark text-light">
                    <h4>Souscription "{{$sous->titre}}" pour l'offre <strong>{{$sous->offre->titre}}</strong> 
                      @if($sous->offre->user->id != Auth::id())
                      de <strong>{{$sous->offre->user->name}}</strong>
                      @endif
                    </h4>
                    
                    

                   
                </div>
                <div class="card-body">
                  
                </div>

                 <div class=" py-5 bg-light mt-2">
                  <div class="container ">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    <div class="col mb-2">
                    <div class="card shadow-sm">
                      <div class="card-header"><h3>{{ $sous->titre }}</h3></div>
                      <div class="card-body">
                          @if( count($sous->user->profile) != 0)
                    
                    <h5>Par {{ $sous->user->name }} {{ $sous->user->profile[0]->prenom }} </h5>
                    @else
                    <h4>Par {{ $sous->user->name }}</h4>
                    @endif

                    <strong>Faite</strong> le <br> {{ $sous->created_at->format("d/m/Y")}} à {{ $sous->created_at->format("H:i:s")}}<br/> <br>

                    
                          
                        
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group"> 
                            
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>  

                  

                  <div class="col ">
                    <h4>Message</h4>
                    <p class="card-text">{{ $sous->message }}</p>
                  </div> 
                  @foreach($rdv as $r)  
                  <div class="col">
                    <div class="card">
                      <div class="card-header bg-primary text-light">Rendezvous {{$r->id}}</div>
                      <div class="card-body">
                      
                        <strong>Lieu : </strong> {{$r->lieu}}
                        <hr>
                        <strong>Date et heure : </strong> {{$r->date_rdv}}

                       <hr>
                      <div class="row">
                      <div class="col">
                          
                        <strong>Etat : </strong> 
                        @if($r->etat == "active")
                        <span class="text-danger">Non confirmé</span>
                        @elseif($r->etat == "confirme")
                        <span class="text-success">Confirmé</span>
                        @elseif($r->etat == "annule")
                        <span class="text-danger">Annulé</span>
                        @endif
                      </div>
                      <div class="col">
                      @if($sous->offre->user->id == Auth::id())
                        <div class="d-flex justify-content-between align-items-center">
                      
                          @if($r->etat == "active")
                            <div class="btn-group">
                              <a role="button" class="btn btn-outline-success btn-sm"
                                onclick="event.preventDefault(); document.getElementById('confirme{{ $r->id }}').submit();">
                                Confirmer
                              </a>
                            </div>

                            <form id="confirme{{ $r->id }}" action="{{ route('rdv.confirme',[$sous->id,$r->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PATCH')
                          </form>
                          @elseif($r->etat == "confirme")
                          <div class="btn-group">
                              <a role="button" class="btn btn-outline-success btn-sm"
                                onclick="event.preventDefault(); document.getElementById('deconfirme{{ $r->id }}').submit();">
                                Déconfirmer
                              </a>
                            </div>

                            <form id="deconfirme{{ $r->id }}" action="{{ route('rdv.deconfirme',[$sous->id,$r->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PATCH')
                            </form>
                            @endif
                          </div>
                      @else
                      <div class="d-flex justify-content-between align-items-center">
                      
                          @if($r->etat == "active")
                            <div class="btn-group">
                              <a role="button" class="btn btn-outline-success btn-sm"
                                onclick="event.preventDefault(); document.getElementById('annule{{ $r->id }}').submit();">
                                Annuler
                              </a>
                            </div>

                            <form id="annule{{ $r->id }}" action="{{ route('rdv.annule',[$sous->id,$r->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PATCH')
                          </form>
                          @elseif($r->etat == "annule")
                          <div class="btn-group">
                              <a role="button" class="btn btn-outline-success btn-sm"
                                onclick="event.preventDefault(); document.getElementById('active{{ $r->id }}').submit();">
                                Activer
                              </a>
                            </div>

                            <form id="active{{ $r->id }}" action="{{ route('rdv.active',[$sous->id,$r->id]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('PATCH')
                            </form>
                            @endif
                          </div>
                      @endif
                      
                      
                    </div>
                    
                    <hr>
                  </div>
                  </div>
                </div>
              </div>

            @endforeach           
                  



              </div>
            </div>
            </div>
            
            
    </div>
</div>

  
    
@endsection
