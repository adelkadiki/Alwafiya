
@extends('layouts.app')

@section('content')

<a href="/newship" style="margin-left:4%;">Back to shipments list</a>

<table class="table">
<thead class="thead-dark">
  <tr style="text-align:center;">
<th>Customer name</th><th>Phone</th><th>Picked up</th><th>Deliverd</th><th></th>
</tr>
</thead>
<tbody>



@foreach($packages as $pack)
<tr style="text-align:center;">
<form>
   <td>{{$pack->customer}}</td><td>{{$pack->id}}</td>
   <td>Picked up<input  type="checkbox" value="Picked up" /></td>
   <td>Deliverd<input  type="checkbox" value="Deliverd" /></td>
</form>
 </tr>
@endforeach



</tbody>
</table>

@endsection

@section('js')

<script>
$(document).ready(function(){
    $('input:checkbox').click(function() {
        $('input:checkbox').not(this).prop('checked', false);
    });
});
</script>

@endsection
