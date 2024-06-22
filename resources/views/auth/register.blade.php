<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire avec Boxicons</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Placez le contenu de votre fichier style.css ici */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
            background: #081b29;
        }

        .wrapper {
            position: relative;
            width: 750px;
            height: 450px;
            background: transparent;
            border: 2px solid #0ef;
            box-shadow: 0 0 25px #0ef;
            overflow: hidden;
            min-height: 95vh;
            margin-top: 20px; /* Ajoutez cette ligne */
        }

        .wrapper .form-box {
            position: absolute;
            top: 0;
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .wrapper .form-box.login {
            left: 0;
            padding: 0 40px 0 40px;
            display: none;
        }

        .wrapper .form-box.register {
            left: 0;
            right: 0;
            padding: 0 40px 0 60px;
        }

        .form-box .input-box {
            position: relative;
            width: 100%;
            height: 50px;
            margin: 25px 0;
        }

        .input-box input {
            width: 80%;
            height: 90%;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 2px solid #fff;
            padding-right: 23px;
            font-size: 16px;
            color: #fff;
            font-weight: 500;
            transition: .5s;
            padding-bottom: 10px;
            top: 2px;
        }

        .input-box input:focus,
        .input-box input:valid {
            border-bottom-color: #0ef;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
            margin-right: 10px;
        }

        .input-box input:focus ~ label,
        .input-box input:valid ~ label {
            top: -5px;
            color: #0ef;
        }

        .input-box i {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            font-size: 18px;
            color: #fff;
            transition: .5s;
            width: 26%;
        }

        .input-box input:focus ~ i,
        .input-box input:valid ~ i {
            color: #0ef;
        }

        .btn {
            position: relative;
            width: 87%;
            height: 45px;
            background: transparent;
            border: 2px solid #0ef;
            outline: none;
            border-radius: 40px;
            cursor: pointer;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            z-index: 1;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 300%;
            background: linear-gradient(#081b29, #0ef, #081b29, #0ef);
            z-index: -1;
            transition: .5s;
        }

        .btn:hover::before {
            top: 0;
        }

        .form-box .logreg-link {
            font-size: 14.5px;
            color: #fff;
            text-align: center;
            margin: 20px 0 10px;
        }

        .logreg-link p a {
            color: #0ef;
            text-decoration: none;
            font-weight: 600;
        }

        .logreg-link p a:hover {
            text-decoration: underline;
        }

        .wrapper .info-text {
            position: absolute;
            top: 0;
            width: 50%;
            height: 70%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .wrapper .info-text.login {
            right: 0;
            text-align: right;
            padding: 0 40px 60px 150px;
        }

        .info-text h2 {
            font-size: 36px;
            color: #fff;
            line-height: 1.3;
            text-transform: uppercase;
            margin-bottom: 60px;
            font-family: 'Roboto', sans-serif;
        }

        .info-text p {
            font-size: 16px;
            color: #fff;
        }

        .wrapper .bg-animate {
            position: absolute;
            top: 0;
            right: 0;
            width: 850px;
            height: 600px;
            background: linear-gradient(45deg, #081b29, #0ef);
            border-bottom: 3px solid #0ef;
            transform: rotate(10deg) skewY(40deg);
            transform-origin: bottom right;
        }

        .input-box select {
            width: 80%;
            height: 60%;
            background: transparent;
            border: none;
            outline: none;
            border-bottom: 2px solid #fff;
            padding-right: 23px;
            font-size: 16px;
            color: #fff;
            font-weight: 500;
            transition: border-color 0.3s;
            background-color: #081b29;
            padding-bottom: 30px;
            text-align: right;
            margin-top: 15px;
        }

        .input-box select:focus,
        .input-box select:valid {
            border-bottom-color: #0ef;
        }

        .input-box select:focus ~ label,
        .input-box select:valid ~ label {
            top: -5px;
            color: #0ef;
        }

        .input-box select:hover {
            border-bottom-color: #0ef;
        }

        .input-box select:focus {
            border-bottom-color: #0ef;
            box-shadow: 0 0 5px rgba(0, 128, 255, 0.5);
        }

        .form-check {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .form-check-input {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .form-check-input[type="checkbox"]:checked {
            background-color: #081b29;
            border-color: #0ef;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: #fff;
        }

        .label {
            font-weight: bold;
            color: #fff;
        }

        .input[type="checkbox"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #081b29;
            color: #0ef;
        }

        .form-group input {
            color: #fff;
        }
        
        .btn-back {
    position: fixed;
    top: 20px;
    left: 20px;
    background-color: transparent;
    border: 2px solid #0ef;
    color: #fff;
    font-size: 20px;
    padding: 10px;
    cursor: pointer;
    z-index: 9999; /* Assure que le bouton reste au-dessus des autres éléments */
}
.form-box h2 {
            font-size: 25px;
            color: #fff;
            text-align: left;
        }


/* Style pour l'icône */
.btn-back i {
    vertical-align: middle;
}
.header {
    display: flex;
    align-items: center;
    margin-bottom: 5px;
    justify-content: flex-start;
    padding-left: -100px;
}

.header img {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    margin-right: 10px;
}

.header h2 {
    font-size: 25px;
    color: #fff;
    margin: 0;
}.custom-checkbox .form-check-input {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-color: transparent; /* Fond transparent par défaut */
    width: 20px;
    height: 20px;
    border: 1px solid #ccc;
    border-radius: 3px;
    outline: none;
    cursor: pointer;
    position: relative;
}

.custom-checkbox .form-check-input:checked {
    background-color: #0ef; /* Couleur de fond lorsque la case est cochée */
}

.custom-checkbox .form-check-input:checked::before {
    content: ''; /* Pseudo-élément pour simuler la coche */
    position: absolute;
    top: 5px; /* Ajustement vertical pour centrer */
    left: 7px; /* Ajustement horizontal pour centrer */
    width: 6px; /* Largeur de la coche */
    height: 10px; /* Hauteur de la coche */
    border: 2px solid #fff; /* Couleur et épaisseur de la coche */
    border-top: none; /* Supprimer la partie supérieure de la coche */
    border-left: none; /* Supprimer la partie gauche de la coche */
    transform: rotate(45deg); /* Rotation pour créer une forme de coche */
}

.custom-checkbox .form-check-label {
    color: #fff; /* Couleur du texte du label */
    margin-left: 8px; /* Espace entre la case à cocher et le label */
}

.custom-checkbox .spacer {
    margin-right: 10px; /* Espace supplémentaire entre les cases à cocher */
}
.interests {
    display: block; /* Pour que le label soit sur une ligne distincte */
    margin-bottom: 20px; /* Ajustement de l'espace sous le label */
}


.highlight-text {
    color: #0ef; /* Couleur plus foncée pour "StudentHub" */
}
.form-group {
    margin-bottom: 20px;
}

.form-group .interests {
    color: #fff;
    font-weight: bold;
    position: relative;
    display: flex;
    align-items: center;
}

.form-group .interests i {
    margin-left: 70px; /* Espace entre l'icône et le texte */
    font-size: 24px; /* Taille de l'icône */
    color: #fff; /* Couleur de l'icône */
}

.form-group .interests::before {
    content: '';
    position: absolute;
    bottom: -8px; /* Positionnement du trait par rapport au texte */
    left: 0;
    width: 220px; /* Largeur du trait */
    height: 1.5px; /* Hauteur du trait */
    background-color: #0ef; /* Couleur du trait */
}

    </style>
</head>
<body>
    <div class="wrapper">
        <span class="bg-animate"></span>
        <div class="form-box register">
        <div class="header">
        <img src="{{ asset('assets/img/logoForum.png') }}" alt="Logo">
        <h2>Inscription</h2>
    </div>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="input-box">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label>Nom d'utilisateur</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label>Email</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <label>Niveau</label>
                    <select id="niveau" class="form-select" name="niveau" required>
                        <option value="licence1">Licence 1</option>
                        <option value="licence2">Licence 2</option>
                        <option value="licence3">Licence 3</option>
                        <option value="master1">Master 1</option>
                        <option value="master2">Master 2</option>
                    </select>
                </div>
                <div class="form-check">
                                    <input class="form-check-input" type="hidden" name="user_type" id="student" value="student" checked>
                                    <label class="form-check-label" for="student">
                                     
                                    </label>
                                </div>
                                <div class="form-group text-white">
                                <label class="interests">
        Centre d'interet 
        <i class='bx bx-network-chart'></i> <!-- Icône pour l'informatique et les réseaux -->
    </label>    
    <div class="custom-checkbox checkbox-group">
        <label>
            <input type="checkbox" id="informatique" name="interests[]" value="informatique" class="form-check-input">
            <span class="form-check-label " >Informatique</span>
        </label>
        <span class="spacer"></span> <!-- Espace supplémentaire -->
        <label>
            <input type="checkbox" id="reseaux" name="interests[]" value="reseaux" class="form-check-input">
            <span class="form-check-label">Reseaux</span>
        </label>
    </div>
</div>

                <div class="input-box">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <label>Mot de passe</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-box">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <label>Confirmer Mot de passe</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn">S'inscrire</button>
                <div class="logreg-link">
                    <p>Avez vous un compte? <a href="{{ route('login') }}" class="register-link">connexion</a></p>
                </div>
            </form>
        </div>
        <div class="info-text login">
            <h2>Bienvenue</h2>
            <p>Rejoignez <span class="highlight-text">StudentHub</span> pour une expérience d'apprentissage collaborative et enrichissante !</p>
            </div>
    </div>
    <!-- Bouton Back avec icône -->
<button type="button" onclick="window.history.back()" class="btn-back">
    <i class="bx bx-arrow-back"></i>
</button>
</body>
</html>
