@extends('layouts.web')

@section('content')

<p>destination page</p>

<form>

<select class="form-control">
@foreach($shipments as $ship)
<option value="{{$ship->id}}">{{$ship->destination}}  {{$ship->date}}</option>
@endforeach
</select>
<br>
<button class="btn btn-primary">Submit</button>
</form>

@endsection
