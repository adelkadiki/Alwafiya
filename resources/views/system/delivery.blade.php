@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{'/arrivedpacklist/'.$id}}">Back to arrived packages list</a>
  <br>
  <br>
<h5>{{$pack->customer}}</h5>

  <form action="/deliverysubmit" method="post" >
<input type="hidden" name="id" value="{{$pack->id}}" />
    @csrf
    @method('put')

<select class="form-control" name="status">
  <option value="Request" @if($pack->status=='Request' or $pack->status=='Launched') selected @endif >Request</option>
  <option value="Departed" @if($pack->status=='Departed') selected @endif >Departed</option>
  <option value="Arrived" @if($pack->status=='Arrived') selected @endif >Arrived</option>
  <option value="Delivered" @if($pack->status=='Delivered') selected @endif >Delivered</option>
</select>
<br>
<br>

<input type="submit" value="Submit" class="btn btn-primary" />
  </form>

</div>

@endsection
