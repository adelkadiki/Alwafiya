@extends('layouts.app')

@section('content')

<div class="container">


<x-alert />
<a href="{{'/packdetails/'.$package->id}}"><button class="btn btn-secondary" style="margin-left:35%; width:20%;">Cancel</button></a>
<form method="post" class="table" action="/packupdate">

  @csrf
 @method('put')

<input type="hidden" name="id" value="{{$package->id}}" />

  <div class="form-group">
   <label >Full name</label>
   <input type="text" class="form-control" id="customer" name="customer" value="{{$package->customer}}"
   @if($errors->has('customer')) style="border: 2px solid #e74c3c;" @endif>
  </div>

    <div class="form-group">
     <label >UK Phone number</label>
     <input type="text" class="form-control" id="phone" name="phone" value="{{$package->phone}}"
     @if($errors->has('phone')) style="border: 2px solid #e74c3c;" @endif>
    </div>

    <div class="form-group">
       <label >Email</label>
       <input type="text" class="form-control" id="email" name="email" value="{{$package->email}}"
       @if($errors->has('email')) style="border: 2px solid #e74c3c;" @endif>
     </div>

     <div class="form-group">
         <label >Number of packages</label>
         <input type="text" class="form-control" id="quantity" name="quantity" value="{{$package->quantity}}"
         @if($errors->has('quantity')) style="border: 2px solid #e74c3c;" @endif>
     </div>

     <div class="form-group">
         <label > Contents brief description </label>
         <input type="text" class="form-control" id="description" name="description" value="{{$package->description}}"
         @if($errors->has('description')) style="border: 2px solid #e74c3c;" @endif>
       </div>

       <div class="form-group">
           <label >Dimentions in cm</label>
           <input type="text" class="form-control" id="dimentions" name="dimentions" value="{{$package->dimentions}}"
           @if($errors->has('dimentions')) style="border: 2px solid #e74c3c;" @endif>
             <small  class="form-text text-muted">High X Wide X Long, example: 70 X 40 X 50 or 70-40-50</small>
         </div>

         <div class="form-group">
             <label>weight</label>
             <input type="text" class="form-control" id="weight" name="weight" value="{{$package->weight}}"
             @if($errors->has('weight')) style="border: 2px solid #e74c3c;" @endif>
               <small  class="form-text text-muted">Weight for each package</small>
           </div>

           <h6>UK address : </h6>
               <div class="form-group">
                   <label >Street</label>
                   <input type="text" class="form-control" id="street" name="street" value="{{$package->street}}"
                   @if($errors->has('street')) style="border: 2px solid #e74c3c;" @endif>
                 </div>

                 <div class="form-group">
                     <label >City</label>
                     <input type="text" class="form-control" id="city" name="city" value="{{$package->city}}"
                     @if($errors->has('city')) style="border: 2px solid #e74c3c;" @endif>
                   </div>

                   <div class="form-group">
                       <label >Post code</label>
                       <input type="text" class="form-control" id="postcode" name="postcode" value="{{$package->postcode}}"
                       @if($errors->has('postcode')) style="border: 2px solid #e74c3c;" @endif>
                     </div>

                     <div class="form-group">
                         <label >Recepient name</label>
                           <input type="text" class="form-control" id="recepient" name="recepient" value="{{$package->recepient}}"
                           @if($errors->has('recepient')) style="border: 2px solid #e74c3c;" @endif>
                     </div>

                     <div class="form-group">
                         <label >Recepient phone number</label>
                         <input type="text" class="form-control" id="recpphone" name="recpphone" value="{{$package->recpphone}}"
                         @if($errors->has('recpphone')) style="border: 2px solid #e74c3c;" @endif>
                     </div>

                     <div class="form-group">
                       <lable>Packge status</label>
                     <select class="form-control" name="status">
                       <option value="Request" @if($package->status=='Request' or $package->status=='Launched') selected @endif >Request</option>
                       <option value="Departed" @if($package->status=='Departed') selected @endif >Departed</option>
                          <option value="Arrived" @if($package->status=='Arrived') selected @endif >Arrived</option>
                       <option value="Delivered" @if($package->status=='Delivered') selected @endif >Delivered</option>
                     </select>
                   </div>

                   <input type="submit" value="Submit" class="btn btn-primary" style="width:20%;"/>
</form>


<br>
<br>


</div>

{{-- Delete form --}}

<form style=" display:none; border-width:5px; height:270px; position:relative;
border-style:solid;" id="frm" method="post" action="{{'/deletepack/'.$package->id}}">
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
        Are you sure you want to delete this package
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="delbtn">Delete</button>
      </div>
    </div>
  </div>
</div>

<button type="button"  data-toggle="modal" data-target="#exampleModal"
class="btn btn-danger" style="width:20%; margin-left:45%;">
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
