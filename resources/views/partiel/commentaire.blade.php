<head>
    <title>Commentaires Hôtels</title>
</head>

<body>
    <div class="container">
        <!-- En-tête des commentaires -->
        <div class="comments-header">
            <h1>Commentaires des clients</h1>
            <button class="add-comment-btn" onclick="openModal()">
                <i class="fas fa-plus"></i>
                Ajouter un commentaire
            </button>
        </div>

        <!-- Liste des commentaires -->
        <div class="comments-grid">
            @if ($commentaires->isEmpty())
                <h2>Aucun Commentaire Trouvé !</h2>
            @else
                @foreach ($commentaires as $commentaire)
                    <div class="comment-card">
                        <div class="user-info">
                            <div class="user-avatar">
                                {{ strtoupper(substr($commentaire->user_name, 0, 1)) }}
                            </div>
                            <div class="user-details">
                                <h3>{{ $commentaire->user_name }}</h3>
                                <span class="comment-date">{{ $commentaire->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <p class="comment-content">{{ $commentaire->content }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- Modal pour ajouter un commentaire -->
    <div class="modal" id="addCommentModal" style="display: none;">
        <div class="modal-content">
            <h2>Ajouter un commentaire</h2>
            <form action="{{ route('commentaire.store') }}" method="POST">
                @csrf
                @if (!empty($hotelData['name']))
                    <input type="hidden" name="nom_hotel" value="{{ $hotelData['name'] }}">
                @endif
                <div class="form-group">
                    <label for="user_name">Nom :</label>
                    <input type="text" id="user_name" name="user_name" required>
                </div>
                <div class="form-group">
                    <label for="content">Commentaire :</label>
                    <textarea id="content" name="content" rows="4" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Envoyer</button>
                <button type="button" class="close-btn" onclick="closeModal()">Annuler</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('frontend/js/details.js') }}"></script>
</body>

</html>
