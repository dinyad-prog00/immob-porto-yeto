@component('mail::message')
Salut <b>{{$name}}</b>,

{{$auteur}} vient de souscrire à votre  annonce {{$titre}}.<br/>

@component('mail::button', ['url' => "immob-porto.herokuapp.com"])
Consulter
@endcomponent

@if($message != "")
Il/Elle a laissé ce message. <br/>
<strong>{{$message}}</strong>
@endif

Cordialement <br/>

Immob Porto

@endcomponent