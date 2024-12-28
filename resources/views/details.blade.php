<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/details.css') }}">
    <title>Page details</title>
</head>

<body>

    <body>
        <div class="hotel-container">
            <div class="hotel-card">
                <!-- Container Flex pour Image et Détails -->
                <div class="hotel-content">
                    <!-- Image à gauche -->
                    <div class="hotel-image-container">
                        <img src="{{ asset($hotelData['background']) }}" alt="Image de l'hôtel" class="hotel-image">
                    </div>
                    <!-- Détails à droite -->
                    <div class="hotel-details">
                        <h1 class="hotel-title text-center text-3xl font-bold">{{ $hotelData['name'] }}</h1>
                        <div class="hotel-details-grid mt-4">
                            <div class="detail-card animate-in" style="animation-delay: 0.1s">
                                <span class="detail-label">Prix par nuit</span>
                                <span class="detail-value">
                                    <i class="fas fa-tag"></i>
                                    {{ $hotelData['price'] }} MAD
                                </span>
                            </div>
                            <div class="detail-card animate-in" style="animation-delay: 0.2s">
                                <span class="detail-label">Localisation</span>
                                <span class="detail-value">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $hotelData['location'] }}
                                </span>
                            </div>
                            <div class="detail-card animate-in" style="animation-delay: 0.3s">
                                <span class="detail-label">Durée minimum</span>
                                <span class="detail-value">
                                    <i class="fas fa-clock"></i>
                                    {{ $hotelData['days'] }} jours
                                </span>
                            </div>
                        </div>
                        <button class="reserve-button animate-in mt-4" style="animation-delay: 0.4s">
                            Réserver maintenant
                        </button>
                        <button class="see-more-btn" data-address="{{ $hotelData['name'] }}"
                            data-name="{{ $hotelData['name'] }}">
                            <i class="fab fa-google"></i> Voir sur Maps
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @include('partiel.reserver')
        @include('partiel.commentaire')
        <script src="{{ asset('frontend/js/details.js') }}"></script>
    </body>

</html>
