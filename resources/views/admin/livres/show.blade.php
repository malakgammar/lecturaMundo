@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="book-detail-container">
        <h1 class="book-title mb-4">{{ $livre->titre }}</h1>
        
        <div class="book-content">
            <div class="book-image-container mb-4">
                <img src="{{ asset('storage/' . $livre->image) }}" alt="Image de {{ $livre->nomlivre }}" class="book-image">
            </div>
            
            <div class="book-info">
                <p class="info-item"><span class="info-label">Auteur :</span> {{ $livre->nomauteur }}</p>
                <p class="info-item"><span class="info-label">Description :</span> {{ $livre->description }}</p>
                <p class="info-item"><span class="info-label">Date de Publication :</span> {{ $livre->date_pub }}</p>
                
                <a href="{{ route('admin.livres') }}" class="back-button">Retour à la liste</a>
            </div>
        </div>
    </div>
</div>

<style>
    .book-detail-container {
        background-color: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 5px 15px rgba(255, 192, 203, 0.2);
    }
    
    .book-title {
        color: #FF69B4;
        border-bottom: 2px solid #FFC0CB;
        padding-bottom: 10px;
    }
    
    .book-content {
        display: flex;
        flex-direction: column;
    }
    
    .book-image-container {
        text-align: center;
    }
    
    .book-image {
        width: 40%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }
    
    .book-image:hover {
        transform: scale(1.03);
    }
    
    .info-label {
        font-weight: bold;
        color: #FF69B4;
    }
    
    .info-item {
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }
    
    .back-button {
        display: inline-block;
        background-color: white;
        color: #FF69B4;
        border: 2px solid #FFC0CB;
        padding: 8px 20px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        margin-top: 1rem;
    }
    
    .back-button:hover {
        background-color: #FFC0CB;
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 10px rgba(255, 192, 203, 0.4);
    }
    
    @media (min-width: 768px) {
        .book-content {
            flex-direction: row;
        }
        
        .book-image-container {
            flex: 0 0 40%;
            margin-right: 2rem;
        }
        
        .book-info {
            flex: 1;
        }
        
        .book-image {
            width: 100%;
        }
    }
</style>
@endsection