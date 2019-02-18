@extends('app.main')

@include('app.users.nav-bar')


@section('sub-content')



<form action="{{route('user.store')}}" method="POST" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="employee_id" value="" id="employee_id">

<div class="row"> 



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Email</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>

        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('email') ? 'is-invalid':'is-valid'}} @endif" id="email_old" name="email_old" placeholder="Enter your email address"  required="true" disabled="true" autofocus>
                   {!! $errors->first('email','<div class="invalid-feedback">:message        </div>') !!}
        <input type="hidden" id="email" name="email"      >

      </div>
  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Username</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>

        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('username') ? 'is-invalid':'is-valid'}} @endif" id="username" name="username" placeholder="Enter your username address"  required="true" >
                   {!! $errors->first('username','<div class="invalid-feedback">:message        </div>') !!}
        <input type="hidden" id="username" name="username"      >

      </div>
  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Password</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="password" class="form-control @if ($errors->any()) {{$errors->has('password') ? 'is-invalid':'is-valid'}} @endif" id="password" name="password" placeholder="Enter your password address" value="{{ old('password') }}" required="true" >
                   {!! $errors->first('password','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>





</div>


 <div class=" row d-none" id="employee_data">
 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('name') ? 'is-invalid':'is-valid'}} @endif" id="name" name="name" placeholder="Enter your name address" value="{{ old('name') }}"  required="true" disabled="true">
                   {!! $errors->first('name','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Type of Employee</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('rol') ? 'is-invalid':'is-valid'}} @endif" id="rol" name="rol" placeholder="Enter your rol address" value="{{ old('rol') }}" required="true" disabled="true">
                   {!! $errors->first('rol','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>






</div>
<div class="form-group float-right">
    <button class="btn btn-md btn-success form-control" type="submit"><i class="fa fa-save"></i> Save</button>
</div>



</form>


@stop
@section('js')
<script type="text/javascript">
  $(document).ready( function () {
    $("#bar_search_user").removeClass("d-none");

  });
  $("#employee").change(function(){
    $("#employee_data").removeClass("d-none");
$("#employee_id").val($("#employee").val());

    $.ajax({
      url: '/getEmployee',
      type: 'get',
      data: {
        id: $("#employee").val(),
        email: $("#email").val()

      },
      success: function(data){
        console.log(data.email);
$("#email_old").val(data.employee.email);
$("#email").val(data.employee.email);
$("#name").val(data.employee.name+ ' ' +data.employee.last_name);
$("#rol").val(data.rol);
$("#password").focus();;

      },
      error: function(data){
        alert();
      }
    })
});
</script>
@stop

