@extends('layouts.web')

@section('content')
<div class="container">
<!-- <h5 style="margin-top:3%; text-align:center;" >للشحن معنا ، يرجى تزويدنا بالتفاصيل التالية</h5> -->



<!-- warning messages -->
<div id="warnbox">
<div id="costwarn" class="alert alert-danger writing packwarning">يرجى كتابة الأسم بالكامل</div>
<div id="ukidwarn" class="alert alert-danger writing packwarning">يرجى كتابة رقم الهوية البريطانية</div>
<div id="phonewarn" class="alert alert-danger writing packwarning">يرجى كتابة رقم الهاتف</div>
<div id="packnuwarn" class="alert alert-danger writing packwarning">يرجى تحديد عدد الطرود بالأرقام</div>
<div id="contwarn" class="alert alert-danger writing packwarning">يرجى كتابة محتوى الطرد بإختصار</div>
<div id="descwarn" class="alert alert-danger writing packwarning">يرجى تحديد أبعاد الطرد</div>
<div id="wgtwarn" class="alert alert-danger writing packwarning">يرجى كتابة الوزن بالأرقام</div>
<div id="streetwarn" class="alert alert-danger writing packwarning">يرجى كتابة العنوان في بريطانيا</div>
<div id="citywarn" class="alert alert-danger writing packwarning">يرجى كتابة اسم المدينة في بريطانيا</div>
<div id="postcodewarn" class="alert alert-danger writing packwarning">يرجى كتابة الرمز البريدي في بريطانيا</div>
<div id="recepientwarn" class="alert alert-danger writing packwarning">يرجى كتابة إسم المستلم بالكامل</div>
<div id="recpphonewarn" class="alert alert-danger writing packwarning">يرجى كتابة رقم هاتف المستلم</div>
</div>
<!-- warning messages -->

<div class="form-group writing">
<label >وجهة الشحن</label>
<select class="form-control" id="dest"  @if($errors->has('shipment_id')) style="border: 2px solid #e74c3c;" @endif>
  <option value="" >اختر الوجهة </option>
@foreach($shipments as $ship)
  <option value="{{$ship->id}}" {{ old('shipment_id') == $ship->id ? "selected" : "" }}>{{$ship->destination}}  {{$ship->date}}</option>
@endforeach
</select>
</div>



  <div id="direone">
  
<form method="post" action="/submitpack" id="packform">
@csrf


<input type="hidden" name="shipment_id" id="shipid">

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
        <label>رقم الهاتف في بريطانيا </label>
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
            <input type="text" class="form-control " id="recpphone" name="recpphone" value="{{old('recpphone')}}"
            @if($errors->has('recpphone')) style="border: 2px solid #e74c3c;" @endif>
        </div><br>
        <div class="row">
    <div class="col text-center">
<input type="button" value="إرسال" class="btn btn-primary " id="subbtn" style="width:120px;"/>
    </div>
    </div>    

</form>

</div>

<br/>
<!-- </div> -->

<!-- end of form one -->


<div id="diretwo">
  
  <form method="post" action="/submitpack" id="packform1">
  @csrf
  
  <input type="hidden" name="shipment_id" id="shipid1">
  
   <div class="form-group writing">
      <label >الاسم بالكامل</label>
      <input type="text" class="form-control inpwriting pack1" id="customer1" name="customer" value="{{old('customer')}}"
      @if($errors->has('customer')) style="border: 2px solid #e74c3c;" @endif>
  
    </div>
  
    <div class="form-group writing">
        <label >رقم الهوية </label>
        <input type="text" class="form-control pack1" id="custid1" name="custid" value="{{old('custid')}}"
        @if($errors->has('custid')) style="border: 2px solid #e74c3c;" @endif>
      </div>
  
      <div class="form-group writing">
          <label>رقم الهاتف  </label>
          <input type="text" class="form-control pack1" id="phone1" name="phone" value="{{old('phone')}}"
          @if($errors->has('phone')) style="border: 2px solid #e74c3c;" @endif>
        </div>
  
        <div class="form-group writing">
            <label >البريد الإلكتروني</label>
            <input type="text" class="form-control pack1" id="email1" name="email" value="{{old('email')}}"
            @if($errors->has('email')) style="border: 2px solid #e74c3c;" @endif>
          </div>
  
  <div class="form-group writing">
      <label >عدد الطرود</label>
      <input type="text" class="form-control inpwriting pack1" id="quantity1" name="quantity" value="{{old('quantity')}}"
      @if($errors->has('quantity')) style="border: 2px solid #e74c3c;" @endif>
      <small  class="form-text text-muted">عدد الحقائب أو الصناديق المراد شحنها</small>
    </div>
  
    <div class="form-group writing">
        <label > محتوى الشحنة (بإختصار) </label>
        <input type="text" class="form-control inpwriting pack1" id="description1" name="description" value="{{old('description')}}"
        @if($errors->has('description')) style="border: 2px solid #e74c3c;" @endif>
        
      </div>
  
    <div class="form-group writing">
        <label >الأبعاد بالسنتيمتر (حجم الطرد)</label>
        <input type="text" class="form-control inpwriting pack1" id="dimentions1" name="dimentions" value="{{old('dimentions')}}"
        @if($errors->has('dimentions')) style="border: 2px solid #e74c3c;" @endif>
         
      </div>
  
      <div class="form-group writing">
          <label>الوزن الإجمالي بالكيلوجرام</label>
          <input type="text" class="form-control inpwriting pack1" id="weight1" name="weight" value="{{old('weight')}}"
          @if($errors->has('weight')) style="border: 2px solid #e74c3c;" @endif>
        
        </div>
  
  <h6 class="writing" style="font-weight: 900;">العنوان في بريطانيا </h6>
      <div class="form-group writing" >
          <label>رقم المنزل و اسم الشارع</label>
          <input type="text" class="form-control pack1" id="street1" name="street" value="{{old('street')}}"
          @if($errors->has('street')) style="border: 2px solid #e74c3c;" @endif>
          <small  class="text-muted">Home & street address</small>
        </div>
  
        <div class="form-group writing">
            <label >المدينة</label>
            <input type="text" class="form-control pack1" id="city1" name="city" value="{{old('city')}}"
            @if($errors->has('city')) style="border: 2px solid #e74c3c;" @endif>
            <small class="text-muted">City</small>
          </div>
  
          <div class="form-group writing">
              <label >الرمز البريدي</label>
              <input type="text" class="form-control pack1" id="postcode1" name="postcode" value="{{old('postcode')}}"
              @if($errors->has('postcode')) style="border: 2px solid #e74c3c;" @endif>
              <small class="text-muted">Post Code</small>
            </div>
  
          <div class="form-group writing">
              <label >إسم المستلم (في بريطانيا)</label>
                <input type="text" class="form-control inpwriting pack1" id="recepient1" name="recepient" value="{{old('recepient')}}"
                @if($errors->has('recepient')) style="border: 2px solid #e74c3c;" @endif>
          </div>
  
          <div class="form-group writing">
              <label >رقم هاتف المستلم (في بريطانيا)</label>
              <input type="text" class="form-control pack1" id="recpphone1" name="recpphone" value="{{old('recpphone')}}"
              @if($errors->has('recpphone')) style="border: 2px solid #e74c3c;" @endif>
          </div><br>
          <div class="row">
      <div class="col text-center">
  <input type="button" value="إرسال" class="btn btn-primary pack1" id="subbtn1" style="width:120px;"/>
      </div>
      </div>    
  
  </form>
  
  </div>
  
  <br/>
