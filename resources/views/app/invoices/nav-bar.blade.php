<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/invoice">Invoices   @yield('subtitle')</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
      <li class="nav-item">
      <a class="nav-link" href="{{ url()->previous() }}">
        <button class="lead btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-arrow-left"></i> Back</button>
        </a>
      </li>
 
  <li class="nav-item">
        <a class="nav-link" href="{{route('invoice.index')}}">
                <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-home"></i> Main </button></a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{url('invoice.view')}}">
                <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-envelope-open"></i> Open </button></a>
      </li>


  <li class="nav-item">
        <a class="nav-link" href="{{url('invoice.paid')}}">
                <button class="btn btn-md btn-xs btn-outline-danger" type="button"><i class="fa fa-envelope"></i> Close</button></a>
      </li>


    

    </ul>     

    <form class="form-inline my-2 my-lg-0" action="{{ route('invoice.create') }}" method="GET">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

   <div class="input-group">
    <select class="form-control border border-danger" name="id" value="{{ old('dealer_id') }}" required="true">
         <option value="">Select a Customer</option>
       
   


         @foreach(App\Models\Dealer::hasInvoice()->get() as $dealer)
       
        <option value='{{ $dealer->id }}' >{{ $dealer->name }}</option>
        @endforeach



        </select>  


                <div class="input-group-append">
            <button class="btn btn-outline-danger" type="submit">
              <i class="fas fa-eye"></i> View
            </button>
          </div>
        </div>

    </form>














  </div>
</nav>

