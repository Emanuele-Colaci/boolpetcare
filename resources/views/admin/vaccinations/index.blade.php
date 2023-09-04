@extends('layouts.admin')

@section('content')

<div class="container">
  <div class="col-12 col-sm-6 col-md-3 my-5 w-100">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <a href="{{route('admin.vaccinations.create')}}" class="btn btn-primary">Aggiungi un vaccino</a>
      </div>
      <div>
        <a href="{{route('admin.pets.index')}}" class="btn btn-primary">Gli animali della nostra clinica</a>
      </div>
      <div>
        <a href="{{route('admin.illnesses.index')}}" class="btn btn-primary">Lista delle malattie</a>
      </div>
      <div>
        <a href="{{route('admin.dashboard')}}" class="btn btn-primary">Torna alla dashboard</a>
      </div>
    </div>
</div>


    <div class="card">
      <div class="card-header">
        <h3>I nostri vaccini</h3>
      </div>
      <div class="card-body">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome vaccino</th>
                <th scope="col">Data vaccino</th>
                <th scope="col">Visualizza/Modifica/Elimina</th>
              </tr>
            </thead>
            <tbody>
                @foreach($vaccinations as $vaccination)
                  <tr >
                    <th scope="row">{{$vaccination->id}}</th>
                    <td>{{$vaccination->vaccine_name}}</td>
                    <td>{{$vaccination->vaccination_date}}</td>
                    <td>
                      <div class="d-flex align-items-center justify-content-between my-content">
                          <a class="btn btn-sm btn-primary" href="{{route('admin.vaccinations.show', $vaccination->id)}}"><i class="fa-solid fa-eye"></i></a>
                          <a class="btn btn-sm btn-warning" href="{{route('admin.vaccinations.edit', $vaccination->id)}}" class="mx-3"><i class="fa-solid fa-pen-to-square"></i></a>
                          <form class="form-delete" action="{{route('admin.vaccinations.destroy', $vaccination->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">
                                  <i class="fa-solid fa-trash-can"></i>
                              </button>
                          </form>
                      </div>
                    </td>
                  </tr>
                @endforeach
            </tbody>   
        </table>
      </div>
    </div>
</div>
@include('admin.partials.modal_delete')
@endsection