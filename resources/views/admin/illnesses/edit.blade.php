@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Modifica la malattia</h2>
                    <a href=" {{ route('admin.illnesses.index')}} " class="btn btn-secondary btn-sm">Torna alle malattie diagnosticate</a>
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
                    <form action=" {{ route('admin.illnesses.update', $illness->id) }} " method="POST">
                        @csrf
                        @method('PUT')
                        <div class="class-group">
                            <label class="control-label">Nome della malattia</label>
                            <input type="text" id="name" name="name" class="form-control @error('name')is-invalid @enderror" placeholder="Inserisci il nome della malattia" value="{{ old('name') ?? $illness->name}}">
                            @error('name')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group">
                            <label class="control-label">Diagnosi</label>
                            <input type="text" id="diagnosis" name="diagnosis" class="form-control @error('diagnosis')is-invalid @enderror" placeholder="Inserisci una disgnosi" value="{{ old('diagnosis') ?? $illness->diagnosis}}">
                            @error('diagnosis')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group">
                            <label class="control-label">Trattamento</label>
                            <input type="text" id="treatment" name="treatment" class="form-control @error('treatment')is-invalid @enderror" placeholder="Inserisci il trattamento per la malattia" value="{{ old('treatment') ?? $illness->treatment}}">
                            @error('treatment')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group">
                            <label class="control-label">Note varie</label>
                            <textarea type="text" id="notes" name="notes" cols="30" rows="10" class="form-control @error('notes')is-invalid @enderror">{{ old('notes') ?? $illness->notes}}</textarea>
                            @error('genre')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="class-group my-3">
                            <button type="submit" class="btn btn-primary btn-success">Modifica</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection