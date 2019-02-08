@extends('main')
@section('head', '- Dealers')



@section('content')




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


