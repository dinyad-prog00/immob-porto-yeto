@extends('layouts.app')

@section('content')
<div class="album  bg-light mt-2">
    <div class="container py-5 ">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col mb-2">
               
            </div>
            <div class="col mb-2">
                <div class="card shadow-sm">
                    <img src="/getimg2/{{Auth::user()->profile[0]->photo}}">
                    <div class="card-body">
                        Votre photo de profil
                    </div>
               </div>
            </div>
       
       </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center py-lg-5">
        <div class="col-md-8 py-5">
                    
            <div class="card">

                <div class="card-header bg-primary ">Modifiez votre prifil et enregistrez </div>

                    <div class="card-body">
                    <form method="post" action="{{ route('profiles.update',$pf->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        

                        <div class="form-group row">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">Prénom</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom',$pf->prenom) }}" required autocomplete="prenom" >

                                @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row">
                            <label for="adresse" class="col-md-4 col-form-label text-md-right">Adresse</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse',$pf->adresse) }}"  autocomplete="adresse"  >

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">Téléphone</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone',$pf->telephone) }}"  autocomplete="telephone" >

                                @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row ">
                            <label for="photo" class="col-md-4 col-form-label  text-md-right ">Photo</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class=" form-control @error('photo') is-invalid @enderror" name="photo"   autocomplete="photo" >
                                 <label class="" for="inputGroupFile01">Choisir une image</label>
 

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

            
                        

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                        
                    </form>


                </div>
            </div>
            </div>
    </div>
</div>
        
@endsection
