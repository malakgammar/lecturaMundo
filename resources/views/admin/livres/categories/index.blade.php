@extends('layouts.app')

@section('content')
    <div class="categories-list-container">
        <h1 class="page-title">Liste des Catégories</h1>

        @if(session('success'))
            <div class="success-alert">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.createcategories') }}" class="add-btn">Ajouter une catégorie</a>

        <div class="table-container">
            <table class="categories-table">
                <thead>
                    <tr>
                        <th>Nom de la catégorie</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $categorie)
                        <tr>
                            <td>{{ $categorie->nomcategorie }}</td>
                            <td>{{ $categorie->description }}</td>
                            <td class="actions-cell">
                                <a href="{{ route('admin.editcategorie', $categorie) }}" class="edit-btn">Modifier</a>
                                <form action="{{ route('admin.deletecategorie', $categorie) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn"
                                            onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<style>
/* Styles personnalisés avec baby pink et blanc */
.categories-list-container {
    max-width: 1000px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.page-title {
    color: #FFB6C1;
    text-align: center;
    font-size: 2rem;
    margin-bottom: 1.5rem;
}

.success-alert {
    background-color: #E7FFE7;
    color: #2E8B57;
    padding: 1rem;
    margin-bottom: 1.5rem;
    border-radius: 5px;
    border-left: 4px solid #2E8B57;
}

.add-btn {
    display: inline-block;
    background-color:rgb(230, 166, 176);
    color: white;
    padding: 0.6rem 1.2rem;
    border-radius: 5px;
    text-decoration: none;
    margin-bottom: 1.5rem;
    font-weight: 500;
    transition: all 0.3s ease;
}

.add-btn:hover {
    background-color: #FF69B4;
    transform: translateY(-2px);
    box-shadow: 0 5px 10px rgba(255, 105, 180, 0.3);
}

.table-container {
    overflow-x: auto;
}

.categories-table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
}

.categories-table th {
    background-color: #FFC0CB;
    color: white;
    padding: 1rem;
    text-align: left;
    font-weight: 600;
}

.categories-table tr:nth-child(even) {
    background-color: #FFF0F5;
}

.categories-table tr:hover {
    background-color: #FFE4E1;
}

.categories-table td {
    padding: 0.8rem 1rem;
    border-bottom: 1px solid #FFD6E0;
}

.actions-cell {
    display: flex;
    gap: 0.5rem;
    justify-content: flex-start;
    align-items: center;
}

.edit-btn {
    background-color: #FFCC99;
    color: #333;
    padding: 0.4rem 0.8rem;
    border-radius: 4px;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.edit-btn:hover {
    background-color: #FFA07A;
    color: white;
}

.delete-form {
    display: inline;
}

.delete-btn {
    background-color: #FFB6C1;
    color: #333;
    border: none;
    padding: 0.4rem 0.8rem;
    border-radius: 4px;
    font-size: 0.9rem;
    cursor: pointer;
    transition: all 0.3s ease;
}

.delete-btn:hover {
    background-color: #FF6B81;
    color: white;
}
</style>
@endsection