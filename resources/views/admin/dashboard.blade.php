@extends('layouts.admin')
@section('title', 'LecturaMundo')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-pink">Bienvenue dans l'Espace Administrateur</h2>
    <div class="row">
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.users') }}" class="card card-body shadow text-decoration-none text-pink hover-card">
                <h5 class="mb-0">Gestion des utilisateurs</h5>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.indexlivres') }}" class="card card-body shadow text-decoration-none text-pink hover-card">
                <h5 class="mb-0">Gestion des livres</h5>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.categories') }}" class="card card-body shadow text-decoration-none text-pink hover-card">
                <h5 class="mb-0">Gestion des catégories</h5>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="{{ route('admin.reservations') }}" class="card card-body shadow text-decoration-none text-pink hover-card">
                <h5 class="mb-0">Gérer les réservations</h5>
            </a>
        </div>
    </div>
</div>
<style>
    .text-pink {
        color: #FFC0CB !important;
    }
    
    .hover-card {
        background-color: white;
        border: 1px solid #FFC0CB;
        transition: all 0.3s ease;
    }
    
    .hover-card:hover {
        background-color: #FFEBEF;
        color: #FF69B4 !important;
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(255, 192, 203, 0.3) !important;
    }
    
    h2 {
        text-shadow: 1px 1px 2px rgba(255, 192, 203, 0.5);
    }
    
    .card {
        border-radius: 15px;
    }
</style>
@endsection