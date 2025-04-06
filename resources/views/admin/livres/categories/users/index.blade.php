@extends('layouts.admin')

@section('title', 'Utilisateurs')

@section('content')
<div class="container mt-5">
    <h2>Liste des utilisateurs</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-hover mt-4">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                    <a href="{{ route('admin.editusers', $user->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                    <form action="{{ route('admin.deleteusers', $user) }}" method="POST" style="display:inline;"> 
                        @csrf 
                        @method('DELETE') 
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
                            Supprimer</button> 
                    </form> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
