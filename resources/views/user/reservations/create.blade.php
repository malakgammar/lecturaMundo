@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Réserver "{{ $livre->nomlivre }}"</h1>
    
    <div class="card">
        <div class="card-body">
            <p>Vous êtes sur le point de réserver ce livre pour une durée de 7 jours.</p>
            
            <form action="{{ route('reservations.store', $livre) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">Confirmer la réservation</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection
