
<h1>{{ $modo }} empleado</h1>

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
<ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif

<div class = "form-group">

<label for="nombre">Nombre</label>
<input type="text" class="form-control" name = "nombre" value="{{ isset($empleado-> nombre)?$empleado-> nombre:old('nombre') }}" id="nombre">
<br>
</div>

<div class = "form-group">
<label for="apellidoPaterno">Apellido paterno</label>
<input type="text" class = "form-control" name = "apellidoPaterno" value="{{ isset($empleado-> apellidoPaterno)?$empleado-> apellidoPaterno:old('apellidoPaterno') }}" id = "apellidoPaterno">
<br>
</div>

<div class = "form-group">
<label for="apellidoMaterno">Apellido materno</label>
<input type="text" class = "form-control" name = "apellidoMaterno" value="{{ isset($empleado-> apellidoMaterno)?$empleado-> apellidoMaterno:old('apellidoMaterno') }}" id = "apellidoMaterno">
<br>
</div>

<div class = "form-group">
<label for="email">Email</label>
<input type="text" class="form-control" name = "email" value="{{ isset($empleado-> email)?$empleado-> email:old('email') }}" id = "email">
<br>
</div>

<div class = "form-group">

<label for="foto"></label>
@if(isset($empleado->foto))
<img class ="img-thumbnail img-fluid"src="{{ asset('storage').'/'.$empleado->foto }}"  width ="100px"alt="">
@endif
<input type="file" class = "form-control" name = "foto" value="{{ isset($empleado-> foto)?$empleado-> foto:'' }}" id = "foto">
<br>

</div>

<input class ="btn btn-success"type="submit" value = "{{ $modo }} datos">

<a class ="btn btn-primary"href="{{ url('empleado/') }}">Regresar</a>

<br