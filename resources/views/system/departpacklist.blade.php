@extends('layouts.app')

@section('content')

<a href="/departure"  id="deptbcklink">Back to shipments list</a> 
<button type="button" id="printBtn"  class="btn btn-primary" onclick="printTable()">Print</button>
<br>
<br>


<div id="clientsInfo">
<div style="text-align:center; font-weight: 900;"> {{ session('shipment_dest')}} {{ session('shipment_date')}}</div>

<table  id="recept" class="table">
<thead class="thead-dark">
  <tr style="text-align:center;">
<th>Customer name</th><th>Package number</th><th>Recipient</th><th>Recipient Phone</th><th>Quantity</th><th>description</th> <th></th>
</tr>
</thead>
<tbody>
@foreach($packages as $pack)

<tr style="text-align:center;">
   <td>{{$pack->customer}}</td><td>{{$pack->id}}</td><td>{{$pack->recepient}}</td><td>{{$pack->recpphone}}</td> <td>{{$pack->quantity}}</td> <td>{{$pack->description}}</td>
   <td><a href="{{'/packdetails/'.$pack->id}}" class="details">Details</a></td>
 </tr>


 
@endforeach
</tbody>
</table>

</div>

@endsection


@section('js')

<script>

function printTable(){
  
  window.print();

  
  
}



</script>


@endsection