</div>

<!-- end of form two -->
@endsection

@section('js')

<script>
    
    $('#dest').on('change', function() {
  
        removeWarn();
        var fr = $("#dest option:selected").text();
        var dest = $('#dest').val();
        var destin = fr.slice(0, 8);

        $('#shipid').val(dest);
        $('#shipid1').val(dest);
        $('#direone').hide(); 
        $('#diretwo').hide(); 


        if(destin == 'Bradford'){

            $('#diretwo').show(); 
              
        }else {

            $('#direone').show();
        
        }

    
    });

// validation function


function validate(shipid ,customer, custid, phone, quantity, description,
dimentions, weight, street, city, postcode, recepient, 
recpphone, formsub){

    

    if(customer.val()==""){
        $('#costwarn').show();
        customer.addClass('warnclass');
    
    } else if(custid.val()==""){
        $('#ukidwarn').show();
        custid.addClass('warnclass');
    
    }else if(phone.val()==""){
        $('#phonewarn').show();
        phone.addClass('warnclass');
    
    }else if(quantity.val()=="" || isNaN(quantity.val())){
        $('#packnuwarn').show();
        quantity.addClass('warnclass');
    
    }else if(description.val()=="" || description.val().length>50){
        $('#contwarn').show();
        description.addClass('warnclass');
    
    }else if(dimentions.val()==""){
        $('#descwarn').show();
        dimentions.addClass('warnclass');
    
    }else if(weight.val()=="" || isNaN(weight.val())){
        $('#wgtwarn').show();
        weight.addClass('warnclass');
    
    }else if(street.val()==""){
        $('#streetwarn').show();
        street.addClass('warnclass');
    
    }else if(city.val()==""){
        $('#citywarn').show();
        city.addClass('warnclass');
    
    }else if(postcode.val()==""){
        $('#postcodewarn').show();
        postcode.addClass('warnclass');
    
    }else if(recepient.val()=="" || recepient.val().length<7 || recepient.val().length>35){
        $('#recepientwarn').show();
        recepient.addClass('warnclass');
    
    }else if(recpphone.val()==""){
        $('#recpphonewarn').show();
        recpphone.addClass('warnclass');
    
    }

    else {
        formsub.submit();
       // alert($('#recepient').val().length);
    }


}

// remove warning function

function removeWarn(){

    var warn = document.getElementById('warnbox');
    var warns = warn.children;
    
    for (var i=0; i<warns.length; i++) {
        warns[i].style.display = 'none';
    }
    
    
    const forms = document.querySelectorAll('form');
    const form = forms[0];

    Array.from(form.elements).forEach((input) => {
         input.classList.remove("warnclass");
    });

}

// form submitting
$('#subbtn').click(function(){

    removeWarn();

    validate($('#shipid').val(), $('#customer'),$('#custid'),
    $('#phone'), $('#quantity'), $('#description'),
    $('#dimentions'), $('#weight'), $('#street'), 
    $('#city'), $('#postcode'), $('#recepient'), 
    $('#recpphone'), $('#packform'));
    
    
});
    

$('#subbtn1').click(function(){

    var warn = document.getElementById('warnbox');
    var warns = warn.children;
    
    for (var i=0; i<warns.length; i++) {
        warns[i].style.display = 'none';
    }
    
    
    const forms = document.querySelectorAll('#packform1');
    const form = forms[0];

    Array.from(form.elements).forEach((input) => {
         input.classList.remove("warnclass");
    });


    validate($('#shipid1'), $('#customer1'),$('#custid1'),
    $('#phone1'), $('#quantity1'), $('#description1'),
    $('#dimentions1'), $('#weight1'), $('#street1'), 
    $('#city1'), $('#postcode1'), $('#recepient1'), 
    $('#recpphone1'), $('#packform1'));

}); 

</script>

@endsection