<!-- Script de configuration Stripe -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const stripe = Stripe('{{ config('services.stripe.key') }}'); // Clé publique Stripe
        const elements = stripe.elements();
        const card = elements.create('card'); // Création du champ de carte
        card.mount('#card-element'); // Montage du champ dans le conteneur

        // Gestion des erreurs Stripe
        card.on('change', (event) => {
            const errorDiv = document.getElementById('card-errors');
            errorDiv.textContent = event.error ? event.error.message : '';
        });

        // Bouton de paiement Stripe
        const stripeButton = document.getElementById('stripe-payment-button');
        const amount = stripeButton.getAttribute('data-amount'); // Montant en centimes

        stripeButton.addEventListener('click', async () => {
            try {
                const response = await fetch('{{ route('payment.intent') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                            .getAttribute('content'),
                    },
                    body: JSON.stringify({
                        amount
                    }), // Montant à envoyer au serveur
                });

                const {
                    clientSecret
                } = await response.json();

                const {
                    error
                } = await stripe.confirmCardPayment(clientSecret, {
                    payment_method: {
                        card: card,
                    },
                });

                if (error) {
                    alert('Erreur lors du paiement : ' + error.message);
                } else {
                    alert('Paiement réussi !');
                    location.reload();
                }
            } catch (err) {
                alert('Erreur lors du paiement : ' + err.message);
            }
        });
    });
</script>
