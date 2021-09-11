<div>

      @if(session()->has('message'))
        <div class="alert alert-primary" role="alert">{{session()->get('message')}}</div>
      @elseif(session()->has('error'))

      <div>{{session()->get('error')}}</div>

      @endif

      @if($errors->any())
          <ul style="list-style: none;">
            @foreach($errors->all() as $error)
            <li class="alert alert-danger" role="alert">{{$error}}</li>
            @endforeach
          </ul>
      @endif()

</div>
