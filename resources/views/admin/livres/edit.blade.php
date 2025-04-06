@extends('layouts.app')

@section('content')
    <h1>Modifier le Livre</h1>
    <form action="{{ route('admin.updatelivres', $livre->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nomlivre">Nom du Livre</label>
            <input type="text" name="nomlivre" class="form-control" value="{{ $livre->nomlivre }}" required>
        </div>
        <div class="form-group">
            <label for="nomauteur">Auteur</label>
            <input type="text" name="nomauteur" class="form-control" value="{{ $livre->nomauteur }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $livre->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="date_pub">Date de Publication</label>
            <input type="date" name="date_pub" class="form-control" value="{{ $livre->date_pub }}" required>
        </div>
        <div class="form-group">
            <label for="categorie_id">Catégorie</label> 
            <select name="categorie_id" class="form-control">
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $livre->categorie_id == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nomcategorie }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Image du Livre</label>
            @if($livre->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $livre->image) }}" alt="{{ $livre->nomlivre }}" style="max-width:150px;">
                </div>
            @endif
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-warning">Mettre à jour</button>
    </form>
@endsection
<style>
.app-container {
    max-width: 1000px;
    margin: 2rem auto;
    padding: 2rem;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}

/* Typography */
.page-title {
    color: #FFB6C1;
    text-align: center;
    font-size: 2rem;
    margin-bottom: 1.5rem;
}

.form-title {
    color: #FFB6C1;
    text-align: center;
    font-size: 2rem;
    margin-bottom: 2rem;
}

/* Form Elements */
.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    color: #FF69B4;
    margin-bottom: 0.5rem;
    font-weight: 500;
}

.form-input, .form-textarea, .form-select, .form-file {
    width: 100%;
    padding: 0.75rem;
    border: 2px solid #FFD6E0;
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
    background-color: #FFF0F5;
}

.form-textarea {
    min-height: 120px;
    resize: vertical;
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

/* Buttons */
.submit-btn, .add-btn {
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
    text-decoration: none;
}

.add-btn {
    display: inline-block;
    padding: 0.6rem 1.2rem;
    margin-bottom: 1.5rem;
    font-weight: 500;
}

.submit-btn:hover, .add-btn:hover {
    background-color: #FF69B4;
    transform: translateY(-2px);
    box-shadow: 0 5px 10px rgba(255, 105, 180, 0.3);
}

/* Alerts */
.success-alert {
    background-color: #E7FFE7;
    color: #2E8B57;
    padding: 1rem;
    margin-bottom: 1.5rem;
    border-radius: 5px;
    border-left: 4px solid #2E8B57;
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

/* Tables */
.table-container {
    overflow-x: auto;
}

.data-table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
}

.data-table th {
    background-color: #FFC0CB;
    color: white;
    padding: 1rem;
    text-align: left;
    font-weight: 600;
}

.data-table tr:nth-child(even) {
    background-color: #FFF0F5;
}

.data-table tr:hover {
    background-color: #FFE4E1;
}

.data-table td {
    padding: 0.8rem 1rem;
    border-bottom: 1px solid #FFD6E0;
}

/* Action buttons */
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