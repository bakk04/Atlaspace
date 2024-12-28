// Initialize Stripe
const stripe = Stripe('pk_test_51QKmmSGlWzfG5jG4svUhOWGtp1o2TggjW9ib90MOmMiFnaSj8ePaxuB02zAm50sfXGdO99MBKTS4f9lLsAzExc6q00MgFUAEFc'); // Replace with actual key in production

// DOM Elements
document.addEventListener('DOMContentLoaded', function () {
    // Scroll Animation
    const scrollRevealElements = document.querySelectorAll('.scroll-reveal');
    const reserveButtons = document.querySelectorAll('.reserve-button');
    const modal = document.querySelector('.modal');
    const closeModal = document.querySelector('.close-modal');
    
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const scrollObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                scrollObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    scrollRevealElements.forEach(element => {
        scrollObserver.observe(element);
    });

    // Modal Handling
    function openModal() {
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
        
        // Add animation classes to modal elements
        const modalContent = modal.querySelector('.modal-content');
        modalContent.style.animation = 'modalSlideIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards';
    }

    function closeModalHandler() {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }

    // Event Listeners
    reserveButtons.forEach(button => {
        button.addEventListener('click', openModal);
    });

    if (closeModal) {
        closeModal.addEventListener('click', closeModalHandler);
    }

    // Close modal when clicking outside
    modal?.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModalHandler();
        }
    });

    // Escape key to close modal
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal?.classList.contains('active')) {
            closeModalHandler();
        }
    });

    // Form Handling
    const reservationForm = document.getElementById('reservationForm');
    if (reservationForm) {
        reservationForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const submitButton = reservationForm.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.textContent = 'Traitement en cours...';

            try {
                // Get form data
                const formData = new FormData(reservationForm);
                const data = Object.fromEntries(formData.entries());

                // Send reservation request
                const response = await fetch('/api/create-reservation', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();

                if (response.ok) {
                    // Handle successful reservation
                    const { clientSecret } = result;
                    
                    // Handle payment with Stripe
                    const { error } = await stripe.confirmPayment({
                        elements: result.elements,
                        clientSecret,
                        confirmParams: {
                            return_url: `${window.location.origin}/reservation-confirmation`,
                        },
                    });

                    if (error) {
                        throw new Error(error.message);
                    }
                } else {
                    throw new Error(result.message || 'Une erreur est survenue');
                }

            } catch (error) {
                console.error('Reservation error:', error);
                // Show error message to user
                const errorDiv = document.createElement('div');
                errorDiv.className = 'error-message bg-red-100 text-red-700 p-3 rounded mt-3';
                errorDiv.textContent = error.message || 'Une erreur est survenue lors de la réservation';
                reservationForm.appendChild(errorDiv);
            } finally {
                submitButton.disabled = false;
                submitButton.textContent = 'Réserver';
            }
        });
    }

    // Input animations
    const formInputs = document.querySelectorAll('.form-input');
    formInputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('focused');
        });

        input.addEventListener('blur', () => {
            if (!input.value) {
                input.parentElement.classList.remove('focused');
            }
        });

        // Initialize with value
        if (input.value) {
            input.parentElement.classList.add('focused');
        }
    });

    // Initialize Aerial View functionality
    const PARAMETER_VALUE = '1600 Amphitheatre Parkway, Mountain View, CA 94043'; // Example address
    const API_KEY = 'AIzaSyCu720l6X2Bp1FeXQ1a9v6t97EgS61mAww'; // Replace with your actual API key

    async function initAerialView() {
        const displayEl = document.getElementById('aerial-video');
        const container = document.getElementById('aerial-view-container');
        const btn = document.getElementById('seeMoreBtn');
        
        // Lorsque l'utilisateur clique sur "Voir plus"
        btn.addEventListener('click', async () => {
            container.classList.remove('hidden'); // Afficher le conteneur de la vidéo
            
            const parameterKey = videoIdOrAddress(PARAMETER_VALUE);
            const urlParameter = new URLSearchParams();
            urlParameter.set(parameterKey, PARAMETER_VALUE);
            urlParameter.set('key', API_KEY);
            const response = await fetch(`https://aerialview.googleapis.com/v1/videos:lookupVideo?${urlParameter.toString()}`);
            const videoResult = await response.json();

            if (videoResult.state === 'PROCESSING') {
                alert('Vidéo en cours de traitement...');
            } else if (videoResult.error && videoResult.error.code === 404) {
                alert('Vidéo non trouvée.');
            } else {
                displayEl.src = videoResult.uris.MP4_MEDIUM.landscapeUri;
            }
        });
    }

    function videoIdOrAddress(value) {
        const videoIdRegex = /[0-9a-zA-Z-_]{22}/;
        return value.match(videoIdRegex) ? 'videoId' : 'address';
    }

    initAerialView();
});

// Wave Animation
function createWaveAnimation() {
    const wave = document.querySelector('.wave');
    if (wave) {
        wave.style.animation = 'wave 10s linear infinite';
    }
}

// Initialize all animations
function initializeAnimations() {
    createWaveAnimation();
    
    // Add any future animation initializations here
}

// Call initialization functions
initializeAnimations();
document.addEventListener('DOMContentLoaded', function () {
    // Sélectionner tous les boutons "Voir plus"
    const seeMoreButtons = document.querySelectorAll('.see-more-btn');
    
    // Ajouter un écouteur d'événements pour chaque bouton
    seeMoreButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Récupérer l'adresse depuis l'attribut data-address
            const address = button.getAttribute('data-address');
            
            // Ouvrir Google Maps dans un nouvel onglet avec l'adresse spécifiée
            const googleMapsUrl = `https://www.google.com/maps?q=${encodeURIComponent(address)}`;
            window.open(googleMapsUrl, '_blank');
        });
    });
});

