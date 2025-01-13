@extends('layouts.master')

<head>
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

@section('main')
    @if (session('success'))
        <x-alert :message="session('success')" type="success" />
    @endif
    @if (session('error'))
        <x-alert :message="session('error')" type="danger" />
    @endif
    <div class="profile-container">
        <div class="profile-card">
            <!-- Header Profil -->
            <div class="profile-header">
                <div class="profile-logo-name">
                    <div class="profile-logo">
                        {{ substr($userData['name'], 0, 1) }}
                    </div>
                    <div class="profile-name-email">
                        <h1>{{ $userData['name'] }}</h1>
                        <h2>{{ $userData['email'] }}</h2>
                    </div>
                </div>

                <div class="profile-stats">
                    <span class="profile-stat">{{ count($userReserve) }} Réservations d'Hôtels</span>
                    <span class="profile-stat">{{ count($ActiviteReserve) }} Activités</span>
                </div>

                <!-- Menu déroulant pour les options -->
                <div class="dropdown">
                    <button class="dropdown-btn" id="dropdown-btn" onclick="menuDeroulant();">
                        <i class="fas fa-cog"></i>
                    </button>
                    <div class="dropdown-content" id="menu" style="display: none;">
                        <form action="{{ route('logout') }}" method="GET">
                            @csrf
                            <button type="submit" onclick="confirmlogout()">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </button>
                        </form>
                        <form action="{{ route('profile.delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $userData['id'] }}">
                            @method('DELETE')
                            <button type="submit" class="delete-account-btn"
                                onclick="confirmDeleteCompte({{ $userData['id'] }})">
                                <i class="fas fa-user-times"></i> Supprimer le compte
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Réservations d'Hôtels -->
            <div class="reservation-section">
                <div class="section-card">
                    <h3 class="section-title">
                        <i class="fas fa-hotel"></i> Réservations d'Hôtels
                    </h3>
                    <div class="table-container">
                        <table class="reservation-table">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-building"></i> Hôtel</th>
                                    <th><i class="fas fa-calendar"></i> Durée</th>
                                    <th><i class="fas fa-clock"></i> Date</th>
                                    <th><i class="fas fa-money-bill"></i> Prix</th>
                                    <th><i class="fas fa-check-circle"></i> État</th>
                                    <th><i class="fas fa-trash"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userReserve as $reserve)
                                    <tr>
                                        <td><i class="fas fa-hotel text-blue-600"></i> {{ $reserve['nom_hotel'] }}</td>
                                        <td>{{ $reserve['nights'] }} jours</td>
                                        <td>{{ $reserve['arrival_date'] }}</td>
                                        <td>{{ number_format($reserve['prix'], 2) }} MAD</td>
                                        <td><span class="status-badge unpaid">{{ $reserve['Etat'] }}</span></td>
                                        <td>
                                            <form action="{{ route('hotel.supprime') }}" method="POST"
                                                id="deleteForm{{ $reserve['id'] }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $reserve['id'] }}">
                                                <button type="button" class="delete-btn"
                                                    onclick="confirmDelete({{ $reserve['id'] }})">
                                                    <i class="fas fa-trash text-red-600"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (count($userReserve) === 0)
                                    <tr>
                                        <td colspan="6">
                                            <i class="fas fa-bed"></i>
                                            <p>Aucune réservation d'hôtel</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Réservations d'Activités -->
            <div class="reservation-section">
                <div class="section-card">
                    <h3 class="section-title">
                        <i class="fas fa-calendar-alt"></i> Réservations d'Activités
                    </h3>
                    <div class="table-container">
                        <table class="reservation-table">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-map-marker-alt"></i> Activité</th>
                                    <th><i class="fas fa-city"></i> Ville</th>
                                    <th><i class="fas fa-calendar-day"></i> Date</th>
                                    <th><i class="fas fa-money-bill"></i> Prix</th>
                                    <th><i class="fas fa-check-circle"></i> État</th>
                                    <th><i class="fas fa-trash"></i> Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ActiviteReserve as $reserve)
                                    <tr>
                                        <td><i class="fas fa-hiking text-green-600"></i> {{ $reserve['nom_activite'] }}
                                        </td>
                                        <td>{{ $reserve['ville'] }}</td>
                                        <td>{{ $reserve['dateActivite'] }}</td>
                                        <td>{{ number_format($reserve['prix'], 2) }} MAD</td>
                                        <td><span class="status-badge unpaid">{{ $reserve['Etat'] }}</span></td>
                                        <td>
                                            <form action="{{ route('activite.supprime') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $reserve['id'] }}">
                                                <button type="submit" class="delete-btn"
                                                    onclick="confirmDelete({{ $reserve['id'] }})">
                                                    <i class="fas fa-trash text-red-600"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (count($ActiviteReserve) === 0)
                                    <tr>
                                        <td colspan="6">
                                            <i class="fas fa-running"></i>
                                            <p>Aucune réservation d'activité</p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('frontend/js/profile.js') }}"></script>
@endsection
