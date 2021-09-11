@extends('layouts.web')

@section('content')

<div id="bg">

</div>
<div class="container">
<div id="sec1" class="section" >
  <h5 style="text-align:center; font-weight:550; margin-bottom:2%;">من نحن</h5>
<p style="text-align: right; margin-bottom: 4%;" >
نحن شركة مقرها المملكة المتحدة ولدينا خبرة طويلة في مجال الشحن الدولي والخدمات اللوجستية ، وسعرنا منافس بكفاءة عالية في التعامل مع عملائنا وإرسال الشحنات وتسليمها في الوقت المحدد ، وخدماتنا في جميع مدن المملكة المتحدة ، ونوفر نظامًا إلكترونيًا للعملاء يمكن التقدم بطلب للحصول على الخدمة وتتبع شحناتهم من خلال موقعنا ، مما يجعل شركتنا أكثر تميزًا من غيرها

</p>
<h5 style="text-align:center; font-weight:550; margin-bottom:2%;">اشحن معنا </h5>
<p style="text-align: right; margin-bottom: 4%;">
للشحن معنا اضغط على الرابط واملأ الاستمارة على الإنترنت للحصول على جميع المعلومات اللازمة التي ستساعدنا في ترتيب جمع الشحنة وشحنها ، ستساعدنا جميع المعلومات المقدمة على التأكد من وصول شحنتك شحنها بشكل صحيح وتسليمها سليمة دون تأخير 
</p>
</div>

<div style="text-align:right;">
<x-alert />
</div>


<div id="contact" style="margin-top:7%;">

  <div class="row">

    <div class="col-md-6" style=" padding-left:7%; padding-right:4%;">
    </p>
    <h5 style="text-align:center; font-weight:550; margin-bottom:10%;">اتصل بنا </h5>
    <p>
      <p style="text-align:center;" >لأي استفسار يمكنك الاتصال على الرقم المذكور أدناه أو مراسلتنا عبر البريد الإلكتروني عن طريق ملء نموذج الاتصال.</p>
      <p style="text-align:center;">للحصول على مزيد من المعلومات حول بعض المواد التي قد تكون محظورة وفقًا للوائح المحلية أو العالمية  يرجى الاتصال بنا </p>
      <p style="font-weight:600; text-align:center;">  07429140099 : هاتف </p>
    </div>

      <div class="col-md-6">
        <form method="post" action="/contact">
          @csrf
          <div class="form-group" style="text-align: right;">
              <label>الاسم </label>
              <input type="text" name="name" class="form-control" value="{{ old('name')}}" style="direction: rtl;" />
          </div>
          <div class="form-group" style="text-align: right;">
              <label>البريد الإلكتروني </label>
              <input type="text" name="email" class="form-control" value="{{ old('email')}}" />
          </div>
          <div class="form-group" style="text-align: right;">
              <label>الرسالة</label>
              <textarea class="form-control"  name="message" rows="8" cols="80" style="direction: rtl;"></textarea>
          </div>
          <div class="form-group">
              <input type="submit" value="إرسال" class="form-control" value="{{ old('message')}}" style="background-color:#336b87; color:white;" />
          </div>
        </form>
      </div>
  </div>
</div>
</div>

@endsection
