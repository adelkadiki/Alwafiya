@extends('layouts.app')

@section('content')
<div class="container">
<div style="margin-top:3%;"></div>
<h3 class="menu" style="background-color:#021c1e;"><a href="/addship" style="color:white;">Add shipment</a></h3>
<h3 class="menu" style="background-color:#1e434c;"><a href="/newship" style="color:white;">Launched shipments</a></h3>
<h3 class="menu" style="background-color:#9b4f0f;"><a href="/departure" style="color:white;">Departed shipments</a></h3>
<h3 class="menu" style="background-color:#c99e10;"><a href="/arrivedship" style="color:white;">Arrived shipments</a></h3>
<h3 class="menu" style="background-color:#336b87;"><a href="/findpack" style="color:white;">Find Package</a></h3>
<h3 class="menu" style="background-color:#598234;"><a href="/findship" style="color:white;">Find shipment</a></h3>
<h3 class="menu" style="background-color:#003b46;"><a href="/archived" style="color:white;">Archived shipments</a></h3>

</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function(){

$('#dv').on('click', function(){
  console.log('line ....');
});

});

</script>
@endsection
