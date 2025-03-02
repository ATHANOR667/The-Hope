<div class="col-md-6 mb-4">
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-body">

            <div class="mb-4">
                <h2 class="text-primary fw-bold">{{ $cause->titre }}</h2>
                <p class="text-muted mb-2"><strong>Description :</strong></p>
                <p class="lead">{{ $cause->description }}</p>
            </div>

            <!-- Dates de la cause et calcul des jours restants -->
            <div class="mb-4">
                <h4 class="text-info">Dates importantes</h4>
                <p><strong>Date de clôture des contributions :</strong> {{ \Carbon\Carbon::parse($cause->dateClotureContribution)->format('d M Y') }}</p>
                <p><strong>Date de réalisation de la cause :</strong> {{ \Carbon\Carbon::parse($cause->dateRealisation)->format('d M Y') }}</p>

                <!-- Calcul du nombre de jours restants -->
                <p class="text-muted">
                    @php
                        $dateCloture = \Carbon\Carbon::parse($cause->dateClotureContribution);
                        $dateRealisation = \Carbon\Carbon::parse($cause->dateRealisation);
                        $now = \Carbon\Carbon::now();
                        $joursRestantsCloture = $now->diffInDays($dateCloture, false)+1;
                        $joursRestantsRealisation = $now->diffInDays($dateRealisation, false)+1;
                    @endphp

                        <!-- Affichage des jours restants pour la clôture -->
                    <strong>Jours restants avant la clôture des contributions : </strong>
                    @if ($joursRestantsCloture > 0)
                        <span class="text-success">{{ $joursRestantsCloture }} jour(s)</span>
                    @elseif ($joursRestantsCloture == 0)
                        <span class="text-warning">Clôture aujourd'hui</span>
                    @else
                        <span class="text-danger">Clôture déjà atteinte</span>
                    @endif
                </p>

                <p class="text-muted">
                    <strong>Jours restants avant la réalisation : </strong>
                    @if ($joursRestantsRealisation > 0)
                        <span class="text-success">{{ $joursRestantsRealisation }} jour(s)</span>
                    @elseif ($joursRestantsRealisation == 0)
                        <span class="text-warning">Réalisation aujourd'hui</span>
                    @else
                        <span class="text-danger">Date de réalisation déjà passée</span>
                    @endif
                </p>
            </div>

            <!-- Graphique du Taux de Dons -->
            <div class="mb-4">
                <h4 class="text-info text-center">Taux de Dons</h4>
                <div class="d-flex justify-content-center mb-4">
                    <div style="width: 100%; height: 40px; background-color: #e0e0e0; border-radius: 25px; position: relative; overflow: hidden;">
                        @if($expectedAmount > 0)
                            <div style="position: absolute; top: 0; left: 0; height: 100%; background-color: rgba(24,103,38,0.71); width: {{ ($totalDonations / $expectedAmount) * 100 }}%; border-radius: 25px 0 0 25px; transition: width 1s;"></div>
                            <div style="position: absolute; top: 0; left: {{ ($totalDonations / $expectedAmount) * 100 }}%; height: 100%; background-color: rgba(174,71,81,0.71); width: {{ (1 - ($totalDonations / $expectedAmount)) * 100 }}%; border-radius: 0 25px 25px 0;"></div>
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: rgba(174,174,174,0.9); font-weight: bold;">
                                {{ number_format($totalDonations, 2, ',', ' ') }} XAF
                            </div>
                        @else
                            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: black; font-weight: bold;">
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

        </div>
    </div>
</div>
