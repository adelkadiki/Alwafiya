@extends('layouts.app')

@section('content')
<div class="container">

<h3>{{$ship->destination}}</h3> <h5>{{$ship->date}}</h5>
<form method="post" action="/updshipstatus">

  @csrf
  @method('put')
<input type="hidden" name="id" value="{{$ship->id}}" />
<select name="status" class="form-control">
<option value="Launched" @if($ship->status=='Launched') selected @endif>Launched</option>
<option value="Departed" @if($ship->status=='Departed') selected @endif>Departed</option>
<option value="Arrived" @if($ship->status=='Arrived') selected @endif>Arrived</option>
</select>
<br/>
<input type="submit" value="Submit" class="btn btn-success"/>
</form>

</div>
@endsection
