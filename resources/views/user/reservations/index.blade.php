@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mes Réservations</h1>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Livre</th>
                <th>Date de réservation</th>
                <th>Date d'expiration</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->livre->nomlivre }}</td>
                <td>{{ \Carbon\Carbon::parse($reservation->date_reservation)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($reservation->date_expiration)->format('d/m/Y') }}</td>
                <td>
                    <span class="badge bg-{{ 
                        $reservation->statut == 'emprunte' ? 'success' : 
                        ($reservation->statut == 'en_attente' ? 'warning' : 'secondary') 
                    }}">
                        {{ $reservation->statut }}
                    </span>
                </td>
                <td>
                    @if($reservation->statut == 'en_attente')
                    <form action="{{ route('reservations.cancel', $reservation) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Annuler</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
