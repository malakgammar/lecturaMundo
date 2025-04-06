@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestion des Réservations</h1>
    
    <table class="table">
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Livre</th>
                <th>Date de réservation</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->utilisateur->name }}</td>
                <td>{{ $reservation->livre->nomlivre }}</td>
                <td>{{ \Carbon\Carbon::parse($reservation->date_reservation)->format('d/m/Y') }}</td>
                <td>{{ $reservation->statut }}</td>
                <td>
                    @if($reservation->statut == 'en_attente')
                    <div class="btn-group">
                        <form action="{{ route('reservations.approve', $reservation) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-success">Emprunter</button>
                        </form>
                        <form action="{{ route('reservations.reject', $reservation) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Rejeter</button>
                        </form>
                    </div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
