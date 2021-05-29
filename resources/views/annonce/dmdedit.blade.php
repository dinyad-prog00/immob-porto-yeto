@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-lg-5">
        <div class="col-md-8 py-5">
            <div class="card">
                <div class="card-header bg-primary ">Modifition de demande</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dmd.update',$dmd->id) }}">
                        @csrf
                        @method('PATCH')
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                

                        <div class="form-group row">
                            <label for="titre" class="col-md-4 col-form-label text-md-right">Titre</label>

                            <div class="col-md-6">
                                <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" value="{{ old('titre',$dmd->titre) }}"  autocomplete="titre" autofocus>

                                @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>
                                {{ old('description',$dmd->description) }} 
                                </textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="localisation" class="col-md-4 col-form-label text-md-right">Localisation</label>

                            <div class="col-md-6">
                                <input id="localisation" type="text" class="form-control @error('localisation') is-invalid @enderror" name="localisation" value="{{ old('localisation',$dmd->localisation) }}"  autocomplete="localisation" autofocus>

                                @error('localisation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="duree" class="col-md-4 col-form-label text-md-right">Durée</label>

                            <div class="col-md-6">
                                <input id="duree" type="text" class="form-control @error('duree') is-invalid @enderror" name="duree" value="{{ old('duree',$dmd->duree) }}"  autocomplete="duree" autofocus placeholder="Exempe : 3 mois">

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
                                <select id="renouv" type="text" class="form-control @error('renouv') is-invalid @enderror" name="renouv" value="{{ old('renouv',$dmd->renouvelable) }}"  autocomplete="renouv" autofocus>
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
                                <input id="prix" type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix',$dmd->prix) }}"  autocomplete="prix" autofocus>

                                @error('prix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image',$dmd->image) }}"  autocomplete="image" autofocus>

                                @error('image')
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
