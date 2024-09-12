<h1> {{$modo}} Player </h1>

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

<label for="name">Name</label>
<input type="text" class="form-control" name = "name" value="{{ isset($player-> name)?$player-> name:old('name') }}" id="name">
<br>
</div>

<div class = "form-group">
<label for="lastname">Lastname</label>
<input type="text" class = "form-control" name = "lastname" value="{{ isset($player-> lastname)?$player-> lastname:old('lastname') }}" id = "lastname">
<br>
</div>

<div class = "form-group">
<label for="age">Age</label>
<input type="text" class = "form-control" name = "age" value="{{ isset($player-> age)?$player-> age:old('age') }}" id = "age">
<br>
</div>

<div class = "form-group">
<label for="quality">Quality</label>
<select class="form-select" name="quality" id="quality">
    <option value="1" {{ isset($player-> potential) && $player-> potential == 1 ? 'selected' : '' }}>1</option>
    <option value="2" {{ isset($player-> potential) && $player-> potential == 2 ? 'selected' : '' }}>2</option>
    <option value="3" {{ isset($player-> potential) && $player-> potential == 3 ? 'selected' : '' }}>3</option>
    <option value="4" {{ isset($player-> potential) && $player-> potential == 4 ? 'selected' : '' }}>4</option>
    <option value="5" {{ isset($player-> potential) && $player-> potential == 5 ? 'selected' : '' }}>5</option>
</select>
<br>
</div>

<div class = "form-group">
<label for="potential">Potential</label>
<!--input de seleccion con los valores del rango 1 a 5-->
<select class="form-select" name="potential" id="potential">
    <option value="1" {{ isset($player-> potential) && $player-> potential == 1 ? 'selected' : '' }}>1</option>
    <option value="2" {{ isset($player-> potential) && $player-> potential == 2 ? 'selected' : '' }}>2</option>
    <option value="3" {{ isset($player-> potential) && $player-> potential == 3 ? 'selected' : '' }}>3</option>
    <option value="4" {{ isset($player-> potential) && $player-> potential == 4 ? 'selected' : '' }}>4</option>
    <option value="5" {{ isset($player-> potential) && $player-> potential == 5 ? 'selected' : '' }}>5</option>
</select>
<br>
</div>

<div class = "form-group">
<label for="value">Value</label>
<input type="text" class = "form-control" name = "value" value="{{ isset($player-> value)?$player-> value:old('value') }}" id = "value">
<br>
</div>

<div class = "form-group">
<label for="position">Position</label>
<!-- input de seleccion con los valores de las posiciones de un jugador -->
<select class="form-select" name="position" id="position">
    <option value="GK" {{ isset($player-> position) && $player-> position == 'GK' ? 'selected' : '' }}>GK</option>
    <option value="LCB" {{ isset($player-> position) && $player-> position == 'LCB' ? 'selected' : '' }}>LCB</option>
    <option value="RCB" {{ isset($player-> position) && $player-> position == 'RCB' ? 'selected' : '' }}>RCB</option>
    <option value="LB" {{ isset($player-> position) && $player-> position == 'LB' ? 'selected' : '' }}>LB</option>
    <option value="RB" {{ isset($player-> position) && $player-> position == 'RB' ? 'selected' : '' }}>RB</option>
    <option value="LCM" {{ isset($player-> position) && $player-> position == 'LCM' ? 'selected' : '' }}>LCM</option>
    <option value="RCM" {{ isset($player-> position) && $player-> position == 'RCM' ? 'selected' : '' }}>RCM</option>
    <option value="CM" {{ isset($player-> position) && $player-> position == 'CM' ? 'selected' : '' }}>CM</option>
    <option value="RW" {{ isset($player-> position) && $player-> position == 'RW' ? 'selected' : '' }}>RW</option>
    <option value="LW" {{ isset($player-> position) && $player-> position == 'LW' ? 'selected' : '' }}>LW</option>
    <option value="ST" {{ isset($player-> position) && $player-> position == 'ST' ? 'selected' : '' }}>ST</option>
</select>
<br>
</div>

<div class = "form-group">
<label for="team">Team</label>
<input type="text" class = "form-control" name = "team" value="{{ isset($player-> team)?$player-> team:old('team') }}" id = "team">
<br>
</div>

<div class = "form-group">
    <label for="image"></label>
    @if(isset($player->image))
    <img class ="img-thumbnail img-fluid"src="{{ asset('storage').'/'.$player->image }}"  width ="100px"alt="">
    @endif
    <input type="file" class = "form-control" name = "image" value="{{ isset($player-> image)?$player-> image:'' }}" id = "image">
    <br>
</div>

<input class ="btn btn-success"type="submit" value = "{{ $modo }} datos">

<a class ="btn btn-primary"href="{{ url('player/') }}">Regresar</a>
