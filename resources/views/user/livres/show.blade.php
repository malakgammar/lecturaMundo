@extends('layouts.app')

@section('content')
    <h1>{{ $livre->titre }}</h1>
    <td><img src="{{ asset('storage/' . $livre->image) }}" alt="Image de {{ $livre->nomlivre }}" style="width: 25%  ; height: auto;"></td> 
    <p><strong>Auteur :</strong> {{ $livre->nomauteur }}</p>
    <p><strong>Description :</strong> {{ $livre->description }}</p>
    <p><strong>Date de Publication :</strong> {{ $livre->date_pub }}</p>
    <a href="{{ route('user.livres') }}" class="btn btn-secondary">Retour à la liste</a>

    @if($livre->estDisponible() && auth()->check())
    <a href="{{ route('reservations.create', $livre) }}" class="btn btn-primary">Réserver ce livre</a>
@else
    <button class="btn btn-secondary" disabled>Non disponible</button>
@endif
@endsection
