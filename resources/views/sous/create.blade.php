@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-lg-5">
        <div class="col-md-8 py-5">
            <div class="card">
                <div class="card-header bg-primary ">Compltètez votre prifile et enregistrez </div>

                <div class="card-body">
                    <h3>{{ $offre->titre }}</h3>
                    <h6 class="text-muted"> Par {{ $offre->user->name }}</h6>
                    <h5>Souscription</h5>
                    <p>
                        Donnez un titre à votre souscription. <br>
                        Vous pouvez laisser un message de souscription à {{ $offre->user->name }}
                    </p>
                              
                    <form class="form-souscription" action="{{route('offre.sousstore',$offre->id)}}" method="post">
                        @csrf
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        
                        <div>
                            <label class="visually-hidden">Titre :</label>
                            <input type="text" name="titre" placeholder="Titre" class="form-control @error('titre') is-invalid @enderror"  autofocus>

                            @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div><br>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ Auth::user()->id }}" required autocomplete="user" autofocus hidden>

                                @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="visually-hidden">Message :</label>
                            <textarea  name="message"   class="form-control">Laisser un message ...</textarea>
                        </div>
                        <br>  

                        <button type="submit" class="btn btn-success" >Souscrire</button>
                    </form>
                           
                </div>

            </div>
                             
                            
            
                    
               
        </div>
    </div>
</div>
@endsection
