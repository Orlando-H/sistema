@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/player') }}" method="post" enctype="multipart/form-data">

@csrf
@include('player.form', ['modo'=>'Crear']);

</form>
</div>
@endsection