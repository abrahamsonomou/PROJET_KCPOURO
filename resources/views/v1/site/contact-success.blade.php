@extends('v1.site.base') <!-- Extend your main site layout here -->
@section('title', 'Contact Success')

@section('content')
<br>
<br>
<div class="contact-success-container mt-30 mb-30">
    <div class="text-center pt-60 lg:pt-40">
        <h1 class="text-32 fw-600 text-dark-1">Merci pour votre message&nbsp;!</h1>
        <p class="text-16 lh-1 text-dark-2">Nous avons bien reçu votre message et nous vous répondrons dans les plus brefs délais.</p>
        
        <div class="mt-30">
            <a href="{{ route('home') }}" class="button -md -purple-1 text-white">
                Retour à l'accueil
            </a>
        </div>
    </div>
</div>

@endsection
