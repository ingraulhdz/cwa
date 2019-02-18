@extends('app.main')

@include('app.users.nav-bar')

@section('sub-content')



<form action="{{route('user.update', $user)}}" method="POST" >

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $user->id }}">

<div class="row"> 



   <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup"> Email</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="hidden" id="email" name="email" value="{{$user->email}}">
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('email') ? 'is-invalid':'is-valid'}} @endif" id="email2" name="email2" placeholder="Enter your email address" value="{{ $user->email}}" required="true" disabled="true">
                   {!! $errors->first('email','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>

 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Username</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>

        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('username') ? 'is-invalid':'is-valid'}} @endif" id="username" name="username" placeholder="Enter your username address"  required="true"  value="{{ $user->username}}">
                   {!! $errors->first('username','<div class="invalid-feedback">:message        </div>') !!}
        <input type="hidden" id="username" name="username"      >

      </div>
  </div>


 <div class="col-md-3 form-group" id="pwd-btn">
      <small for="inlineFormInputGroup">.</small>
      <div class="input-group mb-2">
        
<div class="input-group-prepend">
        <a href="#" class="btn btn-primary btn-sm"> Change Password</a href="#">       

      </div>
  </div>






    <div class="col-md-6 form-group d-none pwd">
      <small for="inlineFormInputGroup"> password</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="password" class="form-control" id="password1" name="password1" placeholder="Enter your password address" required="true">
                   {!! $errors->first('password','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>

    <div class="col-md-6 form-group d-none pwd">
      <small for="inlineFormInputGroup"> Password again</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="password" class="form-control " id="password2" name="password2" placeholder="Enter your password address" required="true" onkeyup="validacion();">
                  <sapn class="" id="pwd_msj">  </sapn>

      </div>
  </div>

   

</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-warning form-control" type="submit"><i class="fa fa-sync-alt"></i> update</button>
</div>



</form>


@stop
@section('js')
<script type="text/javascript">
  $("#pwd-btn").click( function () {
  $(".pwd").removeClass("d-none");
  })

function validacion(){

$("#password1").val();
$("#password2").val();
if($("#password1").val() == $("#password2").val() )
{

$("#password1").val();
$("#password1").addClass('is-valid');
$("#password2").addClass('is-valid');
$("#pwd_msj").html('Passwords match').addClass('text-success');
$("#pwd_msj").removeClass('text-danger');

}else{$("#pwd_msj").removeClass('text-success');

  $("#pwd_msj").html('Passwords does not match').addClass('text-danger');

  $("#password1").removeClass('is-valid');

$("#password2").removeClass('is-valid');
$("#password2").addClass('is-valid');

}


}

</script>
@stop

