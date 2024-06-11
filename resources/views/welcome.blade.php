<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #555;
        }

        .hero {
            background-color: #fff;
            padding: 50px;
            text-align: center;
            margin-top: 20px;
            border-radius: 10px;
        }

        .btn {
            display: inline-block;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #555;
        }

        .features, .about {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Forum Fantastique</h1>
        <nav>
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">À propos</a></li>
                <li><a href="#">Fonctionnalités</a></li>
                <li>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Connexion</a>
                        @endauth
                    @endif
                </li>
                <li>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Inscription</a>
                    @endif
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="hero">
            <h2>Bienvenue sur le Forum Fantastique</h2>
            <p>Un lieu où les passionnés peuvent se réunir, partager leurs idées et discuter de tout ce qui les intéresse.</p>
            <a href="#" class="btn">Commencer</a>
        </section>
        <section class="features">
            <h2>Fonctionnalités</h2>
            <ul>
                <li>Forums de discussion thématiques</li>
                <li>Profils personnalisables</li>
                <li>Messagerie privée</li>
                <li>Notifications en temps réel</li>
                <li>Et bien plus encore...</li>
            </ul>
        </section>
        <section class="about">
            <h2>À propos</h2>
            <p>Le Forum Fantastique a été créé dans le but de fournir une plateforme conviviale pour les échanges et les discussions sur une multitude de sujets. Notre communauté accueille chaleureusement les nouveaux membres.</p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Forum Fantastique. Tous droits réservés.</p>
    </footer>
</body>
</html>
