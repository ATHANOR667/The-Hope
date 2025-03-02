    <div class="col-md-6 mb-4">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header text-white" style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
                <h5 class="card-title mb-0 text-center py-2">Créer une Nouvelle Cause</h5>
            </div>
            <div class="card-body p-4">
                <form wire:submit.prevent="createCause">
                    @csrf

                    <!-- Titre -->
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            wire:model="causeData.titre"
                            id="causeData.titre"
                            placeholder="Titre de la cause"
                            class="form-control @error('causeData.titre') is-invalid @enderror">
                        <label for="causeData.titre">Titre de la Cause</label>
                        @error('causeData.titre')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="form-floating mb-3">
                    <textarea
                        wire:model="causeData.description"
                        id="causeData.description"
                        placeholder="Description de la cause"
                        rows="3"
                        class="form-control @error('causeData.description') is-invalid @enderror"></textarea>
                        <label for="causeData.description">Description</label>
                        @error('causeData.description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Montant -->
                    <div class="form-floating mb-3">
                        <input
                            type="number"
                            wire:model="causeData.montant"
                            id="causeData.montant"
                            placeholder="Montant nécessaire"
                            class="form-control @error('causeData.montant') is-invalid @enderror">
                        <label for="causeData.montant">Montant (XAF)</label>
                        @error('causeData.montant')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Effectif -->
                    {{--<div class="form-floating mb-3">
                        <input
                            type="number"
                            wire:model="causeData.effectif"
                            id="causeData.effectif"
                            placeholder="Effectif cible"
                            class="form-control @error('causeData.effectif') is-invalid @enderror">
                        <label for="causeData.effectif">Effectif Cible</label>
                        @error('causeData.effectif')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>--}}

                    <!-- Date de clôture des contributions -->
                    <div class="form-floating mb-3">
                        <input
                            type="date"
                            wire:model="causeData.dateClotureContribution"
                            id="causeData.dateClotureContribution"
                            class="form-control @error('causeData.dateClotureContribution') is-invalid @enderror">
                        <label for="causeData.dateClotureContribution">Date de Clôture</label>
                        @error('causeData.dateClotureContribution')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Date de réalisation -->
                    <div class="form-floating mb-4">
                        <input
                            type="date"
                            wire:model="causeData.dateRealisation"
                            id="causeData.dateRealisation"
                            class="form-control @error('causeData.dateRealisation') is-invalid @enderror">
                        <label for="causeData.dateRealisation">Date de Réalisation</label>
                        @error('causeData.dateRealisation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #6a11cb, #2575fc); border: none;">
                            <span wire:loading.remove>Créer Cause</span>
                            <span wire:loading>Création en cours...</span>
                        </button>
                    </div>
                </form>

                <!-- Messages de feedback -->
                @if (session()->has('success'))
                    <div class="alert alert-success mt-4" role="alert">
                        <strong>Succès :</strong> {{ session('success') }}
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger mt-4" role="alert">
                        <strong>Erreur :</strong> {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
