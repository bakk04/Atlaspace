<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/Login.css') }}">
    <title>Page de Connexion Avancée</title>
</head>

<body>
    @if (session('success'))
        <x-alert :message="session('success')" type="success" />
    @endif
    @if (session('error'))
        <x-alert :message="session('error')" type="danger" />
    @endif
    <div class="logo-wrapper">
        <div class="logo-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                <path d="m2 17 10 5 10-5"></path>
                <path d="m2 12 10 5 10-5"></path>
            </svg>
        </div>
        <a href="/" class="logo-text">Atlaspace</a>
    </div>
    <div class="scene">
        <div class="container" id="container">
            <!-- Section Se Connecter -->
            <div class="form-container sign-in active" id="login-form">
                <form method="POST" action="{{ route('connexion') }}">
                    @csrf
                    <h1>Se Connecter</h1>

                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif

                    @if ($errors->has('password'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif

                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Mot de passe" required>
                    </div>
                    <button type="submit" class="cta-button">
                        <span>Se Connecter</span>
                        <i class="fas fa-sign-in-alt"></i>
                    </button>
                    <a class="forgot-password">Mot de passe oublié ?</a>
                    <div class="social-login">
                        <p>Ou connectez-vous avec</p>
                        <div class="social-icons">
                            <a href="https://wa.me/212628503265" class="social-icon" target="_blank"
                                rel="noopener noreferrer"><i class="fab fa-whatsapp"></i></a>
                            <a href="tel:0628503265" class="social-icon"><i class="fas fa-phone"></i></a>
                        </div>
                    </div>
                    <p class="signup-link">Pas encore inscrit ? <a id="switch-to-register">Créer un compte</a></p>
                </form>
            </div>

            <!-- Section S'inscrire -->
            <div class="form-container sign-up" id="register-form">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>Créer un Compte</h1>
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" placeholder="Nom" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Mot de passe" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe"
                            required>
                    </div>
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                    <button type="submit" class="cta-button">
                        <span>S'inscrire</span>
                        <i class="fas fa-user-plus"></i>
                    </button>
                    <p class="signup-link">Déjà un compte ? <a id="switch-to-login">Se connecter</a></p>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('frontend/js/script.js') }}"></script>
</body>

</html>
