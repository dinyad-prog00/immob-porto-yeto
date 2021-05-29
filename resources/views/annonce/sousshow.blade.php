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
                    <h4>Souscription "{{$sous->titre}}" pour l'offre <strong>{{$sous->offre->titre}}</strong> de <strong>{{$sous->offre->user->name}}</strong></h4>
                    
                    

                   
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
                  <div class="col">
                    <div class="card">
                      <div class="card-header bg-primary text-light">Rendezvous</div>
                      <div class="card-body">
                        @if(count($rdv)!=0)
                        <strong>Lieu : </strong> {{$rdv[0]->lieu}}
                        <hr>
                        <strong>Date et heure: </strong> {{$rdv[0]->date_rdv}}
                        <hr>


                        <strong>Etat : </strong> Actif
                        @endif

                      </div>
                    </div>

                    <br><br>
                  </div>              
                  </div>



              </div>
            </div>
            </div>
            
            
    </div>
</div>

  
    
@endsection
