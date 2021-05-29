@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-lg-5">
        <div class="col-md-8 py-5">
            <div class="card">
                <div class="card-header bg-primary ">Compltètez votre prifile et enregistrez </div>

                <div class="card-body">
                   
                    <h5>Rendez-vous</h5>
                    
                              
                    <form class="form-souscription" action="{{route('rdv.store',$sous->id)}}" method="post">
                        @csrf
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        
                        
                        <div>
                            <label class="visually-hidden">Lieu :</label>
                            <input type="lieu" name="lieu" placeholder="Lieu" value="{{ old('lieu') }}" class="form-control @error('lieu') is-invalid @enderror"  autofocus>

                            @error('lieu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div><br>                        

                        <div>
                            <label class="visually-hidden">Date :</label>
                            <input type="date" name="date" placeholder="Date" value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror"  autofocus>

                            @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div><br>
                        <div >
                            <label class="visually-hidden">Heure : (HH:MM)</label>
                            <input type="text" name="heure" placeholder="Heure" value="{{ old('heure') }}" class="form-control @error('heure') is-invalid @enderror"  autofocus >

                            @error('heure')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div><br>

                    
                        <button type="submit" class="btn btn-success" >Souscrire</button>
                    </form>

                    <a href="{{route('retour')}}">Retour</a>
                        
                </div>

            </div>
                             
                            
            
                    
               
        </div>
    </div>
</div>
@endsection
