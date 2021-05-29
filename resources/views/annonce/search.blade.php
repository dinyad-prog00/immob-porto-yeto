@extends('layouts.app')

@section('content')
<div class="container-search container">
  <main>
    <div class="py-5 text-center">
      
      <h2>Recherche</h2>
      <p class="lead"></p>
    </div>

    <div class="row g-3">
      <div class="col-md-5 col-lg-4 order-md-first">
        
        <form class="p-2" action="{{route('search.search')}}" method="post">
          @csrf
            <h4 class="d-flex justify-content-between align-items-center mb-3">
          Critères de recherche
          <!-- <span class="badge bg-secondary rounded-pill">3</span>-->
        </h4>
            

            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" type="submit">Lancer la recherhce</button>
            <hr class="my-4">
          <h4 class="mb-3">Type</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="type" type="radio" value="location" class="form-check-input" >
              <label class="form-check-label" {{ old('type') =='location'? 'checked' : '' }} for="credit">Location</label>
            </div>
            <div class="form-check">
              <input id="debit" name="type" type="radio" value="vente" class="form-check-input" >
              <label class="form-check-label" for="debit">Vente</label>
            </div>
          </div>
          <hr class="my-4">

          <h4>Localisation  </h4>
          <div class="input-group">
            <input type="text" class="form-control" name="localisation" placeholder="Localisation" >
            
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Sanitaire</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="sanitaire" value=oui type="radio" class="form-check-input" >
              <label class="form-check-label" for="credit">Oui</label>
            </div>
            <div class="form-check">
              <input id="debit" name="sanitaire" value="non" type="radio" class="form-check-input" >
              <label class="form-check-label" for="debit">Non</label>
            </div>
           
          </div>



          <hr class="my-4">

          <h4>Prix  </h4>
          <div class="input-group">
            <select class="form-select" id="country" name="opt"  required>
                <option value="inf">Inférieur à</option>
                <option value="ega">Egal à</option>
                <option value="sup">Supérieur à</option>
                
              </select>
              <input type="number" class="form-control" name="opp"  placeholder="Prix en FCFA" >
            
          </div>

          <hr class="my-4">
          <h4>Date</h4>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" value="recent" name="date">
            <label class="form-check-label" for="recent" >Récent</label>
          </div>

          <hr class="my-4">
          <h4>Autres</h4>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" value="offre" name="autres[]">
            <label class="form-check-label" for="offre" >Offre</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" value="demande" name="autres[]">
            <label class="form-check-label" for="demande" >Demande</label>
          </div>

          
          
          <hr class="my-4">
          <button class="w-100 btn btn-primary btn-lg" type="submit">Lancer la recherhce</button>
        </form>

      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Résultats de votre recherche</h4>
        <hr class="my-4">
            <strong>Mots clés : </strong>
         <hr class="my-4">


        <div class="row g-3">
            <div class="col-2"><strong>#Type</strong> </div>
            <div class="col-6"><strong>#Titre</strong> </div> 
            <div class="col-4"> <strong>#Localisation</strong> </div>
            </div>
        <hr class="my-4">

        @if(count($offs) != 0)
        <h4>Les offres</h4>
        <hr class="my-4">

        @foreach($offs as $off)
          <a href="{{route('offre.show2',$off->id)}}">
            <div class="row g-3">
            <div class="col-2">{{ ucfirst($off->type) }}</div>
            <div class="col-6">{{$off->titre }} </div> 
            <div class="col-4">{{$off->localisation }} </div>
            </div>
          </a>
            <hr class="my-4">
        @endforeach
        @endif
        
        <hr class="my-4">
        @if(count($dmds))
        <h4>Les demandes</h4>
        <hr class="my-4">
        @foreach($dmds as $dmd)
          <a href="{{route('dmd.show2',$dmd->id)}}">
            <div class="row g-3">
            <div class="col-2">{{ ucfirst($dmd->type) }}</div>
            <div class="col-6">{{ $dmd->titre }} </div> 
            <div class="col-4">{{ $dmd->localisation }} </div>
            </div>
          </a>
            <hr class="my-4">
        @endforeach
        @endif

        
      </div>
    </div>
  </main>

  </div>
@endsection
