@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Modifica i dati dell'animale</h2>
                    <a href=" {{ route('admin.pets.index')}} " class="btn btn-secondary btn-sm">Pets</a>
                </div>
                <div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action=" {{ route('admin.pets.update', $pet->id) }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <form action=" {{ route('admin.pets.store') }} " method="POST">
                        @csrf
                        <div class="class-group">
                            <label class="control-label">Nome dell'animale</label>
                            <input type="text" id="name" name="name" class="form-control @error('name')is-invalid @enderror" placeholder="Inserisci il nome dell'animale" value="{{ old('name') ?? $pet->name}}">
                            @error('name')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group">
                            <label class="control-label">Specie</label>
                            <input type="text" id="species" name="species" class="form-control @error('species')is-invalid @enderror" placeholder="Inserisci la specie dell'animale" value="{{ old('species') ?? $pet->species}}">
                            @error('name')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group">
                            <label class="control-label">Data di nascita</label>
                            <input type="text" id="date_born" name="date_born" class="form-control @error('date_born')is-invalid @enderror" placeholder="Inserisci la data di nascita" value="{{ old('date_born') ?? $pet->date_born}}">
                            @error('date_born')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group">
                            <label class="control-label">Genere</label>
                            <input type="text" id="genre" name="genre" class="form-control @error('genre')is-invalid @enderror" placeholder="Inserisci il genere dell animale. Es: maschio" value="{{ old('genre') ?? $pet->genre}}">
                            @error('genre')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group">
                            <label class="control-label">Proprietario</label>
                            <input type="text" id="owner" name="owner" class="form-control @error('owner')is-invalid @enderror" placeholder="Inserisci il nome del proprietario dell animale" value="{{ old('owner') ?? $pet->owner}}">
                            @error('owner')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group">
                            <label class="control-label">Note aggiuntive</label>
                            <input type="text" id="notes" name="notes" class="form-control @error('notes')is-invalid @enderror" placeholder="Inserisci delle note aggiuntive sull'animale" value="{{ old('notes') ?? $pet->notes}}">
                            @error('notes')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group my-4">
                            <label class="control-label my-2">Vaccini:</label>
                            @foreach($vaccinations as $vaccination)
                                <div class="form-check">
                                    <input type="checkbox" name="vaccinations[]" value="{{ $vaccination->id }}" class="form-check-input @error('vaccinations') is-invalid @enderror"
                                        @if(in_array($vaccination->id, $pet->vaccinations->pluck('id')->toArray())) checked @endif>
                                    <label class="form-check-label">{{ $vaccination->vaccine_name}}</label>
                                </div>
                            @endforeach
                            @error('vaccinations')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group my-4">
                            <label class="control-label my-2">Malattie:</label>
                            @foreach($illnesses as $illness)
                                <div class="form-check">
                                    <input type="checkbox" name="illnesses[]" value="{{ $illness->id }}" class="form-check-input @error('illness') is-invalid @enderror" {{ $pet->illnesses->contains($illness) ? 'checked' : ''}}>
                                    <label class="form-check-label">{{ $illness->name }}</label>
                                </div>
                            @endforeach
                            @error('illnesses')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <img src="{{ asset('storage/'.$pet->image) }}" width="600px" height="500px" alt="Immagine non disponibile">
                        </div>
                        <div class="col-12 my-3">
                            <!-- Immagine -->
                            <label class="control-label my-3">Immagine</label>
                            <input type="file" name="image" id="image" placeholder="Inserisci l'immagine dell'animale in questione" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') ?? $pet->image}}">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="class-group my-3">
                            <button type="submit" class="btn btn-primary btn-success">Modifica dati</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection