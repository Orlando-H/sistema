@extends('layouts.app')
@section('content')
<div class="px-4 d-flex gap-5">

<div class="col-6">
    @if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="mb-3">
        <a href="{{ url('player/create') }}" class ="btn btn-success">Registrar nuevo jugador</a>
    </div>
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
            <tr onclick="showDetails({{ json_encode($player) }})">
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
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$player->image }}" width="100px" alt="">
                </td>
                <td>
                    <a href="{{ url('/player/'.$player->id.'/edit') }}" class="btn btn-warning">Editar</a> |
                    <form action="{{ url('/player/'.$player->id) }}" class="d-inline" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger ">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
    {!! $players->links() !!}
</div>
<div class="col-4 position-relative h-50">
    <!-- IMAGEN DE FONDO -->
    <div class="z-0">
        <img src="{{ asset('storage/uploads/fondo.png') }}" class="img-fluid" alt="">
    </div>
    <!-- Posiciones de los jugadores -->
    <div class="d-flex gap-5 align-items-center flex-column-reverse h-100 w-100 justify-content-center z-0 top-0 start-0 position-absolute">
        <div class="col-1">
            <div id="GK-position" class="position-circle rounded-circle bg-success p-1">GK</div>
        </div>
        <div class="d-flex gap-5">
            <div id="LB-position" class="position-circle rounded-circle bg-success p-1">LB</div>
            <div id="LCB-position" class="position-circle rounded-circle bg-success p-1">LCB</div>
            <div id="RCB-position" class="position-circle rounded-circle bg-success p-1">RCB</div>
            <div id="RB-position" class="position-circle rounded-circle bg-success p-1">RB</div>
        </div>
        <div class="d-flex gap-5">
            <div id="LCM-position" class="position-circle rounded-circle bg-warning p-1">LCM</div>
            <div id="CM-position" class="position-circle rounded-circle bg-warning p-1">CM</div>
            <div id="RCM-position" class="position-circle rounded-circle bg-warning p-1">RCM</div>
        </div>
        <div class="d-flex gap-5">
            <div id="LW-position" class="position-circle rounded-circle bg-danger p-1">LW</div>
            <div id="ST-position" class="position-circle rounded-circle bg-danger p-1">ST</div>
            <div id="RW-position" class="position-circle rounded-circle bg-danger p-1">RW</div>
        </div>
    </div>
</div>

<div id="player-details"></div>
</div>
@endsection
<script>
    function showDetails(player) {
        const detailsDiv = document.getElementById('player-details');
        detailsDiv.innerHTML = `
            <h3>Detalles del Jugador</h3>
            <p><strong>Nombre:</strong> ${player.name} ${player.lastname}</p>
            <p><strong>Edad:</strong> ${player.age}</p>
            <p><strong>Calidad:</strong> ${player.quality}</p>
            <p><strong>Potencial:</strong> ${player.potential}</p>
            <p><strong>Valor:</strong> ${player.value}</p>
            <p><strong>Posición:</strong> ${player.position}</p>
            <p><strong>Equipo:</strong> ${player.team}</p>
            <img src="{{ asset('storage') }}/${player.image}" class="img-thumbnail img-fluid" width="150px" alt="">
        `;

        const positionCircle = document.getElementById(`${player.position}-position`);
        if (positionCircle) {
            positionCircle.innerHTML = `<img src="{{ asset('storage') }}/${player.image}" class="rounded-circle" style="width: 50px; height: 50px;" alt="${player.position}">`;
        }
    }
</script>
