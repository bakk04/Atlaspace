document.addEventListener('DOMContentLoaded', function() {
    const stripe = Stripe(stripeKey);  // Utilisation de la clé Stripe injectée
    const stripeButton = document.getElementById('stripe-payment-button');
    const amount = stripeButton.getAttribute('data-amount');

    stripeButton.addEventListener('click', async () => {
        try {
            // Utilisation de la variable contenant l'URL de la route
            const response = await fetch(paymentIntentUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({ amount }),
            });

            const { clientSecret } = await response.json();

            const elements = stripe.elements();
            const card = elements.create('card');
            card.mount('#payment-element');

            const { error } = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: card,
                },
            });

            if (error) {
                alert(error.message);
            } else {
                alert('Paiement réussi !');
                location.reload();
            }
        } catch (err) {
            alert('Erreur lors du paiement : ' + err.message);
        }
    });
});
