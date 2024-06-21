<div class="container-fluid container-xl position-relative d-flex align-items-center">
    <!-- Icône "Back" -->
    <a href="javascript:history.back()" class="btn btn-outline-primary d-none d-md-block me-4">
    <i class="bi bi-arrow-left"></i>
</a>

    <!-- <img src="{{ asset('assets/img/accu.png') }}" alt="Logo" style="width: 80px; height: 80px;"> -->
    <div class="blurred-border">
        <img src="{{ asset('assets/img/accu.png') }}" alt="Logo">
    </div>

    <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->

        <h1 class="sitename mb-0" style="text-transform: none;">StudentHub</h1> <!-- Ajout de la classe mb-0 pour supprimer la marge basse -->
    </a>


    <nav id="navmenu" class="navmenu ms-auto">
        <ul>
            <li><a href="#hero" class="active">Accueil</a></li>
            <li><a href="#about">A propos</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#discussions">Forum</a></li>
            <li><a href="{{ route('login') }}">Connexion</a></li>
            <li><a href="{{ route('register') }}">S'inscrire</a></li>
        </ul>

        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
</div>
