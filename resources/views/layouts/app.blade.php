<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LecturaMundo</title>
    <!-- Ajouter le CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --baby-pink: #FFC0CB;
            --baby-pink-light: #FFEBEF;
            --baby-pink-dark: #FF69B4;
            --white: #ffffff;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--baby-pink-light);
        }
        
        .navbar {
            background-color: var(--white) !important;
            box-shadow: 0 2px 10px rgba(255, 192, 203, 0.3);
        }
        
        .navbar-brand {
            color: var(--baby-pink-dark) !important;
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 0.5px;
        }
        
        .nav-link {
            color: var(--baby-pink-dark) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 5px;
        }
        
        .nav-link:hover {
            color: var(--baby-pink) !important;
            transform: translateY(-2px);
        }
        
        .active-link {
            border-bottom: 2px solid var(--baby-pink);
        }
        
        .navbar-toggler {
            border-color: var(--baby-pink) !important;
        }
        
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 105, 180, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
        }
        
        .container {
            background-color: var(--white);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(255, 192, 203, 0.2);
            padding: 25px;
            margin-top: 30px !important;
        }
        
        .btn-pink {
            background-color: var(--white);
            color: var(--baby-pink-dark);
            border: 2px solid var(--baby-pink);
            border-radius: 25px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }
        
        .btn-pink:hover {
            background-color: var(--baby-pink);
            color: var(--white);
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(255, 192, 203, 0.4);
        }
        
        h1, h2, h3, h4, h5, h6 {
            color: var(--baby-pink-dark);
        }
        
        footer {
            background-color: var(--white);
            color: var(--baby-pink-dark);
            padding: 20px 0;
            margin-top: 30px;
            box-shadow: 0 -2px 10px rgba(255, 192, 203, 0.3);
        }
    </style>
</head>
<body>

    <!-- Navbar de navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" ><i class="fas fa-book-open me-2"></i>LecturaMundo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Lien vers l'accueil -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home me-1"></i>Accueil</a>
                    </li>
                    <!-- Lien vers les livres -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.livres') }}"><i class="fas fa-book me-1"></i>Livres</a>
                    </li>

                    <!-- Lien vers les réservations -->
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reservations.index') }}"><i class="fas fa-bookmark me-1"></i>Réservations</a>
                        </li>
                    @endauth

                    <!-- Si l'utilisateur est connecté -->
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile') }}"><i class="fas fa-user me-1"></i>Profil</a>
                        </li>
                        <!-- Lien de déconnexion -->
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn-pink nav-link" style="border: none;"><i class="fas fa-sign-out-alt me-1"></i>Déconnexion</button>
                            </form>
                        </li>
                    @else
                        <!-- Lien de connexion et d'inscription -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i>Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><i class="fas fa-user-plus me-1"></i>S'inscrire</a>
                        </li>
                    @endauth

                    <!-- Lien vers l'espace administrateur si l'utilisateur est un admin -->
                    @auth
                        @if(auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt me-1"></i>Dashboard Admin</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container-fluid">
            <p class="mb-0">© 2025 LecturaMundo - Tous droits réservés</p>
        </div>
    </footer>

    <!-- Ajouter les scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script personnalisé -->
    <script>
        // Ajouter la classe active au lien courant
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                if (href && (currentPath.includes(href) || (currentPath === '/' && href.includes('/home')))) {
                    link.classList.add('active-link');
                }
            });
        });
    </script>
</body>
</html>