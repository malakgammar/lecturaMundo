@extends('layouts.app')

@section('content')
    <div style="max-width: 1200px; margin: 0 auto; padding: 20px; background-color: white; border-radius: 15px; box-shadow: 0 4px 15px rgba(255, 192, 203, 0.3);">
        <h1 style="color: #FFC0CB; text-align: center; margin-bottom: 30px; font-weight: 700;">Liste des Livres</h1>

        <!-- Formulaire de recherche -->
        <form action="{{ route('user.livres') }}" method="GET" style="margin-bottom: 25px;">
            <div style="display: flex;">
                <input type="text" name="search" style="flex: 1; padding: 12px; border: 2px solid #FFE4E1; border-radius: 30px 0 0 30px; outline: none; transition: border 0.3s ease;" placeholder="Rechercher un livre" aria-label="Rechercher un livre" onmouseover="this.style.borderColor='#FFC0CB'" onmouseout="this.style.borderColor='#FFE4E1'">
                <button type="submit" style="background-color: #FFC0CB; color: white; border: none; padding: 12px 25px; border-radius: 0 30px 30px 0; cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#FFB6C1'" onmouseout="this.style.backgroundColor='#FFC0CB'">Rechercher</button>
            </div>
        </form>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; background-color: white; border-radius: 10px; overflow: hidden;">
                <thead>
                    <tr style="background-color: #FFE4E1;">
                        <th style="padding: 15px; text-align: left; color:rgb(227, 169, 179);">Image</th>
                        <th style="padding: 15px; text-align: left; color: rgb(227, 169, 179);">Titre</th>
                        <th style="padding: 15px; text-align: left; color: rgb(227, 169, 179);">Auteur</th>
                        <th style="padding: 15px; text-align: left; color: rgb(227, 169, 179);">Description</th>
                        <th style="padding: 15px; text-align: left; color: rgb(227, 169, 179);">Date de Publication</th>
                        <th style="padding: 15px; text-align: left; color: rgb(227, 169, 179);">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($livres as $livre)
                        <tr style="border-bottom: 1px solid #FFF0F5; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#FFF0F5'" onmouseout="this.style.backgroundColor='white'">
                            <td style="padding: 15px;"><img src="{{ asset('storage/images' . $livre->image) }}" alt="Image de {{ $livre->nomlivre }}" style="width: 100px; height: auto; border-radius: 8px; border: 2px solid #FFE4E1;"></td>
                            <td style="padding: 15px; color: #666;">{{ $livre->nomlivre }}</td>
                            <td style="padding: 15px; color: #666;">{{ $livre->nomauteur }}</td>
                            <td style="padding: 15px; color: #666;">{{ $livre->description }}</td>
                            <td style="padding: 15px; color: #666;">{{ $livre->date_pub }}</td>
                            <td style="padding: 15px;">
                                <a href="{{ route('user.showlivres', $livre) }}" style="display: inline-block; background-color: #FFE4E1; color: #FFC0CB; padding: 8px 15px; border-radius: 20px; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='#FFC0CB'; this.style.color='white';" onmouseout="this.style.backgroundColor='#FFE4E1'; this.style.color='#FFC0CB';">Voir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection