document.addEventListener('DOMContentLoaded', function() {
    // Configuration globale
    const config = {
        animationDelay: 0.1,
        modalDisplayStyle: 'block',
        activeClass: 'active'
    };

    // Gestion du modal de réservation
    function initializeReservationModal() {
        const reservationModal = document.getElementById('reservationModal');
        const reserveBtns = document.querySelectorAll('.reserve-button');
        const closeBtn = document.querySelector('.close-modal');

        if (!reservationModal || !reserveBtns.length || !closeBtn) return;

        const toggleModal = (show) => {
            reservationModal.style.display = show ? config.modalDisplayStyle : 'none';
            if (show) {
                reservationModal.classList.add(config.activeClass);
            } else {
                reservationModal.classList.remove(config.activeClass);
            }
        };

        // Événements du modal de réservation
        reserveBtns.forEach(btn => {
            btn.addEventListener('click', () => toggleModal(true));
        });

        closeBtn.addEventListener('click', () => toggleModal(false));

        reservationModal.addEventListener('click', (e) => {
            if (e.target === reservationModal) toggleModal(false);
        });

        // Validation de la date d'arrivée
        const arrivalDateInput = document.querySelector('input[name="arrival_date"]');
        if (arrivalDateInput) {
            const today = new Date().toISOString().split('T')[0];
            arrivalDateInput.setAttribute('min', today);
        }
    }

    // Gestion du modal des commentaires
    function initializeCommentModal() {
        const commentModal = document.getElementById('addCommentModal');
        const addCommentBtn = document.querySelector('.add-comment-btn');
        const closeCommentBtn = document.querySelector('.close-btn');

        if (!commentModal) return;

        window.openModal = function() {
            commentModal.style.display = config.modalDisplayStyle;
        };

        window.closeModal = function() {
            commentModal.style.display = 'none';
        };

        if (closeCommentBtn) {
            closeCommentBtn.addEventListener('click', window.closeModal);
        }

        window.addEventListener('click', (event) => {
            if (event.target === commentModal) {
                window.closeModal();
            }
        });
    }

    // Gestion des animations
    function initializeAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    
                    // Animation spécifique pour les cartes de commentaires
                    if (entry.target.classList.contains('comment-card')) {
                        const index = Array.from(entry.target.parentNode.children).indexOf(entry.target);
                        entry.target.style.animationDelay = `${index * config.animationDelay}s`;
                        entry.target.style.opacity = '1';
                    }
                }
            });
        }, observerOptions);

        // Observer les éléments animés
        document.querySelectorAll('.animate-in, .comment-card, .detail-card').forEach((element) => {
            observer.observe(element);
        });
    }

    // Gestion du paiement Stripe
    function initializeStripePayment() {
        const stripeButton = document.getElementById('stripe-payment-button');
        const cardElement = document.getElementById('card-element');
        
        if (!stripeButton || !cardElement || !stripe) return;

        const elements = stripe.elements();
        const card = elements.create('card');
        card.mount('#card-element');

        stripeButton.addEventListener('click', async function(e) {
            e.preventDefault();
            const amount = this.dataset.amount;

            try {
                const response = await fetch('/create-payment-intent', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ amount })
                });

                const data = await response.json();

                if (!data.clientSecret) {
                    throw new Error('Erreur lors de la création du paiement');
                }

                const result = await stripe.confirmCardPayment(data.clientSecret, {
                    payment_method: { card }
                });

                if (result.error) {
                    document.getElementById('card-errors').textContent = result.error.message;
                } else if (result.paymentIntent.status === 'succeeded') {
                    alert('Paiement réussi !');
                    document.querySelector('form').submit();
                }
            } catch (error) {
                console.error('Erreur:', error);
                document.getElementById('card-errors').textContent = error.message;
            }
        });
    }

    // Initialisation de toutes les fonctionnalités
    initializeReservationModal();
    initializeCommentModal();
    initializeAnimations();
    initializeStripePayment();
});

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