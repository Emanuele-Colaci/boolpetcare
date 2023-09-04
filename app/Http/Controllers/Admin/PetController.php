<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\facades\Storage;
use App\Models\Pet;
use App\Models\Vaccination;
use App\Models\Illness;
use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $species = $request->input('species');

        $petsQuery = Pet::query();

    if($keyword){
        $petsQuery->where('name', 'like', "%$keyword%");
    }

    if($species){
        $petsQuery->Where('species', 'like', "%$species%");
    }

    $pets = $petsQuery->get();

    return view('admin.pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $illnesses = Illness::all();
        $vaccinations = Vaccination::all();
        return view('admin.pets.create', compact('vaccinations', 'illnesses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePetRequest $request)
    {
        $form_data = $request->all();

        $pets = new Pet();

        if($request->hasFile('image')){
            $path = Storage::put('pets-image', $request->image);
            $form_data['image'] = $path;
        }
        
        $form_data['slug'] =  $pets->generateSlug($form_data['name']);

        $pets->fill($form_data);

        $pets->save();

        if($request->has('vaccinations')){
            $pets->vaccinations()->attach($request->vaccinations);
        }

        if($request->has('illnesses')){
            $pets->illnesses()->attach($request->illnesses);
        }

        $message = 'Creazione animale completata';
        return redirect()->route('admin.pets.index', ['message' => $message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        return view('admin.pets.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit(Pet $pet)
    {
        $illnesses = Illness::all();
        $vaccinations = Vaccination::all();
        return view('admin.pets.edit', compact('pet', 'vaccinations', 'illnesses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePetRequest  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {
        $form_data = $request->all();
        
        if($request->hasFile('image')){
            if($pet->image){
                Storage::delete($pet->image);
            }
            
            $path = Storage::put('pets-image', $request->image);
            $form_data['image'] = $path;
        }
        
        $form_data['slug'] =  $pet->generateSlug($form_data['name']);
        $pet->update($form_data);
        if($request->has('vaccinations')){
            $pet->vaccinations()->sync($request->vaccinations);
        }
        
        if($request->has('illnesses')){
            $pet->illnesses()->sync($request->illnesses);
        }
        
        $message = 'Aggiornamento animale completato';
        return redirect()->route('admin.pets.index', ['message' => $message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        $pet->vaccinations()->detach();
        $pet->illnesses()->detach();
        $pet->delete();
        return redirect()->route('admin.pets.index');
    }
}
