<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            min-height: 100vh;
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
            position: relative;
            padding: 8px 15px;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--baby-pink) !important;
            transform: translateY(-2px);
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: var(--baby-pink);
            transition: all 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 80%;
            left: 10%;
        }
        
        .user-container {
            background-color: var(--white);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(255, 192, 203, 0.2);
            padding: 25px;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        
        h1, h2, h3, h4, h5, h6 {
            color: var(--baby-pink-dark);
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
        
        .navbar-toggler {
            border-color: var(--baby-pink) !important;
        }
        
        .user-footer {
            text-align: center;
            padding: 15px 0;
            margin-top: auto;
            color: var(--baby-pink-dark);
            font-size: 0.9rem;
            background-color: var(--white);
            box-shadow: 0 -2px 10px rgba(255, 192, 203, 0.2);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><i class="fas fa-book me-2"></i>Biblio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUser" aria-controls="navbarUser" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarUser">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}"><i class="fas fa-user me-1"></i>Mon Profil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('reservations.index') }}"><i class="fas fa-bookmark me-1"></i>Mes Réservations</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-1"></i>Déconnexion
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container user-container">
    @yield('content')
</div>

<footer class="user-footer mt-auto">
    <div class="container">
        <p class="mb-0">© 2025 LecturaMundo - Espace utilisateur</p>
    </div>
</footer>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>