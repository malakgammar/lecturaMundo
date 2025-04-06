@extends('layouts.app')

@section('content')
    <div class="category-edit-container">
        <h1 class="form-title">Modifier la catégorie</h1>

        @if($errors->any())
            <div class="error-alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.updatecategorie', $category) }}" method="POST">
            @csrf
            @method('PUT')
        
            <div class="form-group">
                <label for="nomcategorie">Nom de la catégorie</label>
                <input type="text" name="nomcategorie" class="form-input" value="{{ $category->nomcategorie }}" required>
            </div>
        
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-textarea">{{ $category->description }}</textarea>
            </div>
        
            <button type="submit" class="submit-btn">Mettre à jour</button>
        </form>
    </div>

<style>
/* Styles personnalisés avec baby pink et blanc */
.category-edit-container {
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

.form-input, .form-textarea {
    width: 100%;
    padding: 0.75rem;
    border: 2px solid #FFD6E0; /* Baby pink clair */
    border-radius: 5px;
    background-color: white;
    transition: all 0.3s ease;
}

.form-input:focus, .form-textarea:focus {
    border-color: #FF69B4;
    outline: none;
    box-shadow: 0 0 5px rgba(255, 182, 193, 0.5);
}

.form-input:hover, .form-textarea:hover {
    border-color: #FF69B4;
    background-color: #FFF0F5; /* Lavender blush - rose très pâle */
}

.form-textarea {
    min-height: 120px;
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

.error-alert {
    background-color: #FFF0F5;
    border-left: 4px solid #FF4500;
    padding: 1rem;
    margin-bottom: 1.5rem;
    border-radius: 0 5px 5px 0;
}

.error-alert ul {
    margin: 0;
    padding-left: 1.5rem;
    color: #FF4500;
}
</style>
@endsection