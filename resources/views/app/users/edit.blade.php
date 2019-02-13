@extends('app.main')

@include('app.users.nav-bar')

@section('sub-content')



<form action="{{route('user.update', $user)}}" method="POST" >

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $user->id }}">

<div class="row"> 



   <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup"> Email</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('email') ? 'is-invalid':'is-valid'}} @endif" id="email" name="email" placeholder="Enter your email address" value="{{ $user->email}}" required="true">
                   {!! $errors->first('email','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>

   

</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-warning form-control" type="submit"><i class="fa fa-sync-alt"></i> update</button>
</div>



</form>


@stop

