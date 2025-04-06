@extends('layouts.app')

@section('content')
<div class="book-form-container">
    <h1 class="form-title">Ajouter un Livre</h1>
    <form action="{{ route('admin.storelivres') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nomlivre">Nom du Livre</label>
            <input type="text" name="nomlivre" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="nomauteur">Auteur</label>
            <input type="text" name="nomauteur" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-textarea"></textarea>
        </div>
        <div class="form-group">
            <label for="date_pub">Date de Publication</label>
            <input type="date" name="date_pub" class="form-input" required>
        </div>
        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" class="form-select">
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nomcategorie }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image du Livre</label>
            <input type="file" name="image" class="form-file">
        </div>
        <button type="submit" class="submit-btn">Enregistrer</button>
    </form>
</div>

<style>
/* Styles personnalisés avec baby pink et blanc */
.book-form-container {
    max-width: 800px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

.form-title {
    color: #FFB6C1; /* Baby pink */
    text-align: center;
    font-size: 2rem;
    margin-bottom: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    color: #FF69B4; /* Plus foncé pour meilleure lisibilité */
    margin-bottom: 0.5rem;
    font-weight: 500;
}

.form-input, .form-textarea, .form-select, .form-file {
    width: 100%;
    padding: 0.75rem;
    border: 2px solid #FFD6E0; /* Baby pink clair */
    border-radius: 5px;
    background-color: white;
    transition: all 0.3s ease;
}

.form-input:focus, .form-textarea:focus, .form-select:focus {
    border-color: #FF69B4;
    outline: none;
    box-shadow: 0 0 5px rgba(255, 182, 193, 0.5);
}

.form-input:hover, .form-textarea:hover, .form-select:hover {
    border-color: #FF69B4;
    background-color: #FFF0F5; /* Lavender blush - rose très pâle */
}

.form-textarea {
    min-height: 150px;
    resize: vertical;
}

.submit-btn {
    background-color: #FFB6C1;
    color: white;
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s ease;
    display: block;
    margin: 1.5rem auto 0;
}

.submit-btn:hover {
    background-color: #FF69B4;
    transform: translateY(-2px);
    box-shadow: 0 5px 10px rgba(255, 105, 180, 0.3);
}

.form-file {
    padding: 0.5rem;
    border: 1px dashed #FFB6C1;
    background-color: #FFF0F5;
}

.form-file:hover {
    border-color: #FF69B4;
    background-color: #FFEBF2;
}
</style>
@endsection