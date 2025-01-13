<header class="custom-header">
    <div class="custom-container header-content">
        <!-- Logo Section -->
        <div class="custom-logo-container">
            <a href="/" class="custom-logo-link" aria-label="Homepage">
                <div class="custom-logo-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                        <path d="m2 17 10 5 10-5"></path>
                        <path d="m2 12 10 5 10-5"></path>
                    </svg>
                </div>
                <span class="custom-logo-text">Atlaspace</span>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="custom-nav-menu" aria-label="Main navigation">
            <ul class="custom-nav-links">
                <li><a href="/" class="custom-nav-link active" aria-current="page">Accueil</a></li>
                <li><a href="/destination" class="custom-nav-link">Destinations</a></li>
                <li><a href="/hotel" class="custom-nav-link">Hôtels</a></li>
                <li><a href="/propos" class="custom-nav-link">À propos</a></li>
                <li>
                    <a href="https://cdn.botpress.cloud/webchat/v2.3/shareable.html?configUrl=https://files.bpcontent.cloud/2024/12/22/17/20241222174806-BPJMYFGX.json"
                        class="custom-nav-link" target="_self" rel="noopener noreferrer">
                        AtlaspaceAI
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Header Actions -->
        <div class="custom-header-actions">
            <!-- Search Button -->
            <button id="searchToggle" class="custom-search-button" aria-label="Search">
                <i class="fas fa-search"></i>
            </button>

            <!-- Profile Button -->
            <a href="/login" class="custom-account-button" aria-label="Profile">
                <i class="fas fa-user-circle"></i>
                @if (Auth::check())
                    <span>{{ Auth::user()->name }}</span>
                @else
                    <span>Mon Profil</span>
                @endif
            </a>
        </div>
    </div>
</header>
