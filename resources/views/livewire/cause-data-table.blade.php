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
                placeholder="Rechercher une cause"
                class="form-control @error('search') is-invalid @enderror">
            <label for="search">Titre de la cause à rechercher</label>
            @error('search')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tableau des causes -->
        <table class="table table-striped table-hover table-bordered shadow-sm">
            <thead class="table-dark">
            <tr>
                @foreach (['titre', 'description', 'montant', 'effectif', 'dateClotureContribution', 'dateRealisation'] as $field)
                    <th class="text-center">
                        <button wire:click="sortBy('{{ $field }}')" class="btn btn-link text-white p-0">
                            {{ ucfirst(str_replace('_', ' ', $field)) }}
                            @if ($sortField === $field)
                                <span>{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                            @endif
                        </button>
                    </th>
                @endforeach
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($causes as $cause)
                @if ($editingCauseId === $cause->id)
                    <tr>
                        <!-- Mode édition -->
                        @foreach (['titre', 'description', 'montant', 'effectif', 'dateClotureContribution', 'dateRealisation'] as $field)
                            <td>
                                @if (in_array($field, ['dateClotureContribution', 'dateRealisation']))
                                    <input type="date" wire:model.defer="editingData.{{ $field }}" class="form-control">
                                @elseif ($field === 'description')
                                    <textarea wire:model.defer="editingData.{{ $field }}" class="form-control"></textarea>
                                @else
                                    <input type="text" wire:model.defer="editingData.{{ $field }}" class="form-control">
                                @endif
                                @error('editingData.' . $field)
                                <div class="text-danger mt-1 small">{{ $message }}</div>
                                @enderror
                            </td>
                        @endforeach
                        <td class="text-center">
                            <button wire:click="saveEdit" class="btn btn-success btn-sm me-2">
                                <i class="bi bi-check-circle"></i> Enregistrer
                            </button>
                            <button wire:click="cancelEdit" class="btn btn-secondary btn-sm">
                                <i class="bi bi-x-circle"></i> Annuler
                            </button>
                        </td>
                    </tr>
                @elseif($cause->deleted_at != null)
                    <tr class="table-danger">
                        <!-- Mode affichage -->
                        <td>{{ $cause->titre }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($cause->description, 20, '...') }}</td>
                        <td>{{ number_format($cause->montant, 0, ',', ' ') }} XAF</td>
                        <td>{{ $cause->effectif }}</td>
                        <td>{{ $cause->dateClotureContribution }}</td>
                        <td>{{ $cause->dateRealisation }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.causeShow',['cause' => $cause->id]) }}" style="text-decoration: none;">
                                    <button {{-- wire:click="show({{ $cause }})" --}} class="btn btn-info btn-sm me-2" title="Voir les détails de cette cause" aria-label="Voir les détails de cette cause">
                                        <i class="bi bi-eye"></i> Voir
                                    </button>
                                </a>
                                <button wire:click="restore({{ $cause->id }})" class="btn btn-primary btn-sm me-2" title="Modifier cette cause">
                                    <i class="bi bi-arrow-repeat"></i> Restaurer
                                </button>
                            </div>
                        </td>
                    </tr>
                @else
                    <tr>
                        <!-- Mode affichage -->
                        <td>{{ $cause->titre }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($cause->description, 20, '...') }}</td>
                        <td>{{ number_format($cause->montant, 0, ',', ' ') }} XAF</td>
                        <td>{{ $cause->effectif }}</td>
                        <td>{{ $cause->dateClotureContribution }}</td>
                        <td>{{ $cause->dateRealisation }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                @if($cause->id != 1)
                                    <button wire:click="startEdit({{ $cause->id }})" class="btn btn-primary btn-sm me-2" title="Modifier cette cause">
                                        <i class="bi bi-pencil"></i> Modifier
                                    </button>
                                    <button wire:confirm="Cette operation est irréversible" wire:click="confirmDelete({{ $cause->id }})" class="btn btn-danger btn-sm me-2" title="Supprimer cette cause">
                                        <i class="bi bi-trash"></i> Supprimer
                                    </button>
                                @endif

                                <a href="{{ route('admin.causeShow',['cause' => $cause->id]) }}" style="text-decoration: none;">
                                    <button {{-- wire:click="show({{ $cause }})" --}} class="btn btn-info btn-sm me-2" title="Voir les détails de cette cause" aria-label="Voir les détails de cette cause">
                                        <i class="bi bi-eye"></i> Voir
                                    </button>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            <ul class="pagination pagination-sm">
                <li class="page-item {{ $causes->onFirstPage() ? 'disabled' : '' }}">
                    <button class="page-link" wire:click="previousPage" aria-label="Previous">
                        <i class="bi bi-arrow-left"></i> Précédent
                    </button>
                </li>

                @foreach ($causes->getUrlRange(1, $causes->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $causes->currentPage() ? 'active' : '' }}">
                        <button class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button>
                    </li>
                @endforeach

                <li class="page-item {{ $causes->hasMorePages() ? '' : 'disabled' }}">
                    <button class="page-link" wire:click="nextPage" aria-label="Next">
                        <i class="bi bi-arrow-right"></i> Suivant
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>


