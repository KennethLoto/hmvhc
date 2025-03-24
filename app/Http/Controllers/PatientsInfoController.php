<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPatientsInfoRequest;
use App\Http\Requests\EditPatientsInfoRequest;
use App\Models\PatientsInfo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PatientsInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patientsInfos = PatientsInfo::orderBy('created_at', 'desc')->get();
        return view('patientsInfo.index', compact('patientsInfos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patientsInfo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddPatientsInfoRequest $request)
    {
        $data = $request->validated();

        $patientsInfo = PatientsInfo::create($data);

        Alert::success('Patienst Info Added', 'The new patients info has been created.');

        return redirect()->route('patientsInfo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PatientsInfo $patientsInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PatientsInfo $patientsInfo)
    {
        return view('patientsInfo.edit', compact('patientsInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditPatientsInfoRequest $request, PatientsInfo $patientsInfo)
    {
        $data = $request->validated();

        $patientsInfo->update($data);

        Alert::success('Patient Info Updated', 'The patients info has been updated.');

        return redirect()->route('patientsInfo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PatientsInfo $patientsInfo)
    {
        $patientsInfo->delete();
        Alert::success('Patients Info Deleted', 'The patient info has been deleted.');
        return redirect()->route('patientsInfo.index');
    }
}
