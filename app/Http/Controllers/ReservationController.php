<?php
// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Livre;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Affiche les réservations de l'utilisateur connecté
    public function index()
    {
        $reservations = auth()->user()->reservations()->with('livre')->get();
        return view('user.reservations.index', compact('reservations'));
    }

    // Affiche le formulaire de réservation pour un livre
    public function create(Livre $livre)
    {
        if (!$livre->estDisponible()) {
            return redirect()->back()->with('error', 'Ce livre n\'est pas disponible pour le moment.');
        }

        return view('user.reservations.create', compact('livre'));
    }

    // Stocke une nouvelle réservation avec statut "en_attente"
    public function store(Request $request, Livre $livre)
    {
        if (!$livre->estDisponible()) {
            return redirect()->back()->with('error', 'Ce livre n\'est plus disponible.');
        }

        Reservation::create([
            'user_id'          => auth()->id(),
            'livre_id'         => $livre->id,
            'date_reservation' => now(),
            'date_expiration'  => now()->addDays(7),
            'statut'           => 'en_attente'
        ]);

        return redirect()->route('reservations.index')
                         ->with('success', 'Réservation effectuée avec succès.');
    }

    // Permet à l'utilisateur d'annuler une réservation en attente
    // Ici, on passe le statut à "disponible" pour indiquer que la réservation est annulée
    public function cancel(Reservation $reservation)
    {
        if ($reservation->user_id !== auth()->id()) {
            abort(403);
        }

        $reservation->update(['statut' => 'disponible']);
        
        return redirect()->back()->with('success', 'Réservation annulée.');
    }

    // Pour l'administrateur : afficher toutes les réservations
    public function manage()
    {
        $reservations = Reservation::with(['utilisateur', 'livre'])->get();
        return view('admin.livres.categories.users.reservations.manage', compact('reservations'));
    }

    // Pour l'administrateur : approuver une réservation en la passant au statut "emprunte"
    public function approve(Reservation $reservation)
    {
        $reservation->update(['statut' => 'emprunte']);
        return redirect()->back()->with('success', 'Réservation approuvée.');
    }

    // Pour l'administrateur : rejeter une réservation en la passant au statut "disponible"
    public function reject(Reservation $reservation)
    {
        $reservation->update(['statut' => 'disponible']);
        return redirect()->back()->with('success', 'Réservation rejetée.');
    }
}
