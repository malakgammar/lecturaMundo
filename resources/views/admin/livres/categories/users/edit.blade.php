@extends('layouts.admin')

@section('title', 'Modifier Utilisateur')

@section('content')
<div class="container mt-5">
    <h2>Modifier l'utilisateur</h2>

    <form action="{{ route('admin.updateusers', $user->id) }}" method="POST">
        @csrf
     @method('PUT')

        <div class="mb-3">
            <label for="name">Nom :</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                
        </div>

        <div class="mb-3">
            <label for="email">Email :</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label for="role">Rôle :</label>
            <select name="role" class="form-control" required>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Utilisateur</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrateur</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="password">Mot de passe (laisser vide si inchangé) :</label>
            <input type="password" name="password" class="form-control">
            <input type="password" name="password_confirmation" class="form-control mt-2" placeholder="Confirmation mot de passe">
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('admin.users') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
