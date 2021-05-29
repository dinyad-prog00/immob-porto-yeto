@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-lg-5">
        <div class="col-md-8 py-5">
            <div class="card">
                <div class="card-header bg-primary ">Création de demande</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dmd.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                

                        <div class="form-group row">
                            <label for="titre" class="col-md-4 col-form-label text-md-right">Titre*</label>

                            <div class="col-md-6">
                                <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre') }}"  autocomplete="titre" autofocus>

                                @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description*</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description" autofocus>
                                {{ old('description') }}
                                </textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sanitaire" class="col-md-4 col-form-label text-md-right">Sanitaire</label>
                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="sanitaire" id="sanitaire" {{ old('sanitaire') ? 'checked' : '' }}>

                                    
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>

                            <div class="col-md-6">
                                <select id="type" type="text" class="form-select @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}"  autocomplete="type" autofocus>
                                    <option value="location">Location</option>
                                    <option value="vente">Vente</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="localisation" class="col-md-4 col-form-label text-md-right">Localisation*</label>

                            <div class="col-md-6">
                                <input id="localisation" type="text" class="form-control @error('localisation') is-invalid @enderror" name="localisation" value="{{ old('localisation') }}"  autocomplete="localisation" autofocus>

                                @error('localisation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="photo" class="col-md-4 col-form-label  text-md-right ">Image</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class=" form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}"  autocomplete="photo" autofocus>
                                
                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="duree" class="col-md-4 col-form-label text-md-right">Durée</label>

                            <div class="col-md-6">
                                <input id="duree" type="text" class="form-control @error('duree') is-invalid @enderror" name="duree" value="{{ old('duree') }}"  autocomplete="duree" autofocus placeholder="Exempe : 3 mois">

                                @error('duree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="renouv" class="col-md-4 col-form-label text-md-right">Renouvelable ?</label>

                            <div class="col-md-6">
                                <select id="renouv" type="text" class="form-select @error('renouv') is-invalid @enderror" name="renouv" value="{{ old('renouv') }}"  autocomplete="renouv" autofocus>
                                    <option value="oui">Oui</option>
                                    <option value="non">Non</option>
                                </select>

                                @error('renouv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prix" class="col-md-4 col-form-label text-md-right">Prix</label>

                            <div class="col-md-6">
                                <input id="prix" type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}"  autocomplete="prix" autofocus>

                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                       

                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ Auth::user()->id }}"  autocomplete="user" autofocus hidden>

                                @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Publier') }}
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
