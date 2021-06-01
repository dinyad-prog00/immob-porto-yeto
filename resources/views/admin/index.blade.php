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
                    {{ __('Tableau de bord pour administration') }}
                    
                    <div class="btn-group ml-5">
                        <a href="{{ route('admin.create') }}">
                            <button type="button" class="btn btn-info"> + Ajouter un administrateur </button>
                        </a>
                    </div>

                   
                </div>

                <div class="card-body">
                    <nav>
                      <div class="nav nav-tabs mb-3 start-content-center" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-admin-tab" data-toggle="tab" href="#nav-admin" role="tab" aria-controls="nav-admin" aria-selected="true">Administrateurs</a>
                        <a class="nav-link" id="nav-offre-tab" data-toggle="tab" href="#nav-offre" role="tab" aria-controls="nav-offre" aria-selected="false">Offres</a>
                        <a class="nav-link" id="nav-dmd-tab" data-toggle="tab" href="#nav-dmd" role="tab" aria-controls="nav-dmd" aria-selected="false">Demandes</a>

                      </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bd-example">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show card-body active" id="nav-admin" role="tabpanel" aria-labelledby="nav-admin-tab">
            <div class="card">
                
                 <div class="card-header">
                  <h3>Administrateurs</h3>
                 </div>
                 <div class="card-body externe" >
                
             <table class="table table-borderless table-striped table-hover table-sm interne">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="diny">Nom</th>
                    <th class="diny">Email</th>
                    <th class="diny"></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>

                @foreach( $admins as $admin )
                  <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    
                    <td>
                      <a role="button" class="btn btn-outline-danger btn-sm"
                                onclick="event.preventDefault(); document.getElementById('destroyadmin{{$admin->id}}').submit();">
                        Défaire
                      </a>
                      </div>

                      <form id="destroyadmin{{$admin->id}}" action="{{ route('admin.destroy', $admin->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                      </form>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              </div>
            </div>
        </div>




        <div class="tab-pane fade  card-body active" id="nav-offre" role="tabpanel" aria-labelledby="nav-offre-tab">
            <div class="card">
                
                 <div class="card-header">
                  <h3>Les offres</h3>
                 </div>
                 <div class="card-body externe" >
                
             <table class="table table-borderless table-striped table-hover table-sm interne">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="diny">Tire</th>
                    <th class="diny">Localisation</th>
                    <th class="diny">Nom auteur</th>
                    <th class="diny">Email auteur</th>
                    <th></th>
                    
                  </tr>
                </thead>
                <tbody>

                @foreach( $offs as $off )
                  <tr>
                    <td>{{ $off->id }}</td>
                    <td>{{ $off->titre }}</td>
                    <td>{{ $off->localisation }}</td>
                    <td>{{ $off->user->name }}</td>
                    <td>{{ $off->user->email }}</td>
                    <td>
                      <a role="button" class="btn btn-outline-danger btn-sm"
                                onclick="event.preventDefault(); document.getElementById('destroyoff{{ $off->id }}').submit();">
                        Supprimer
                      </a>
                      </div>

                      <form id="destroyoff{{ $off->id }}" action="{{ route('offre.destroy', $off->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                      </form>
                    </td>
                    
                  </tr>
                @endforeach
                </tbody>
              </table>
              </div>
            </div>
        </div>



        <div class="tab-pane fade  card-body active" id="nav-dmd" role="tabpanel" aria-labelledby="nav-dmd-tab">
            <div class="card">
                
                 <div class="card-header">
                  <h3>Les demandes</h3>
                 </div>
                 <div class="card-body externe" >
                
             <table class="table table-borderless table-striped table-hover table-sm interne">
                <thead>
                  <tr>
                    <th>#</th>
                    <th class="diny">Tire</th>
                    <th class="diny">Localisation</th>
                    <th class="diny">Nom auteur</th>
                    <th class="diny">Email auteur</th>
                    <th></th>
                    
                  </tr>
                </thead>
                <tbody>

                @foreach( $dmds as $dmd )
                  <tr>
                    <td>{{ $dmd->id }}</td>
                    <td>{{ $dmd->titre }}</td>
                    <td>{{ $dmd->localisation }}</td>
                    <td>{{ $dmd->user->name }}</td>
                    <td>{{ $dmd->user->email }}</td>
                    <td>
                      <a role="button" class="btn btn-outline-danger btn-sm"
                                onclick="event.preventDefault(); document.getElementById('destroydmd{{ $dmd->id }}').submit();">
                        Supprimer
                      </a>
                      </div>

                      <form id="destroydmd{{ $dmd->id }}" action="{{ route('dmd.destroy', $dmd->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                      </form>
                    </td>
                    
                  </tr>
                @endforeach
                </tbody>
              </table>
              </div>
            </div>
        </div>

    
    
@endsection
