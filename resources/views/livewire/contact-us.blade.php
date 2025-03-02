<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 col-12 mx-auto">
            <h2 class="text-center mb-4 fw-bold">Soumettez-nous vos idées et propositions de partenariat</h2>

            {{-- Affichage des alertes de succès ou d'erreur --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Formulaire Livewire --}}
            <form class="custom-form" role="form" wire:submit.prevent="sendMessage">
                @csrf
                <div class="row">
                    {{-- Champ Nom --}}
                    <div class="col-lg-4 col-md-6 col-12 my-2">
                        <label class="mb-2" for="name">Nom Complet</label>
                        <input type="text" wire:model="name" id="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Champ Email --}}
                    <div class="col-lg-4 col-md-6 col-12 my-2">
                        <label class="mb-2" for="email">Adresse Email</label>
                        <input type="email" wire:model="email" id="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Champ Sujet --}}
                    <div class="col-lg-4 col-md-6 col-12 my-2">
                        <label class="mb-2" for="subject">Comment avez-vous entendu parler de nous?</label>
                        <select class="form-select form-control" wire:model="subject" id="subject" required>
                            <option >Choisissez une option</option>
                            <option value="web+search" {{ old('subject') == 'web+search' ? 'selected' : '' }}>En recherchant sur internet</option>
                            <option value="social+media" {{ old('subject') == 'social+media' ? 'selected' : '' }}>Réseaux sociaux</option>
                            <option value="others" {{ old('subject') == 'others' ? 'selected' : '' }}>Autres</option>
                        </select>
                        @error('subject')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Champ Message --}}
                    <div class="col-12 my-2">
                        <label class="mb-2" for="message">Dites-nous en plus à propos de votre projet</label>
                        <textarea class="form-control" rows="5" id="message" wire:model="message" required>{{ old('message') }}</textarea>
                        @error('message')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <button wire:loading.remove type="submit" class="form-control mt-4 btn btn-primary" id="submit">Soumettre</button>
                        {{-- Bouton de chargement --}}
                        <div wire:loading wire:target="sendMessage" class="text-center mt-4">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Envoi en cours...
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
