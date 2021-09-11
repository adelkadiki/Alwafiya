@extends('layouts.app')

@section('content')

<div class="container">

<input type="text" name="search" id="search" class="form-control">
<br>
<br>
<table class="table">
<thead>
<tr style="text-align:center;">
<th>Full name</th>
<th>Packge number</th>
<th></th>
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
              url: "{{route('search.pack')}}",
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
