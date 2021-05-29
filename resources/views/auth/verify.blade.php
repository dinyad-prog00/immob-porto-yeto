@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-lg-5">
        <div class="col-md-8 py-5">
            <div class="card">
                <div class="card-header">{{ __('Vérification d\'adresse émail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un lien de vérification a été envoyé a votre adresse email.') }}
                        </div>
                    @endif

                    {{ __('Avant de continuer, svp consultez votre émail et confirmez.') }}
                    {{ __('Si vous n\'en avez pas réçu' ) }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour renvoyer.') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
