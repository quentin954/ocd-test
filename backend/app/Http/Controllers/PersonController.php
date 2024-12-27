<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::with('creator')->get();
        return view('people.index', compact('people'));
    }

    public function show($id)
    {
        $person = Person::with(['children', 'parents'])->findOrFail($id);
        return view('people.show', compact('person'));
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_name' => 'nullable|string|max:255',
            'middle_names' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
        ]);

        Person::create([
            'created_by' => Auth::id(),
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'birth_name' => $validated['birth_name'],
            'middle_names' => $validated['middle_names'],
            'date_of_birth' => $validated['date_of_birth'],
        ]);

        return redirect()->route('people.index')->with('success', 'Personne créée avec succès.');
    }
}