@extends('layouts.app')

@section('content')

<a href="/newship" style="margin-left:4%;">Back to shipments list</a>
<br>
<br>
<table class="table">
<thead class="thead-dark">
  <tr style="text-align:center;">
<th>Customer name</th><th>Phone</th><th>Package number</th><th></th><th></th>
</tr>
</thead>
<tbody>
@foreach($packages as $pack)
<tr style="text-align:center;">
   <td>{{$pack->customer}}</td><td>{{$pack->phone}}</td><td>{{$pack->id}}</td>
   <td><a href="{{'/packdetails/'.$pack->id}}">Details</a></td>
   <td><a href="{{'/sendemail/'.$pack->id}}"><button class="btn btn-primary">Email cost and tracking number to customer</button></a></td>

 </tr>
@endforeach
</tbody>
</table>

@endsection
