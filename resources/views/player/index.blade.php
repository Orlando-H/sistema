@extends('layouts.app')
@section('content')
<div class="px-4">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="mb-3">
    <a href="{{ url('player/create') }}" class ="btn btn-success">Registrar nuevo jugador</a>
</div>

<div class="col-6">
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Calidad</th>
                <th>Potencial</th>
                <th>Valor</th>
                <th>Posicion</th>
                <th>Equipo</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($players as $player)
            <tr>
                <td>{{ $player->id }}</td>
                <td>{{ $player->name }}</td>
                <td>{{ $player->lastname }}</td>
                <td>{{ $player->age }}</td>
                <td>{{ $player->quality }}</td>
                <td>{{ $player->potential }}</td>
                <td>{{ $player->value }}</td>
                <td>{{ $player->position }}</td>
                <td>{{ $player->team }}</td>
                <td>
                <img class = "img-thumbnail img-fluid" src="{{ asset('storage').'/'.$player->image }}" width ="100px" alt="">
                </td>
                <td>
                    
                
                <a href="{{ url('/player/'.$player->id.'/edit') }}" class ="btn btn-warning">
                    Editar  
                </a>
                 |
    
                <form action="{{ url('/player/'.$player->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value ="Borrar" class = "btn btn-danger">    
    
                </form>
            
            </tr>
            @endforeach
        </tbody>
        {!! $players->links() !!}
    </table>
    <div class="col-6">

    </div>
</div>
</div>
@endsection