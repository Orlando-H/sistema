@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/player/'.$player->id) }}" method="post" enctype="multipart/form-data">
@csrf
{{ method_field('PATCH') }}

@include('player.form', ['modo'=>'Editar'])

</form>
</div>
@endsection