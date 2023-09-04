@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('Dashboard principale') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class=" col-3 link d-flex flex-column">
                        <a class="btn btn-primary mb-3" href="{{ route('admin.pets.index') }}">Gli animali della nostra clinica</a>
                        <a class="btn btn-primary mb-3" href="{{ route('admin.vaccinations.index') }}">Lista dei vaccini</a>
                        <a class="btn btn-primary" href="{{ route('admin.illnesses.index') }}">Lista delle malattie diagnosticate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
