<nav class="navbar navbar-expand navbar-light  topbar mb-4 " style="background-image:linear-gradient(180deg, #0ef 0.01%, #081B29 100%);box-shadow: 0 0 5px #0ef;background-color:#081b29">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->


        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <!-- <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                Counter - Alerts
                <span class="badge badge-danger badge-counter">3+</span>
            </a> -->
            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <!-- <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a> -->
            <!-- Dropdown - User Information -->
            <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div> -->
        </li>

    </ul>
    <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> -->
    <div class="container">
        <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>  -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->


            <ul class="navbar-nav ms-auto">

                <li class="nav-item dropdown no-arrow">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!-- Vérifiez si l'utilisateur a une photo de profil -->
                        @if(Auth::user()->profile_image)
                        <img class="img-profiles rounded-circle" src="{{ Storage::url(Auth::user()->profile_image) }}">
                        @else
                        <!-- Si l'utilisateur n'a pas de photo de profil, affichez ses initiales dans un cercle -->
                        <div class="circle circle-topbar ">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <!-- Autres éléments de menu ici -->
                    </div>
                </li>

                <li>

                    <!-- <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            </a> -->
            @if (auth()->check())
    <!-- Notification Button -->
    <li class="nav-item">
  <a class="nav-link" href="{{ route('notifications.index') }}">
    <div class="custom-btn-container">
      <button class="custom-btns position-relative" id="notificationDropdown">
        <i class="bi bi-bell-fill"></i>
        <!-- Badge de notification -->
        <span class="badges bg-gradient-danger position-absolute top-0 start-100 translate-middle">
          {{ auth()->user()->unreadNotifications->count() }}
          <span class="visually-hidden">unread messages</span>
        </span>
      </button>
    </div>
  </a>
</li>
@endif


                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>


</nav>
<style>
    .circle-topbar {
        width: 40px;
        /* Taille réduite */
        height: 40px;
        /* Taille réduite */
        border-radius: 50%;
        /* background-color: #007bff; */
        background-color: linear-gradient(180deg, #0ef, #081b29);

        /* Couleur de fond du cercle */
        color: #fff;
        /* Couleur du texte à l'intérieur du cercle */
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        /* Taille du texte */
        margin: 0 auto;
        /* Centrer le cercle */
        border: 3px solid #0ef; /* Ajoute un contour blanc de 3px */
        
    }

    .img-profiles {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

   
    /* Pour éviter le problème du dimensionnement lors du clic sur le bouton de modification du profil */
    .nav-item.dropdown.no-arrow .circles,
    .nav-item.dropdown.no-arrow .img-profiles {
        width: 40px;
        /* Taille fixe pour le cercle dans la topbar */
        height: 40px;
        /* Taille fixe pour le cercle dans la topbar */
        font-size: 10px;
        /* Taille du texte dans la topbar */
    }

   
    /* Badge de notification */
    .badges {
        font-size: 12px;
        /* Taille du texte du badge */
        border-radius: 50%;
        /* Forme du badge */
        padding: 4px 6px;
        /* Espace à l'intérieur du badge */
    }
 
.custom-btns {
  background-image: linear-gradient(180deg, #0ef, #081b29);
  padding: 5px 10px;
  border-radius: 20px;
  transition: background-image 0.3s ease;
  color: white;
  border: 3px solid #0ef; /* Ajoute un contour blanc de 3px */

}

</style>