@extends('layouts.app')

@section('content')

<x-alert />

<h5 style="margin-left:35%;">Departed shipments</h5>

<table class="table">
<thead  class="thead-dark">
<tr style="text-align:center;">
  <th>Destination</th><th>Date</th><th></th><th></th>
</tr>
</thead>

<tbody>
@foreach($shipments as $ship)
<tr style="text-align:center;"><td>{{$ship->destination}}</td><td>{{$ship->date}}</td><td><a href="{{'/departpacklist/'.$ship->id}}">Packages</a></td><td><a href="{{'/editinfo/'.$ship->id}}"><button class="btn btn-secondary">Change shipment status</button></a></td></tr>
@endforeach
</tbody>
</table>

@endsection
