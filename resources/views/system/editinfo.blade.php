@extends('layouts.app')

@section('content')

<x-alert />


<div class="container">

<h5>{{$shipments->destination}}</h5><h5>{{$shipments->date}}</h5>

<form  action="/updshipstatus" method="post">

  @csrf
  @method('put')

<input type="hidden"  name="id" value="{{$shipments->id}}" />


<select name="status" class="form-control">
<option value="Launched" @if($shipments->status=='Launched') selected @endif >Launched</option>
<option value="Departed" @if($shipments->status=='Departed') selected @endif>Departed</option>
<option value="Arrived" @if($shipments->status=='Arrived') selected @endif>Arrived</option>


</select>
<br/>
<input type="submit" value="Submit" class="btn btn-primary" />
</form>

</div>

{{-- Delete form --}}

<form style=" display:none; border-width:5px; height:270px; position:relative;
border-style:solid;" id="frm" method="post" action="{{'/deleteship/'.$shipments->id}}">
@csrf
@method('delete')
<!-- <input type="submit" value="Delete" class="btn btn-danger"/> -->
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this shipment ? All packages in this shipment will be deleted 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delbtn">Delete</button>
      </div>
    </div>
  </div>
</div>

<button type="button"  data-toggle="modal" data-target="#exampleModal"
class="btn btn-danger" style="width:12%; margin-left:40%; margin-top:33%;">
  Delete
</button>

<script type="text/javascript">


$(document).ready(function(){

  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});
$( "#delbtn" ).click(function() {
  $( "#frm" ).submit();
});
});


</script>

@endsection
