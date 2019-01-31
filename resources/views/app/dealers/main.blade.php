@extends('main')
@section('head', '- Dealers')



@section('content')


@if(Session::has('message'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    {{ Session::get('message') }}
  </div>
@endif
@if(Session::has('error'))
  <div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    {{ Session::get('error') }}
  
  </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<div class="card border-danger">

     <div class="card-header  bg-dark border-danger">
              @include('app.dealers.nav-bar',['title' => 'Dealers'])
     </div>
           
     <div class="card-body">
                    @yield('sub-content')

     </div>

    <div class="card-footer small text-muted bg-dark ">
      <font class="float-left" style="color: white"> Updated yesterday at 11:59 PM</font>

    </div>

</div>


@endsection


