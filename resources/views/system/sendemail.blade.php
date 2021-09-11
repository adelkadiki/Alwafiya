@extends('layouts.app')

@section('content')


<x-alert />


<div class="container">
<a href="{{'/packlist/'.$shipid}}">Back to packages list</a>
<br>
<br>
<h5>Estimante the cost and click on submit to send an email has the cost and traking number to the client </h5>
<form  action="/submitemail" method="post">

  @csrf
  @method('put')

  <input type="hidden" name="id" value="{{$pack->id}}" />

  <div class="form-group">
   <label >Cost</label>
   <input type="text" class="form-control" id="cost" name="cost" value="{{$pack->cost}}"/>
  </div>
<input type="submit" value="Submit"  class="btn btn-primary"/>
</form>

</div>
@endsection
