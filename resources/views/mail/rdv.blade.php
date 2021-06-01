@component('mail::message')
Salut <b>{{$rdv->user()->name}}</b>,

@if($rdv->etat == "confirme")
{{$auteur}} vient de confirmer votre rendez-vous de <strong>{{$rdv->lieu }}</strong> pris pour le <strong>{{ $rdv->date_rdv}}</strong>.<br/>
@else
{{$auteur}} vient de déconfirmer votre rendez-vous de <strong>{{$rdv->lieu }}</strong> pris pour le <strong>{{ $rdv->date_rdv}}</strong>.<br/>
@endif

@component('mail::button', ['url' => "immob-porto.herokuapp.com"])
Consulter
@endcomponent


Cordialement <br/>

Immob Porto

@endcomponent