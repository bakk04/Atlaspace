<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/activite.css') }}">
    <script src="https://js.stripe.com/v3/"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Activités - {{ $Ville->name }}</title>
</head>

<body>
    <header class="page-header hero-section">
        <div class="container mx-auto px-4">
            <h1 class="page-title">Découvrez les activités à {{ $Ville->name }}</h1>
            <p class="page-subtitle">Explorez les meilleures expériences et activités soigneusement sélectionnées pour
                votre séjour</p>
        </div>
        <div class="wave"></div>
    </header>
    <div class="activities-grid">
        @foreach ($Activite as $activite)
            <div class="activity-card scroll-reveal">
                <div class="activity-image-wrapper">
                    <img src="{{ asset($activite->background) }}" alt="{{ $activite->name }}" class="activity-image">

                    <div class="activity-content">
                        <div class="activity-date">{{ $activite->dateActivite }}</div>
                        <div class="rating">
                            <span class="star"><i class="fas fa-star"></i></span>
                            <span class="star"><i class="fas fa-star"></i></span>
                            <span class="star"><i class="fas fa-star"></i></span>
                            <span class="star"><i class="fas fa-star"></i></span>
                        </div>
                        <h3 class="activity-title">{{ $activite->name }}</h3>
                        <p class="activity-price">
                            <i class="fas fa-tag"></i>
                            <span>{{ $activite->prix }} MAD</span>
                        </p>
                        <button class="reserve-button animate-in mt-4" style="animation-delay: 0.4s">
                            Réserver maintenant
                        </button>

                        <!-- Bouton "Voir plus" spécifique à chaque activité -->
                        <button class="see-more-btn btn text-white rounded-full mt-4"
                            data-address="{{ $activite->lien_google_maps }}" data-name="{{ $activite->name }}">
                            <i class="fab fa-google"></i> Voir sur Maps
                        </button>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('partiel.reserveActivite');
    <script src="{{ asset('frontend/js/activite.js') }}"></script>
</body>

</html>
