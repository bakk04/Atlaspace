<!-- Modal de réservation -->
<div class="modal">
    <div class="modal-content">
        <button class="close-modal">&times;</button>
        <h2 class="text-2xl font-bold text-primary mb-6">Réservation</h2>

        <form action="{{ route('activite.reserve') }}" method="POST" id="reservation-form">
            @csrf
            @if (!empty($Ville->name) && !empty($activite->name) && !empty($activite->prix))
                <input type="hidden" name="ville" value="{{ $Ville->name }}">
                <input type="hidden" name="nom_activite" value="{{ $activite->name }}">
                <input type="hidden" name="prix" id="prix" value="{{ $activite->prix }}">
            @endif

            <div class="form-group">
                <label class="form-label">Nom complet</label>
                <input type="text" name="name" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Téléphone</label>
                <input type="tel" name="phone" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Date d'arrivée</label>
                <input type="date" name="arrival_date" class="form-input" min="{{ now()->toDateString() }}" required>
            </div>

            <button type="submit" class="stripe-button">
                Confirmer la réservation
            </button>
        </form>

        <!-- Section Stripe -->
        <h3 class="text-lg font-semibold mt-6">Payer avec Stripe</h3>
        <div id="card-element" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;"></div>
        <div id="card-errors" style="color: red; margin-top: 10px;"></div>
        <button type="button" id="stripe-payment-button" class="stripe-button"
            data-amount="{{ $activite->prix * 100 }}">
            Payer avec Stripe
        </button>
    </div>
</div>
@include('partiel.stripe')
