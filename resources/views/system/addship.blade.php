@extends('layouts.app')

@section('content')
<div class="container">

<x-alert />

<form action="/submitship" method="post">
  @csrf

<div class="form-group">
  <label >Destination</label>

<select class="form-control" name="destination">
  <option value="">Select destination</option>
  <option value="Tripoli" {{ old('destination')=='Tripoli' ? 'selected' : ''  }} >Tripoli</option>
  <option value="Benghazi" {{ old('destination')=='Benghazi' ? 'selected' : ''  }}>Benghazi</option>
</select>

</div>

<div class="form-group">
<label>Date</lable>

  <input class="form-control" type="text" name="date" placeholder="YYYY-MM-DD" id="pick" value="{{old('date')}}" />
</div>

  <input type="submit" value="Submit" class="btn btn-primary">

</form>
<br>

</div>

@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(){


$('#pick').datepicker({ dateFormat: 'yy-mm-dd' });
});

</script>

@endsection
