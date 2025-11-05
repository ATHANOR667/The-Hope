<div>
    <!-- Conteneur principal avec support Dark Mode -->
    <div class="p-4 md:p-6 bg-gray-50 min-h-screen dark:bg-gray-900 dark:text-gray-100">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-3xl font-bold text-indigo-800 mb-6 dark:text-indigo-400">Administration des Dons</h1>

            <!-- PSP Toggle -->
            <div class="bg-gradient-to-br from-white to-gray-50 p-6 rounded-3xl shadow-xl mb-10 flex flex-col sm:flex-row gap-5 sm:gap-8 items-start sm:items-center justify-between dark:from-gray-850 dark:to-gray-800 dark:shadow-2xl border border-gray-100 dark:border-gray-750 transition-all duration-500 ease-in-out">

                <h3 class="text-xl font-bold text-gray-800 dark:text-gray-100 flex-shrink-0 leading-tight">
                     Gestion des <br class="sm:hidden"> Prestataires de Paiement
                </h3>

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-3 sm:mt-0">

                    <label class="relative flex items-center cursor-pointer group select-none">
                        <input type="checkbox" wire:model.live="stripeEnabled" wire:change="togglePsp('stripe')" class="sr-only peer">
                        <div class="
                w-auto px-5 py-2.5 rounded-full text-base font-semibold
                bg-gray-100 text-gray-600
                dark:bg-gray-700 dark:text-gray-300
                border border-transparent
                shadow-sm
                transition-all duration-300 ease-in-out transform
                group-hover:scale-102 group-hover:shadow-md
                peer-checked:bg-gradient-to-r peer-checked:from-indigo-500 peer-checked:to-purple-600 peer-checked:text-white peer-checked:border-indigo-600
                peer-focus:outline-none peer-focus:ring-3 peer-focus:ring-indigo-300 dark:peer-focus:ring-indigo-700
                flex items-center space-x-2
            ">
                            <span x-data="{stripeEnabled: @entangle('stripeEnabled')}" x-text="stripeEnabled ? '✓ Stripe Activé' : 'Stripe Désactivé'"></span>
                        </div>
                    </label>

                    <label class="relative flex items-center cursor-pointer group select-none">
                        <input type="checkbox" wire:model.live="notchpayEnabled" wire:change="togglePsp('notchpay')" class="sr-only peer">
                        <div class="
                w-auto px-5 py-2.5 rounded-full text-base font-semibold
                bg-gray-100 text-gray-600
                dark:bg-gray-700 dark:text-gray-300
                border border-transparent
                shadow-sm
                transition-all duration-300 ease-in-out transform
                group-hover:scale-102 group-hover:shadow-md
                peer-checked:bg-gradient-to-r peer-checked:from-teal-500 peer-checked:to-emerald-600 peer-checked:text-white peer-checked:border-teal-600
                peer-focus:outline-none peer-focus:ring-3 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-700
                flex items-center space-x-2
            ">
                            <span x-data="{notchpayEnabled: @entangle('notchpayEnabled')}" x-text="notchpayEnabled ? '✓ NotchPay Activé' : 'NotchPay Désactivé'"></span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Filtres -->
            <div class="bg-white p-4 rounded-xl shadow mb-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 dark:bg-gray-800">
                <input type="text" wire:model.debounce.500ms="search" placeholder="Rechercher par email/nom..." class="rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                <select wire:model.live="filterStatus" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Tous les statuts</option>
                    <option value="completed">Complété</option>
                    <option value="pending">En attente</option>
                    <option value="failed">Échoué</option>
                    <option value="refunded">Remboursé</option>
                </select>
                <select wire:model.live="filterPsp" class="rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Tous les PSP</option>
                    <option value="Stripe">Stripe</option>
                    <option value="NotchPay">NotchPay</option>
                </select>
            </div>

            <!-- TABLEAU DES DONS (DESKTOP) -->
            <div class="hidden md:block overflow-x-auto bg-white rounded-xl shadow dark:bg-gray-800">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-indigo-50 dark:bg-indigo-900">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase dark:text-indigo-300">Donateur</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase dark:text-indigo-300">Montant</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase dark:text-indigo-300">PSP</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase dark:text-indigo-300">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase dark:text-indigo-300">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-indigo-700 uppercase dark:text-indigo-300">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach($dons as $don)
                        <tr class="hover:bg-indigo-50 dark:hover:bg-gray-700 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $don->prenom }} {{ $don->nom }}</div>
                                <div class="text-xs text-gray-500 dark:text-gray-400">{{ $don->emailDonateur }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                {{ number_format($don->montant, 2) }} {{ $don->devise }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $don->operateur === 'Stripe' ? 'bg-indigo-100 text-indigo-800 dark:bg-indigo-800 dark:text-indigo-100' : 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100' }}">
                                    {{ $don->operateur }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    @if($don->status === 'completed') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                                    @elseif($don->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                                    @elseif($don->status === 'failed') bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100
                                    @elseif($don->status === 'refunded') bg-purple-100 text-purple-800 dark:bg-purple-800 dark:text-purple-100 @endif">
                                    {{ ucfirst($don->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $don->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @if($don->status === 'completed' && $don->operateur === 'Stripe')
                                    <button wire:click="openRefundModal({{ $don->id }})" class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300 transition duration-150">
                                        Rembourser
                                    </button>
                                @endif
                                @if($don->refunds->count())
                                    <button wire:click="showRefunds({{ $don->id }})" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 ml-2 transition duration-150">
                                        ({{ $don->refunds->count() }})
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Pagination -->
                <div class="p-4 bg-white dark:bg-gray-800 rounded-b-xl">{{ $dons->links() }}</div>
            </div>

            <!-- LISTE DES DONS (MOBILE - Card View) -->
            <div class="md:hidden space-y-4">
                @foreach($dons as $don)
                    <div class="bg-white dark:bg-gray-800 p-4 rounded-xl shadow border border-gray-200 dark:border-gray-700">

                        <div class="flex justify-between items-start mb-3 border-b border-gray-100 dark:border-gray-700 pb-3">
                            <div>
                                <div class="font-bold text-lg dark:text-white">{{ $don->prenom }} {{ $don->nom }}</div>
                                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $don->emailDonateur }}</div>
                            </div>
                            <span class="px-2 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full {{ $don->operateur === 'Stripe' ? 'bg-indigo-100 text-indigo-800 dark:bg-indigo-800 dark:text-indigo-100' : 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100' }}">
                            {{ $don->operateur }}
                        </span>
                        </div>

                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400 font-medium">Montant:</span>
                                <span class="font-semibold text-gray-900 dark:text-white">{{ number_format($don->montant, 2) }} {{ $don->devise }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 dark:text-gray-400 font-medium">Statut:</span>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                @if($don->status === 'completed') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                                @elseif($don->status === 'pending') bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                                @elseif($don->status === 'failed') bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100
                                @elseif($don->status === 'refunded') bg-purple-100 text-purple-800 dark:bg-purple-800 dark:text-purple-100 @endif">
                                {{ ucfirst($don->status) }}
                            </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400 font-medium">Date:</span>
                                <span class="text-gray-900 dark:text-white">{{ $don->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                        </div>

                        <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-700 flex justify-end items-center space-x-3">
                            @if($don->status === 'completed' && $don->operateur === 'Stripe')
                                <button wire:click="openRefundModal({{ $don->id }})" class="text-sm px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow-md transition duration-150">
                                    Rembourser
                                </button>
                            @endif
                            @if($don->refunds->count())
                                <button wire:click="showRefunds({{ $don->id }})" class="text-sm px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow-md transition duration-150">
                                    Remboursements ({{ $don->refunds->count() }})
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
                <!-- Pagination pour mobile -->
                <div class="p-4 bg-white dark:bg-gray-800 rounded-xl shadow">{{ $dons->links() }}</div>
            </div>

            <!-- Modal Remboursement -->
            @if($showRefundModal)
                <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 transition-opacity duration-300 ease-out" x-transition.opacity>
                    <div class="bg-white rounded-xl p-6 max-w-md w-full shadow-2xl dark:bg-gray-800 dark:text-white" x-transition.scale.in>
                        <h3 class="text-2xl font-bold mb-4 text-indigo-800 dark:text-indigo-400">Rembourser le don</h3>
                        <p class="mb-4 text-sm text-gray-600 dark:text-gray-400">Montant maximum remboursable : {{ number_format(Don::find($selectedDon)->montant ?? 0, 2) }} {{ Don::find($selectedDon)->devise ?? 'EUR' }}</p>

                        <input type="number" wire:model="refundAmount" step="0.01" class="w-full rounded-lg border-gray-300 mb-4 dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:border-indigo-500 focus:ring-indigo-500" placeholder="Montant">

                        @error('refundAmount') <p class="text-red-500 text-xs mt-1 mb-3">{{ $message }}</p> @enderror

                        <div class="flex gap-3 mt-4">
                            <button wire:click="refund" class="flex-1 bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg font-semibold transition duration-150">
                                Confirmer le remboursement
                            </button>
                            <button wire:click="closeModal" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 rounded-lg font-semibold transition duration-150 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                                Annuler
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Modal Refunds -->
            @if($showRefunds)
                <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 transition-opacity duration-300 ease-out" x-transition.opacity>
                    <div class="bg-white rounded-xl p-6 max-w-lg w-full max-h-[90vh] overflow-y-auto shadow-2xl dark:bg-gray-800 dark:text-white" x-transition.scale.in>
                        <h3 class="text-2xl font-bold mb-6 text-indigo-800 dark:text-indigo-400">Détails des Remboursements</h3>

                        @forelse($refunds as $refund)
                            <div class="border-b border-gray-200 pb-3 mb-3 dark:border-gray-700">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium text-lg text-gray-900 dark:text-white">{{ number_format($refund->montant, 2) }} {{ $refund->devise }}</span>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $refund->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <div class="text-xs text-gray-600 dark:text-gray-500">
                                    ID Transaction: <span class="font-mono">{{ $refund->refund_id }}</span>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 dark:text-gray-400">Aucun remboursement trouvé pour ce don.</p>
                        @endforelse

                        <button wire:click="closeModal" class="mt-6 w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-lg font-semibold shadow-md transition duration-150">
                            Fermer
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
