@extends('layouts.app')

@section('content')
<div class="container">
<h3>search result page</h3>

<h3>{{$shipment->destination}}</h3> <h3>{{$shipment->date}}</h3>

<a href="/findpack">Back to search</a>
<br>
<br>

<table class="table">
  <thead class="thead-dark" style="text-align:center;">

<tr>
<th>Package ID</th><th>Customer name</th><th>Customer phone</th><th>Number of packages</th>
</tr>

  </thead>
  <tbody style="text-align:center;">
<tr>
@foreach($package as $pack)
<td>{{$pack->id}}</td><td>{{$pack->customer}}</td><td>{{$pack->phone}}</td><td>{{$pack->quantity}}</td>
@endforeach
</tr>
</tbody>
</table>

<!-- Second section -->
<table class="table">
  <thead class="thead-dark" style="text-align:center;">

<tr>
<th>Quantity</th><th>Content description</th><th>Packge dimentions</th><th>Weight</th>
</tr>

  </thead>
  <tbody style="text-align:center;">
<tr>
@foreach($package as $pack)
<td>{{$pack->quantity}}</td><td>{{$pack->description}}</td><td>{{$pack->dimentions}}</td><td>{{$pack->weight}}</td>
@endforeach
</tr>
</tbody>
</table>

<!-- Thrid section -->

<table class="table">
  <thead class="thead-dark" style="text-align:center;">

<tr>
<th>Address</th><th>City</th><th>Post code</th><th>Email</th>
</tr>

  </thead>
  <tbody style="text-align:center;">
<tr>
@foreach($package as $pack)
<td>{{$pack->street}}</td><td>{{$pack->city}}</td><td>{{$pack->postcode}}</td><td>{{$pack->email}}</td>
@endforeach
</tr>
</tbody>
</table>


<!-- Fouth section -->

<table class="table">
  <thead class="thead-dark" style="text-align:center;">

<tr>
<th>Recpient name</th><th>Recepient phone</th><th>Status</th>
</tr>

  </thead>
  <tbody style="text-align:center;">
<tr>
@foreach($package as $pack)
<td>{{$pack->recepient}}</td><td>{{$pack->recpphone}}</td><td>{{$pack->status}}</td>
@endforeach
</tr>
</tbody>
</table>

@foreach($package as $pack)
<a href="{{'/updatepack/'.$pack->id}}"><button class="btn btn-warning">Update constomer info</button></a>
@endforeach
</div>


@endsection
