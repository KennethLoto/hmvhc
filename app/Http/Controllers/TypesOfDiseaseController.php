<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTypesOfDiseaseRequest;
use App\Http\Requests\UpdateTypesOfDiseasesRequest;
use App\Models\TypesOfDisease;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TypesOfDiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $typesOfDiseases = TypesOfDisease::all();
        return view('typesOfDiseases.index', compact('typesOfDiseases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = TypesOfDisease::select('category')->distinct()->get();
        return view('typesOfDiseases.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddTypesOfDiseaseRequest $request)
    {
        $data = $request->validated();

        $data['category'] = $data['new_category'] ?? $data['category'];

        $typeOfDisease = TypesOfDisease::create($data);

        Alert::success('Types of Disease Added', 'The new type of disease has been created.');

        return redirect()->route('typesOfDiseases.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypesOfDisease $typesOfDisease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypesOfDisease $typesOfDisease)
    {
        $categories = TypesOfDisease::whereNotNull('category')->distinct()->pluck('category');
        return view('typesOfDiseases.edit', compact('typesOfDisease', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypesOfDiseasesRequest $request, TypesOfDisease $typesOfDisease)
    {
        $data = $request->validated();

        $data['category'] = $data['new_category'] ?? $data['category'];

        // Remove `new_category` from data to avoid mass assignment issues
        unset($data['new_category']);

        $typesOfDisease->update($data);

        Alert::success('Types of Disease Updated', 'The disease type has been successfully updated.');

        return redirect()->route('typesOfDiseases.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypesOfDisease $typesOfDisease)
    {
        $typesOfDisease->delete();
        Alert::success('Type of Disease Deleted', 'The type of disease has been deleted.');
        return redirect()->route('typesOfDiseases.index');
    }
}
