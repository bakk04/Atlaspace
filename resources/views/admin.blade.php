<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/admin.css') }}">
</head>

<body>
    @if (session('success'))
        <x-alert :message="session('success')" type="success" />
    @endif
    @if (session('error'))
        <x-alert :message="session('error')" type="danger" />
    @endif

    <nav class="sidebar">
        <div class="logo-wrapper">
            <div class="logo-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                    <path d="m2 17 10 5 10-5"></path>
                    <path d="m2 12 10 5 10-5"></path>
                </svg>
            </div>
            <a href="/" class="logo-text">Atlaspace Admin</a>
        </div>
        <div class="menu-item">
            <i class="fas fa-home"></i>
            <span>Tableau de bord</span>
        </div>
        <div class="menu-item">
            <i class="fas fa-sign-out-alt"></i>
            <a href="/profile/logout"><span>Déconnexion</span></a>
        </div>
    </nav>
    <main class="main-content">
        <section class="header-section">
            <h1>Bienvenue, {{ $userData->name }}</h1>
            <p>Tableau de bord en temps réel</p>
            <div id="currentDate"></div>
        </section>

        <div class="stats-grid">
            <!-- Carte pour les Réservations des Hôtels -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-details">
                    <h3>Réservations Hôtels</h3>
                    <div class="stat-value">{{ COUNT($totalHotel) }}</div>
                    <p class="stat-change">+10.00% par rapport au mois dernier</p>
                </div>
            </div>

            <!-- Carte pour les Réservations des Activités -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-details">
                    <h3>Réservations Activités</h3>
                    <div class="stat-value">{{ COUNT($totalActivite) }}</div>
                    <p class="stat-change">+22.00% par rapport au mois dernier</p>
                </div>
            </div>

            <!-- Carte pour les Clients Réservés -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="stat-details">
                    <h3>Total Clients</h3>
                    <div class="stat-value">{{ COUNT($totalUser) }}</div>
                    <p class="stat-change">+2.00% par rapport au mois dernier</p>
                </div>
            </div>

            <!-- Carte pour la Météo -->
            <div class="stat-card weather">
                <div class="stat-icon">
                    <i class="fas fa-sun"></i>
                </div>
                <div class="stat-details">
                    <h3>Météo à <span id="city">Rabat</span></h3>
                    <div class="stat-value" id="temperature">-- °C</div>
                    <p id="description">Chargement...</p>
                </div>
            </div>
        </div>
        </div>

        <!-- Tableau des Réservations Hôtels -->
        <div class="table-container">
            <h2>Réservations Hôtels</h2>
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Hôtel</th>
                        <th>Prix</th>
                        <th>Date de Réservation</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($totalHotel as $reservation)
                        <tr>
                            <td>{{ $reservation->name }}</td>
                            <td>{{ $reservation->nom_hotel }}</td>
                            <td>{{ $reservation->prix }}</td>
                            <td>{{ $reservation->arrival_date }}</td>
                            <td>
                                <span>
                                    <i class="fas fa-times-circle"></i> {{ $reservation->Etat }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Tableau des Réservations Activités -->
        <div class="table-container">
            <h2>Réservations Activités</h2>
            <table class="dashboard-table table-responsive">
                <thead>
                    <tr>
                        <th>Activité</th>
                        <th>Ville</th>
                        <th>Prix</th>
                        <th>Date de Réservation</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($totalActivite as $reservation)
                        <tr>
                            <td>{{ $reservation->nom_activite }}</td>
                            <td>{{ $reservation->ville }}</td>
                            <td>{{ $reservation->prix }}</td>
                            <td>{{ $reservation->dateActivite }}</td>
                            <td>
                                <span>
                                    <i class="fas fa-times-circle"></i> {{ $reservation->Etat }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tableau des Utilisateurs -->
        <div class="table-container">
            <h2>Utilisateurs</h2>
            <table class="dashboard-table table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Date Connexion</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($totalUser as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <span
                                    class="status @if ($user->type == 'admin') confirmed @elseif($user->type == 'membre') pending @else cancelled @endif">
                                    @if ($user->type == 'admin')
                                        <i class="fas fa-user-shield"></i> Admin
                                    @else
                                        <i class="fas fa-user"></i> User
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </main>

    <script src="{{ asset('frontend/js/admin.js') }}"></script>
</body>

</html>
