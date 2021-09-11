@extends('layouts.app')

@section('content')

<div class="container">
<h3>Find shipment</h3>
<p>Search by destination or date </p>
<p>Search by month example : "2020-07" for all shipment in July 2020, or search by date example: "2020-07-20"</p>
<input type="text" name="search" id="search" class="form-control">
<br>
<br>
<table class="table">
<thead>
<tr style="text-align:center;">
<th>Shipment Destination</th>
<th>Shipping date</th>
<th>Sipping status</th>
</tr>
</thead>
<tbody id="table_dis">

</tbody>
</table>

</div>

<script type="application/javascript">

 $(document).ready(function(){

  $('#search').on("keyup", function(){
          $v = $(this).val();
          $.ajax({
              method: 'get',
              url: "{{route('search.ship')}}",
              data: {
                  'search':$v,

              },
              success: function(data){
                 // console.log(data);
                 $('#table_dis').html(data);
              }
          });
  console.log($v);
      });


});

</script>

@endsection
