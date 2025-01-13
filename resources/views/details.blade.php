<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Découvrez l'hôtel {{ $hotelData['name'] }}. Un séjour luxueux au cœur du Maroc, avec des prestations haut de gamme.">
    <title>{{ $hotelData['name'] }} - Détails de l'hôtel</title>

    <!-- Polices Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Styles CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/details.css') }}">
</head>

<body class="font-poppins bg-gray-50">
    <header class="relative text-white py-12 shadow-xl">
        <img src="{{ asset('frontend/images/maroc.jpg') }}" alt="Image de l'hôtel"
            class="absolute inset-0 w-full h-full object-cover opacity-60">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <h1 class="text-5xl font-playfair font-bold mb-4 animate-fadeIn">{{ $hotelData['name'] }}</h1>
            <p class="text-xl text-gray-200">Un havre de paix et de luxe au cœur du Maroc</p>
        </div>
    </header>



    <!-- Contenu principal -->
    <main class="container mx-auto px-6 py-12">
        <!-- Section de l'hôtel -->
        <div
            class="bg-white rounded-2xl shadow-2xl overflow-hidden transform transition-all duration-500 hover:scale-105">
            <div class="flex flex-col lg:flex-row">
                <!-- Image de l'hôtel -->
                <div class="lg:w-1/2 relative overflow-hidden group">
                    <img src="{{ asset($hotelData['background']) }}" alt="Image de l'hôtel {{ $hotelData['name'] }}"
                        class="w-full h-full object-cover transform transition-all duration-500 hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70">
                    </div>
                    <div class="absolute bottom-8 left-8 text-white">
                        <h2 class="text-4xl font-playfair font-bold">{{ $hotelData['name'] }}</h2>
                        <p class="text-lg">{{ $hotelData['location'] }}</p>
                    </div>
                    <!-- Description masquée -->
                    <div
                        class="absolute inset-0 bg-black bg-opacity-70 text-white text-center flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <h3 class="text-2xl font-bold">{{ $hotelData['name'] }}</h3>
                        <p class="text-lg mt-2">
                            {{ $hotelData['description'] ?? 'Profitez d’un séjour inoubliable dans cet hôtel !' }}</p>
                    </div>
                </div>


                <!-- Détails de l'hôtel -->
                <div class="lg:w-1/2 p-10 bg-gradient-to-br from-gray-50 to-white">
                    <h2 class="text-3xl font-playfair font-bold mb-6 text-bleu-900 text-center">Détails de l'hôtel
                    </h2>


                    <!-- Grille des détails -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div
                            class="bg-white p-6 rounded-xl shadow-lg transform transition-all duration-300 hover:scale-105">
                            <span class="block text-sm text-gray-600">Prix par nuit</span>
                            <span class="text-2xl text-blue-900">
                                <i class="fas fa-tag mr-2 text-blue-600"></i>
                                {{ $hotelData['price'] }} MAD
                            </span>
                        </div>
                        <div
                            class="bg-white p-6 rounded-xl shadow-lg transform transition-all duration-300 hover:scale-105">
                            <span class="block text-sm text-gray-600">Localisation</span>
                            <span class="text-2xl text-blue-900">
                                <i class="fas fa-map-marker-alt mr-2 text-blue-600"></i>
                                {{ $hotelData['location'] }}, Maroc
                            </span>
                        </div>
                        <div
                            class="bg-white p-6 rounded-xl shadow-lg transform transition-all duration-300 hover:scale-105">
                            <span class="block text-sm text-gray-600">Durée minimum</span>
                            <span class="text-2xl text-blue-900">
                                <i class="fas fa-clock mr-2 text-blue-600"></i>
                                {{ $hotelData['days'] }}
                            </span>
                        </div>
                        <div
                            class="bg-white p-6 rounded-xl shadow-lg transform transition-all duration-300 hover:scale-105">
                            <span class="block text-sm text-gray-600">Chambres disponibles</span>
                            <span class="text-2xl text-blue-900">
                                <i class="fas fa-bed mr-2 text-blue-600"></i>
                                @if ($hotelData['chambre'] > 0)
                                    {{ $hotelData['chambre'] }}
                                @else
                                    <span class="text-red-600"><i class="fas fa-times-circle mr-2 text-red-600"></i>
                                        Hors réservation</span>
                                    <!-- Texte et icône rouge pour indiquer l'indisponibilité -->
                                @endif
                            </span>
                        </div>
                    </div>

                    <!-- Boutons d'action -->
                    <div class="flex flex-col space-y-4">
                        <button
                            class="reserve-button bg-gradient-to-r from-blue-700 to-blue-600 text-white py-3 px-6 rounded-xl shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-xl">
                            <i class="fas fa-calendar-check mr-2"></i> Réserver maintenant
                        </button>
                        <button
                            class="see-more-btn bg-gradient-to-r from-red-600 to-red-500 text-white py-3 px-6 rounded-xl shadow-lg transform transition-all duration-300 hover:scale-105 hover:shadow-xl"
                            data-address="{{ $hotelData['name'] }}" data-name="{{ $hotelData['name'] }}">
                            <i class="fab fa-google"></i> Voir sur Maps
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sections incluses -->
        @include('partiel.reserver')
        <div class="commentaire">
            @include('partiel.commentaire')
        </div>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('frontend/js/details.js') }}"></script>
</body>

</html>
