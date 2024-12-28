document.addEventListener('DOMContentLoaded', function () {
    // Animation des cartes au scroll
    const cards = document.querySelectorAll('.reservation-card');

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        },
        { threshold: 0.1 }
    );

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        observer.observe(card);
    });

    // Animation hover sur les lignes des tableaux
    const tableRows = document.querySelectorAll('.custom-table tr');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function () {
            this.style.transition = 'all 0.3s ease';
        });
    });
});
// S'assurer que le DOM est chargé
document.addEventListener('DOMContentLoaded', function () {
    // Cibler les éléments du bouton et du modal
    const settingsBtn = document.getElementById('settingsBtn');
    const settingsModal = document.getElementById('settingsModal');
    const closeBtn = document.getElementById('closeBtn');

    // Vérifier si les éléments existent avant d'ajouter des événements
    if (settingsBtn && settingsModal && closeBtn) {
        // Ouvrir le modal lorsque le bouton est cliqué
        settingsBtn.addEventListener('click', function () {
            settingsModal.classList.remove('hidden'); // Afficher le modal
        });

        // Fermer le modal lorsque l'utilisateur clique sur la croix
        closeBtn.addEventListener('click', function () {
            settingsModal.classList.add('hidden'); // Cacher le modal
        });

        // Fermer le modal si l'utilisateur clique en dehors de celui-ci
        window.addEventListener('click', function (event) {
            if (event.target === settingsModal) {
                settingsModal.classList.add('hidden'); // Cacher le modal si on clique en dehors
            }
        });
    }
});
// Gestion du menu déroulant
document.querySelectorAll('.dropdown-btn').forEach((button) => {
    button.addEventListener('click', (e) => {
        const dropdown = button.nextElementSibling;
        dropdown.style.display =
            dropdown.style.display === 'block' ? 'none' : 'block';

        // Fermer les autres menus ouverts
        document.querySelectorAll('.dropdown-content').forEach((content) => {
            if (content !== dropdown) {
                content.style.display = 'none';
            }
        });

        e.stopPropagation();
    });
});

// Fermer le menu déroulant si on clique ailleurs
window.addEventListener('click', () => {
    document.querySelectorAll('.dropdown-content').forEach((content) => {
        content.style.display = 'none';
    });
});

document.querySelectorAll('.delete-form').forEach(function (form) {
    form.addEventListener('submit', function (e) {
        // Demander la confirmation avant de soumettre le formulaire
        if (!confirm("Êtes-vous sûr de vouloir supprimer cette réservation ?")) {
            e.preventDefault(); // Annuler l'action de suppression si l'utilisateur refuse
        }
    });
});
function confirmDelete(reservationId) {
    // Affiche la fenêtre de confirmation
    if (confirm("Êtes-vous sûr de vouloir supprimer cette réservation ?")) {
        // Si l'utilisateur confirme, soumettre le formulaire
        document.getElementById('deleteForm' + reservationId).submit();
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const dropdownBtn = document.getElementById("dropdown-btn");
    const menu = document.getElementById("menu");
    let isMenuVisible = false;

    // Fonction pour gérer l'affichage du menu
    function toggleMenu() {
        isMenuVisible = !isMenuVisible;
        menu.style.display = isMenuVisible ? "block" : "none";
    }

    // Ajouter l'événement au bouton
    dropdownBtn.addEventListener("click", toggleMenu);

    // Optionnel : Fermer le menu si on clique en dehors
    document.addEventListener("click", function (event) {
        if (!dropdownBtn.contains(event.target) && !menu.contains(event.target)) {
            menu.style.display = "none";
            isMenuVisible = false;
        }
    });
});

function confirmlogout() {
    // Affiche la fenêtre de confirmation
    if (confirm("Êtes-vous sûr de vouloir sortir de compte ?")) {
        // Si l'utilisateur confirme, soumettre le formulaire
        document.getElementById('deleteForm').submit();
    }
}

function confirmDeleteCompte(compteId) {
    // Affiche la fenêtre de confirmation
    if (confirm("Êtes-vous sûr de vouloir supprimer Votre Compte ?")) {
        // Si l'utilisateur confirme, soumettre le formulaire
        document.getElementById('deleteForm' + compteId).submit();
    }
}