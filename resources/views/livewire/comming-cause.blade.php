<div class="col-md-6 mb-4">
    <div class="card border-0 shadow-lg rounded-4" style="min-height: 600px; background-color: #f9f9f9;">
        <div class="card-body">
            @if(!$cause)
                <!-- Alerte si aucune cause à venir -->
                <div class="alert alert-secondary text-center p-4" role="alert" style="font-size: 1.5rem; font-weight: bold; background-color: #e0e0e0; color: #333;">
                    <i class="bi bi-exclamation-triangle-fill me-2" style="font-size: 2rem;"></i>
                    <span>Aucune cause à venir. Veuillez consulter d'autres causes ou attendre de nouvelles mises à jour.</span>
                </div>
            @else
                <!-- Informations principales de la cause -->
                <div class="mb-4">
                    <h2 class="text-primary fw-bold">{{ $cause->titre }}</h2>
                    <p class="text-muted mb-2"><strong>Description :</strong></p>
                    <p class="lead" style="color: #555;">{{ $cause->description }}</p>

                    <!-- Date limite pour la cause -->
                    @if($cause->dateClotureContribution == now()->format('Y-m-d'))
                        <p class="lead" style="color: green;">
                            <strong>La date limite de contribution est aujourd'hui !</strong>
                        </p>
                    @else
                            <?php
                            // Calcul du nombre de jours restants
                            $dateLimite = \Carbon\Carbon::parse($cause->dateClotureContribution);
                            $joursRestants = $dateLimite->diffInDays(\Carbon\Carbon::now());
                            $difference = $dateLimite->diff(Carbon\Carbon::now());

                            $tempsRestant = sprintf(
                                '%d jours, %d heures, %d minutes,',
                                $difference->d,
                                $difference->h,
                                $difference->i,
                                $difference->s
                            );
                            ?>
                        <p class="lead" style="color: #666;">
                            <strong>Date Limite de Contribution :</strong>
                            {{ $dateLimite->format('d M Y') }}
                        </p>
                        <p class="lead" style="color: #666;">
                            <strong>{{ $tempsRestant }}</strong>
                        </p>
                    @endif
                </div>

                <!-- Liste des Donateurs -->
                <div class="mb-4">
                    <h4 class="text-muted">Liste des Donateurs</h4>
                    @if(count($donateurs) > 0)
                        <div class="table-responsive" style="max-height: calc(4 * 2rem); overflow-y: auto;">
                            <table class="table table-hover table-bordered align-middle mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Montant</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($donateurs as $donateur)
                                    <tr>
                                        <td>{{ $donateur->nom }}</td>
                                        <td>{{ $donateur->prenom }}</td>
                                        <td>{{ $donateur->email }}</td>
                                        <td><strong>{{ number_format($donateur->montant, 2, ',', ' ') }} XAF</strong></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <!-- Message si aucun donateur -->
                        <div class="alert alert-info text-center" role="alert">
                            <i class="bi bi-info-circle me-2"></i>
                            Aucun donateur enregistré pour cette cause pour le moment.
                        </div>
                    @endif
                </div>

                <!-- Graphique du Taux de Dons -->
                <div class="mb-4">
                    <h4 class="text-muted text-center">Taux de Dons</h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div style="width: 100%; height: 40px; background-color: #e0e0e0; border-radius: 25px; position: relative; overflow: hidden;">
                            @if($expectedAmount > 0)
                                <!-- Barre de progression horizontale -->
                                <div style="position: absolute; top: 0; left: 0; height: 100%; background-color: #5cb85c; width: {{ ($totalDonations / $expectedAmount) * 100 }}%; border-radius: 25px 0 0 25px; transition: width 1s;"></div>
                                <div style="position: absolute; top: 0; left: {{ ($totalDonations / $expectedAmount) * 100 }}%; height: 100%; background-color: #d9534f; width: {{ (1 - ($totalDonations / $expectedAmount)) * 100 }}%; border-radius: 0 25px 25px 0;"></div>
                                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #666; font-weight: bold;">
                                    {{ number_format($totalDonations, 2, ',', ' ') }} XAF
                                </div>
                            @else
                                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #333; font-weight: bold;">
                                    Objectif non défini
                                </div>
                            @endif
                        </div>
                    </div>
                    <p class="text-center text-muted">
                        <strong>{{ number_format($totalDonations, 2, ',', ' ') }} XAF</strong> ont été reçus.
                    </p>
                    @if($expectedAmount > 0)
                        <p class="text-center text-muted">
                            L'objectif est de <strong>{{ number_format($expectedAmount, 2, ',', ' ') }} XAF</strong>, soit <strong>{{ round(($totalDonations / $expectedAmount) * 100, 2) }}%</strong> de l'objectif atteint.
                        </p>
                    @else
                        <p class="text-center text-muted">
                            Aucun objectif défini pour cette cause.
                        </p>
                    @endif
                </div>

            @endif
        </div>
    </div>
</div>
