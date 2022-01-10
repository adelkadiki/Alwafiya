@extends('layouts.web')

@section('content')
<div class="container" style="height:80%;">
<br>
<br>
<br>
<br>
@if(session()->has('message'))
<div class="alert alert-primary writing" role="alert">{{session()->get('message')}}</div>
@endif

@if($errors->any())
<div class="alert alert-danger writing">يرجى كتابة رقم الطرد</div>
@endif

<h5 class="writing">الرجاء إدخال رقم تتبع الشحنة الخاصة بك</h5>

<form method="get" action="/trackpack">
  @csrf
<div class="">
<input type="text" name="id" class="form-control"/>
</div>
<input type="submit" value="إرسال" class="btn btn-primary"  style="margin-top:4%; width:25%; margin-left:35%;" />
</from>

</div>
@endsection
