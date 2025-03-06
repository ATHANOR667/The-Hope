<div style="margin-top: auto" class="container my-5">
    {{-- Titre principal --}}
    <h2 class="text-center mb-4 fw-bold">Votre aide financière ne saurait être négligeable</h2>

    @if(!$causes)
        {{-- Formulaire général pour un don sans cause spécifique --}}
            {{-- Notifications --}}
            @if(session('success_'))
                <div class="alert alert-success">
                    {{ session('success_') }}
                </div>
            @endif

            @if(session('error_'))
                <div class="alert alert-warning">
                    {{ session('error_') }}
                </div>
            @endif

            <form class="custom-form" role="form" method="post" action="{{ route('guest.donate') }}">
                @csrf
                <div style="max-width: 80%; margin-left: 10%" class="row">
                    {{-- Email Field --}}
                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                        <label class="mb-2" for="email" class="form-label">Adresse Email</label>
                        <input type="email" name="email" id="email" class="form-control"  required>
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Montant Field --}}
                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                        <label class="mb-2" for="montant" class="form-label">Montant du Don</label>
                        <input type="number" class="form-control" id="montant" name="montant" min="1" step="0.01" required>
                        @error('montant')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control"  required>
                        @error('nom')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control"  required>
                        @error('prenom')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <button type="submit" id="button" class="btn btn-success w-100 py-3 rounded-pill shadow-sm transition-all">
                        <span id="button">Contribuer</span>
                        <span id="button_spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                    </button>
                </div>
            </form>
        </div>
    @else
        {{-- Liste des causes avec formulaire pour chaque cause --}}
        <div class="row g-4">
            @foreach($causes as $cause)
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 col-12 mx-auto">
                            {{-- Informations sur la cause --}}
                            <div class="card shadow-sm p-4 mb-5">
                                <h4 class="text-center text-success mb-4">{{ $cause->titre }}</h4>
                                <p class="text-center text-muted mb-4">{{ $cause->description }}</p>
                                <ul class="list-unstyled text-center">
                                    <li><strong>Date de réalisation :</strong> {{ $cause->dateRealisation }}</li>
                                    <li><strong>Clôture des contributions :</strong> {{ $cause->dateClotureContribution }}</li>
                                </ul>
                            </div>

                            {{-- Objectif et Montant Reçu (Position de la jauge de progression) --}}
                            <div class="mb-5">
                                <ul class="list-unstyled text-center">
                                    <li><strong>Objectif : </strong>{{ number_format($cause->montant, 2, ',', ' ') }} FCFA</li>
                                    <li><strong>Montant déjà perçu : </strong>{{ number_format($cause->dons()->sum('montant'), 2, ',', ' ') }} FCFA</li>
                                </ul>

                                {{-- Progress Bar (Jauge horizontale) --}}
                                <div class="progress mb-4" style="height: 25px; border-radius: 20px;">
                                    @php
                                        $progress = ($cause->dons()->sum('montant') / $cause->montant) * 100;
                                    @endphp
                                    <div class="progress-bar {{ $progress >= 100 ? 'bg-success' : 'bg-warning' }}" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                        <span class="text-white">{{ round($progress, 1) }}%</span>
                                    </div>
                                </div>
                            </div>


                            {{-- Formulaire --}}
                            <form class="custom-form" role="form" method="post" action="{{ route('guest.donate') }}">
                                @csrf
                                <input type="hidden" name="cause_id" value="{{ $cause->id }}">
                                <div class="row">
                                    {{-- Email Field --}}
                                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                                        <label class="mb-2" for="email_{{ $cause->id }}" class="form-label">Adresse Email</label>
                                        <input type="email" name="email" id="email_{{ $cause->id }}" class="form-control" placeholder="myadress@email.com" required>
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Montant Field --}}
                                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                                        <label class="mb-2" for="montant_{{ $cause->id }}" class="form-label">Montant du Don</label>
                                        <input type="number" class="form-control" id="montant_{{ $cause->id }}" name="montant" placeholder="Entrez le montant" min="1" step="0.01" required>
                                        @error('montant')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                                        <label for="nom" class="form-label">Nom</label>
                                        <input type="text" name="nom" id="nom_{{ $cause->id }}" class="form-control" placeholder="John" required>
                                        @error('nom')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                                        <label for="prenom_{{ $cause->id }}" class="form-label">Prénom</label>
                                        <input type="text" name="prenom" id="prenom_{{ $cause->id }}" class="form-control" placeholder="John" required>
                                        @error('prenom')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <button type="submit" id="button_{{ $cause->id }}" class="btn btn-success w-100 py-3 rounded-pill shadow-sm transition-all">
                                        <span id="button_{{ $cause->id }}_text">Contribuer</span>
                                        <span id="button_{{ $cause->id }}_spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function (e) {
            const button = form.querySelector('button[type="submit"]');
            if (button) {
                // Récupérer les éléments texte et spinner du bouton
                const buttonText = button.querySelector('span:first-child');
                const buttonSpinner = button.querySelector('span:last-child');

                // Masquer le texte et afficher le spinner
                buttonText.style.display = 'none';
                buttonSpinner.classList.remove('d-none');

                // Désactiver le bouton pour éviter les multiples clics
                button.disabled = true;

                // Réactiver le bouton et réafficher le texte une fois la soumission terminée
                form.addEventListener('ajax:complete', function () {
                    buttonText.style.display = 'inline';
                    buttonSpinner.classList.add('d-none');
                    button.disabled = false;
                });
            }
        });
    });
</script>
