@extends('layouts.web')

@section('content')
<div class="container">
<h5 style="margin-top:3%; text-align:center;" >للشحن معنا ، يرجى تزويدنا بالتفاصيل التالية</h5>


<!-- Error message -->
@if($errors->has('shipment_id'))
    <div class="alert alert-danger writing">يرجى تحديد وجهة الشحن</div>
@endif
@if($errors->has('customer'))
    <div class="alert alert-danger writing">يرجى كتابة الأسم بالكامل</div>
@endif
@if($errors->has('custid'))
    <div class="alert alert-danger writing">يرجى كتابة رقم الهوية البريطانية</div>
@endif
@if($errors->has('phone'))
    <div class="alert alert-danger writing">يرجى كتابة رقم الهاتف</div>
@endif
@if($errors->has('quantity'))
    <div class="alert alert-danger writing">يرجى تحديد عدد الطرود</div>
@endif
@if($errors->has('description'))
    <div class="alert alert-danger writing">يرجى كتابة محتوى الطرد</div>
@endif
@if($errors->has('dimentions'))
    <div class="alert alert-danger writing">يرجى تحديد أبعاد الطرد</div>
@endif
@if($errors->has('weight'))
    <div class="alert alert-danger writing">الوزن بالأرقام فقط بدون كتابة حروف</div>
@endif
@if($errors->has('street'))
    <div class="alert alert-danger writing">يرجى كتابة العنوان بالكامل</div>
@endif
@if($errors->has('city'))
    <div class="alert alert-danger writing">يرجى كتابة إسم المدينة</div>
@endif
@if($errors->has('postcode'))
    <div class="alert alert-danger writing">يرجى كتابة الرمز البريدي</div>
@endif
@if($errors->has('recepient'))
    <div class="alert alert-danger writing">يرجى كتابة إسم المستلم</div>
@endif
@if($errors->has('recpphone'))
    <div class="alert alert-danger writing">يرجى كتابة رقم هاتف المستلم</div>
@endif
<!-- Error message -->
<form method="post" action="/submitpack">
@csrf

<div class="form-group writing">
<label >وجهة الشحن</label>
<select class="form-control" name="shipment_id" @if($errors->has('shipment_id')) style="border: 2px solid #e74c3c;" @endif>
  <option value="" >اختر الوجهة </option>
@foreach($shipments as $ship)
<option value="{{$ship->id}}" {{ old('shipment_id') == $ship->id ? "selected" : "" }}>{{$ship->destination}}  {{$ship->date}}</option>
@endforeach
</select>
</div>
 <div class="form-group writing">
    <label >الاسم بالكامل</label>
    <input type="text" class="form-control inpwriting" id="customer" name="customer" value="{{old('customer')}}"
    @if($errors->has('customer')) style="border: 2px solid #e74c3c;" @endif>

  </div>

  <div class="form-group writing">
      <label >رقم الهوية البريطانية</label>
      <input type="text" class="form-control" id="custid" name="custid" value="{{old('custid')}}"
      @if($errors->has('custid')) style="border: 2px solid #e74c3c;" @endif>
    </div>

    <div class="form-group writing">
        <label >رقم الهاتف في بريطانيا </label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}"
        @if($errors->has('phone')) style="border: 2px solid #e74c3c;" @endif>
      </div>

      <div class="form-group writing">
          <label >البريد الإلكتروني</label>
          <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}"
          @if($errors->has('email')) style="border: 2px solid #e74c3c;" @endif>
        </div>

<div class="form-group writing">
    <label >عدد الطرود</label>
    <input type="text" class="form-control inpwriting" id="quantity" name="quantity" value="{{old('quantity')}}"
    @if($errors->has('quantity')) style="border: 2px solid #e74c3c;" @endif>
    <small  class="form-text text-muted">عدد الحقائب أو الصناديق المراد شحنها</small>
  </div>

  <div class="form-group writing">
      <label > محتوى الشحنة (بإختصار) </label>
      <input type="text" class="form-control inpwriting" id="description" name="description" value="{{old('description')}}"
      @if($errors->has('description')) style="border: 2px solid #e74c3c;" @endif>
      <!-- <small  class="form-text text-muted">Breif description of the package contents</small> -->
    </div>

  <div class="form-group writing">
      <label >الأبعاد بالسنتيمتر (حجم الطرد)</label>
      <input type="text" class="form-control inpwriting" id="dimentions" name="dimentions" value="{{old('dimentions')}}"
      @if($errors->has('dimentions')) style="border: 2px solid #e74c3c;" @endif>
        <small  class="form-text text-muted">مثلاً : 50 * 70 * 120</small>
    </div>

    <div class="form-group writing">
        <label>الوزن الإجمالي بالكيلوجرام</label>
        <input type="text" class="form-control inpwriting" id="weight" name="weight" value="{{old('weight')}}"
        @if($errors->has('weight')) style="border: 2px solid #e74c3c;" @endif>
          <!-- <small  class="form-text text-muted">Weight in numbers like 30 or 30.5</small> -->
      </div>

<h6>UK address : </h6>
    <div class="form-group" >
        <label >Home number and street</label>
        <input type="text" class="form-control" id="street" name="street" value="{{old('street')}}"
        @if($errors->has('street')) style="border: 2px solid #e74c3c;" @endif>
      </div>

      <div class="form-group">
          <label >City</label>
          <input type="text" class="form-control" id="city" name="city" value="{{old('city')}}"
          @if($errors->has('city')) style="border: 2px solid #e74c3c;" @endif>
        </div>

        <div class="form-group">
            <label >Post code</label>
            <input type="text" class="form-control" id="postcode" name="postcode" value="{{old('postcode')}}"
            @if($errors->has('postcode')) style="border: 2px solid #e74c3c;" @endif>
          </div>

        <div class="form-group writing">
            <label >إسم المستلم (فى طرابلس أو بنغازي)</label>
              <input type="text" class="form-control inpwriting" id="recepient" name="recepient" value="{{old('recepient')}}"
              @if($errors->has('recepient')) style="border: 2px solid #e74c3c;" @endif>
        </div>

        <div class="form-group writing">
            <label >رقم هاتف المستلم</label>
            <input type="text" class="form-control" id="recpphone" name="recpphone" value="{{old('recpphone')}}"
            @if($errors->has('recpphone')) style="border: 2px solid #e74c3c;" @endif>
        </div><br>
        <div class="row">
    <div class="col text-center">
<input type="submit" value="إرسال" class="btn btn-primary" style="width:120px;"/>
    </div>
    </div>    

</form>
<br/>
</div>
@endsection
