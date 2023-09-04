<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Illness;
use App\Http\Requests\StoreIllnessRequest;
use App\Http\Requests\UpdateIllnessRequest;

class IllnessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $illnesses = Illness::all();
        return view('admin.illnesses.index', compact('illnesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.illnesses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreIllnessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIllnessRequest $request)
    {
        $form_data = $request->all();

        $illnesses = new Illness();
        $form_data['slug'] =  $illnesses->generateSlug($form_data['name']);
        $illnesses->fill($form_data);
        $illnesses->save();

        return redirect()->route('admin.illnesses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Illness  $illness
     * @return \Illuminate\Http\Response
     */
    public function show(Illness $illness)
    {
        return view('admin.illnesses.show', compact('illness'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Illness  $illness
     * @return \Illuminate\Http\Response
     */
    public function edit(Illness $illness)
    {
        return view('admin.illnesses.edit', compact('illness'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateIllnessRequest  $request
     * @param  \App\Models\Illness  $illness
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIllnessRequest $request, Illness $illness)
    {
        $form_data = $request->all();
        $form_data['slug'] =  $illness->generateSlug($form_data['name']);
        $illness->update($form_data);
        $message = 'Modifica completata';
        return redirect()->route('admin.illnesses.index', ['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Illness  $illness
     * @return \Illuminate\Http\Response
     */
    public function destroy(Illness $illness)
    {
        $illness->delete();

        return redirect()->route('admin.illnesses.index');
    }
}
