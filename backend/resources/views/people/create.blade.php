<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer une nouvelle personne') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('people.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Prénom</label>
                            <input type="text" name="first_name" id="first_name" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="middle_names" class="block text-sm font-medium text-gray-700">Noms de famille (facultatif)</label>
                            <input type="text" name="middle_names" id="middle_names" class="mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="block text-sm font-medium text-gray-700">Nom de famille</label>
                            <input type="text" name="last_name" id="last_name" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="birth_name" class="block text-sm font-medium text-gray-700">Nom de naissance (facultatif)</label>
                            <input type="text" name="birth_name" id="birth_name" class="mt-1 block w-full">
                        </div>

                        <div class="mb-4">
                            <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date de naissance (YYYY-MM-DD)</label>
                            <input type="text" name="date_of_birth" id="date_of_birth" class="mt-1 block w-full">
                        </div>

                        <button type="submit" class="mt-4 border-2 border-blue-500 text-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md transition duration-200">
                            Créer une personne
                        </button>
                    </form>

                    <div class="mt-4">
                        <a href="{{ route('people.index') }}" class="inline-block px-6 py-2 mt-4 border-2 border-gray-500 text-gray-500 hover:bg-gray-500 hover:text-white font-semibold text-lg rounded-md transition duration-200">
                            Retour vers la liste des personnes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>