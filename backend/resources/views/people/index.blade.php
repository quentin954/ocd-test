<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-lg overflow-hidden">
                <div class="p-6 bg-gray-50 border-b border-gray-200">
                    <h2 class="text-3xl font-semibold text-gray-800">Liste des Personnes</h2>
                    <p class="text-lg text-gray-600 mt-2">Voici la liste des personnes enregistrées dans le système :</p>

                    <div class="mt-4">
                        <a href="{{ route('people.create') }}" class="inline-block px-6 py-3 bg-blue-600 text-black font-semibold text-lg rounded-md hover:bg-blue-700 hover:text-white transition duration-200">
                            Créer une Personne
                        </a>
                    </div>
                </div>

                <div class="p-6 bg-white">
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($people as $person)
                            <div class="bg-gray-50 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                                <a href="{{ route('people.show', $person->id) }}" class="block text-xl font-semibold text-blue-600 hover:text-blue-800">
                                    {{ $person->first_name }} {{ $person->last_name }}
                                </a>
                                <p class="text-sm text-gray-600 mt-2">Créée par : {{ $person->creator->name ?? 'Inconnu' }}</p>
                                <p class="text-sm text-gray-600">Date de naissance : {{ $person->date_of_birth ?? 'Non renseignée' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>