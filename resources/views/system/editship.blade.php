@extends('layouts.app')

@section('content')

<div class="container">


<form action="/shipedit" method="post">
  @csrf
  @method('put')


  <div class="form-group">
     <label >Shipping date</label>
     <input type="text" class="form-control" id="pick" name="date" value="{{$shipment->date}}"/>
   </div>

   <input type="hidden" name="id" value="{{$shipment->id}}" />

<input type="submit" value="Submit" class="btn btn-success" />
 </div>
</form>
<br/>
<a href="/editinfo" style="margin-left:35%;"><button style="width:30%;" class="btn btn-primary">Cancel</button></a>
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){


$('#pick').datepicker({ dateFormat: 'yy-mm-dd' });
});

</script>

@endsection
