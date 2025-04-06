<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - Admin</title>
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
            box-shadow: 0 2px 10px rgba(255, 192, 203, 0.4);
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
            margin: 0 5px;
            padding: 8px 15px;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            background-color: var(--baby-pink);
            color: var(--white) !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(255, 105, 180, 0.2);
        }
        
        .content-wrapper {
            padding: 30px 0;
        }
        
        .admin-container {
            background-color: var(--white);
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(255, 192, 203, 0.3);
            padding: 25px;
            margin-top: 20px;
        }
        
        h1, h2, h3, h4, h5, h6 {
            color: var(--baby-pink-dark);
        }
        
        .admin-title {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }
        
        .admin-title::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, var(--baby-pink), var(--baby-pink-dark));
            border-radius: 3px;
        }
        
        .admin-footer {
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
            color: var(--baby-pink-dark);
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}"><i class="fas fa-user-cog me-2"></i>Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarAdmin" aria-controls="navbarAdmin" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarAdmin">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home me-1"></i>Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt me-1"></i>Déconnexion</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="content-wrapper">
    <div class="container admin-container">
        @yield('content')
    </div>
</div>

<footer class="admin-footer">
    <div class="container">
        <p class="mb-0">© 2025 LecturaMundo - Interface d'administration</p>
    </div>
</footer>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>