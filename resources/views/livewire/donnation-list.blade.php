{{-- Close your eyes. Count to one. That is how long forever feels. --}}
<div class="container mt-5">
    <!-- Message de confirmation -->
    @if (session()->has('success'))
        <div class="alert alert-success text-center shadow-sm mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive shadow-lg rounded-3 bg-white p-3">
        <!-- Barre de recherche -->
        <div class="form-floating mb-4">
            <input
                type="text"
                wire:model.live="search"
                id="search"
                placeholder="Rechercher un donateur par {{$sortField}}"
                class="form-control @error('search') is-invalid @enderror">
            <label for="search">Rechercher un donateur par {{$sortField}}</label>
            @error('search')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tableau des donateurs -->
        <table class="table table-striped table-hover table-bordered shadow-sm">
            <thead class="table-dark">
            <tr>
                <th class="text-center">
                    <button wire:click="sortBy('reference')" class="btn btn-link text-white p-0">
                        Référence
                        @if ($sortField === 'reference')
                            <span>{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                        @endif
                    </button>
                </th>
                <th class="text-center">
                    <button wire:click="sortBy('nom')" class="btn btn-link text-white p-0">
                        Nom
                        @if ($sortField === 'nom')
                            <span>{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                        @endif
                    </button>
                </th>
                <th class="text-center">
                    <button wire:click="sortBy('prenom')" class="btn btn-link text-white p-0">
                        Prénom
                        @if ($sortField === 'prenom')
                            <span>{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                        @endif
                    </button>
                </th>
                <th class="text-center">
                    <button wire:click="sortBy('email')" class="btn btn-link text-white p-0">
                        Email
                        @if ($sortField === 'email')
                            <span>{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                        @endif
                    </button>
                </th>
                <th class="text-center">
                    <button wire:click="sortBy('montant')" class="btn btn-link text-white p-0">
                        Montant
                        @if ($sortField === 'montant')
                            <span>{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                        @endif
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($donateurs as $donateur)
                <tr>
                    <td>{{ $donateur->reference }}</td>
                    <td>{{ $donateur->nom }}</td>
                    <td>{{ $donateur->prenom }}</td>
                    <td>{{ $donateur->email }}</td>
                    <td><strong>{{ number_format($donateur->montant, 2, ',', ' ') }} XAF</strong></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            <ul class="pagination pagination-sm">
                <li class="page-item {{ $donateurs->onFirstPage() ? 'disabled' : '' }}">
                    <button class="page-link" wire:click="previousPage" aria-label="Previous">
                        <i class="bi bi-arrow-left"></i> Précédent
                    </button>
                </li>

                @foreach ($donateurs->getUrlRange(1, $donateurs->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $donateurs->currentPage() ? 'active' : '' }}">
                        <button class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                    </li>
                @endforeach

                <li class="page-item {{ $donateurs->hasMorePages() ? '' : 'disabled' }}">
                    <button class="page-link" wire:click="nextPage" aria-label="Next">
                        <i class="bi bi-arrow-right"></i> Suivant
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>
