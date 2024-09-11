@extends('layouts.app')
@section('content')
<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif






<div class="mb-3">
    <a href="{{ url('empleado/create') }}" class ="btn btn-success">Registrar nuevo empleado</a>
</div>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach($empleados as $empleado)
        <tr>
            <td>{{ $empleado->id }}</td>
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->apellidoPaterno }}</td>
            <td>{{ $empleado->apellidoMaterno }}</td>
            <td>{{ $empleado->email }}</td>
            <td>
            <img class = "img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->foto }}" width ="100px" alt="">
            </td>
            <td>
                
            
            <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class ="btn btn-warning">
                Editar  
            </a>
             |

            <form action="{{ url('/empleado/'.$empleado->id) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" onclick="return confirm('¿Quieres borrar?')" value ="Borrar" class = "btn btn-danger">    
            

            </form>
        
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $empleados->links() !!}
</div>
@endsection
