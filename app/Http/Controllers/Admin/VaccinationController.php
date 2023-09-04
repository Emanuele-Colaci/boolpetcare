<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vaccination;
use App\Http\Requests\StoreVaccinationRequest;
use App\Http\Requests\UpdateVaccinationRequest;

class VaccinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccinations = Vaccination::all();
        return view('admin.vaccinations.index', compact('vaccinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.vaccinations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVaccinationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVaccinationRequest $request)
    {
        $form_data = $request->all();

        $vaccination = new Vaccination();

        $vaccination->fill($form_data);

        $vaccination->save();

        $message = 'Creazione vaccino completato';
        return redirect()->route('admin.vaccinations.index', ['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function show(Vaccination $vaccination)
    {
        return view('admin.vaccinations.show', compact('vaccination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaccination $vaccination)
    {
        return view('admin.vaccinations.edit', compact('vaccination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVaccinationRequest  $request
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVaccinationRequest $request, Vaccination $vaccination)
    {
        $form_data = $request->all();

        $vaccination->update($form_data);

        $message = 'Aggiornamento  completato';
        return redirect()->route('admin.vaccinations.index', ['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaccination $vaccination)
    {
        $vaccination->delete();
        return redirect()->route('admin.vaccinations.index');
    }
}
