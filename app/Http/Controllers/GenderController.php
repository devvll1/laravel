<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    public function index()
    {
        $genders = Gender::all();
        return view('genders.index', compact('genders'));
    }

    public function show($id)
    {
        $gender = Gender::findOrFail($id);
        return view('genders.show', compact('gender'));
    }

    public function create()
    {
        return view('genders.create');
    }

    public function store(Request $request)
    {
        // Validation can be added here if necessary
        Gender::create($request->all());
        return redirect()->route('genders.index')->with('success', 'Gender created successfully.');
    }

    public function edit($id)
    {
        $gender = Gender::findOrFail($id);
        return view('gender.edit', compact('gender'));
    }

    public function update(Request $request, $id)
    {
        // Validation can be added here if necessary
        $gender = Gender::findOrFail($id);
        $gender->update($request->all());
        return redirect()->route('genders.index')->with('success', 'Gender updated successfully.');
    }

    public function destroy($id)
    {
        $gender = Gender::findOrFail($id);
        $gender->delete();
        return redirect()->route('genders.index')->with('success', 'Gender deleted successfully.');
    }
}
