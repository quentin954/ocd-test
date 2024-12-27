<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden">
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-3xl font-semibold text-gray-800">{{ $person->first_name }} {{ $person->last_name }}</h2>
                    <p class="text-lg text-gray-600 mt-2"><strong>Créée par :</strong> {{ $person->creator->name ?? 'Inconnu' }}</p>
                    <p class="text-lg text-gray-600"><strong>Date de naissance :</strong> {{ $person->date_of_birth ?? 'Non renseignée' }}</p>
                </div>

                <div class="p-6 bg-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Informations supplémentaires</h3>
                            <p class="text-lg text-gray-600"><strong>Nom de naissance :</strong> {{ $person->birth_name ?? $person->last_name }}</p>
                        </div>

                        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Enfants :</h3>
                            @forelse($person->children as $child)
                                <p class="text-lg text-gray-600">{{ $child->first_name }} {{ $child->last_name }}</p>
                            @empty
                                <p class="text-lg text-gray-600">Aucun enfant enregistré.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="bg-gray-50 p-4 rounded-lg shadow-sm">
                            <h3 class="text-xl font-semibold text-gray-800 mb-4">Parents :</h3>
                            @forelse($person->parents as $parent)
                                <p class="text-lg text-gray-600">{{ $parent->first_name }} {{ $parent->last_name }}</p>
                            @empty
                                <p class="text-lg text-gray-600">Aucun parent enregistré.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('people.index') }}" class="text-blue-600 hover:text-blue-800 font-semibold">Retour à la liste</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
