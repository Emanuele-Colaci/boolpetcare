@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="mb-4 d-flex justify-content-end">
                    <a href="{{route('admin.vaccinations.index')}}" class="btn btn-primary">Torna alla lista dei vaccini</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1>{{$vaccination->vaccine_name}}</h1>
                    </div>

                    <div class="card-body">
                        <strong>Vaccini:</strong>
                        <ul>
                            <li><strong>Data del vaccino:</strong> {{ $vaccination->vaccination_date }}</li>
                            <li><strong>Dosagio:</strong> {{ $vaccination->dosage }}</li>
                            <li>
                                <strong>Segni particolari:</strong>
                                <ul>
                                    <li>
                                        <p>{{ $vaccination->notes }}</p>
                                    </li>
                                </ul>
                            </li>
                        </ul>   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection