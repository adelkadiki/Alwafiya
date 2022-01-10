<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Alwafiya</title>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
    <script
			  src="https://code.jquery.com/jquery-3.5.1.js"
			  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
			  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="/css/web.css" />
  </head>



  <body>
    {{-- navbar --}}

    <nav class="navbar navbar-expand-lg navbar-light "  style="background-color: #ffffff ;">
    
        <a class="navbar-brand" href="/"><img src="/images/logo3.jpg"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="/">الرئيسية </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/addpack">إشحن معنا</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/track">تتبع شحنة</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#contact">Contact us</a>
            </li> -->


          </ul>
        </div>
      </nav>

    {{-- navbar --}}

@yield('content')

<div class="dark" id="buttom">
           <div><a href="#page-top" style="text-decoration:none; color:  #929b97;">Ship with us</a>-<a href="contact.html" style="text-decoration:none; color:#929b97;">Track package</a></div>


       <footer style="font-size: 11px; color:#929b97;">Copyright &copy; 2021 Alwafiya</footer>
   </div>
  </body>


@yield('js')
</html>
