

@extends('app.employees.main')
@section('subtitle', '/ ')
@section('sub-content')

<form action="{{route('employee.update', $employee)}}" method="POST"  enctype= "multipart/form-data">

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $employee->id }}">



<div class="row">
<div class="col-md-2">
<img src="/img/employees/{{$employee->img()}}" class="rounded-circle float-left" width="100px" height="100px">

  </div>

  <div class="col-md-5">
<label class="float-center" style="font-size: 30px">{{$employee->fullName()}} </label >
<br><span class="text-muted">{{$employee->rol->name}}</span>

  </div>

<div class="col-md-3">
<img src="/img/logos/magictouch.jpg"  width="100%" height="100%">




</div>
</div>
 <hr>

<div class="row"> 


  <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">First Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('name') ? 'is-invalid':'is-valid'}} @endif" id="name" name="name" placeholder="Fist Name" value="{{ $employee->name}}" required="true">
                   {!! $errors->first('name','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>




  <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Last Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-users" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('last_name') ? 'is-invalid':'is-valid'}} @endif" id="last_name" name="last_name" placeholder="Fist Name" value="{{ $employee->last_name }}" required="true">
                   {!! $errors->first('last_name','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>


 <div class="col-md-4 form-group {{ $errors->has('email') ? 'has-error' :' ' }}">
      <small for="inlineFormInputGroup">E-mail</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{ $errors->has('email') ? 'is-invalid' :'is-valid ' }} @endif " id="email" name="email" placeholder="Ex: dealer@mail.com" value="{{ $employee->email }}" required="true">
           {!! $errors->first('email','<div class="invalid-feedback">:message        </div>') !!}
      </div>
  </div>

      



 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Phone</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-phone" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('phone') ? 'is-invalid':'is-valid'}} @endif " id="phone" name="phone" placeholder="10 digits" value="{{ $employee->phone }}" required="true">
                   {!! $errors->first('phone','<div class="invalid-feedback">:message        </div>') !!}

      </div>

  </div>




 <div class="col-md-5 form-group">
      <small for="inlineFormInputGroup">Address</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-road" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('address') ? 'is-invalid':'is-valid'}} @endif" id="address" name="address" placeholder="Street number  and street name" value="{{ $employee->address }}" required="true">
       
                   {!! $errors->first('address','<div class="invalid-feedback">:message        </div>') !!}

      </div>
      </div>



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">City</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-place-of-worship" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control @if ($errors->any()) {{$errors->has('coty') ? 'is-invalid':'is-valid'}} @endif" id="city" name="city" placeholder="Location City" value="{{ $employee->city }}" required="true">
       
                   {!! $errors->first('coty','<div class="invalid-feedback">:message        </div>') !!}

      </div>
      
  </div>


 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Zip code</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="number" class="form-control @if ($errors->any()) {{$errors->has('zip_code') ? 'is-invalid':'is-valid'}} @endif" id="zip_code" name="zip_code" placeholder="5 digits zip code" value="{{ $employee->zip_code }}" required="true">
                       {!! $errors->first('zip_code','<div class="invalid-feedback">:message        </div>') !!}

      
      </div>
</div>



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Tipe of Employee</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <select class="form-control @if ($errors->any()) {{$errors->has('rol_id') ? 'is-invalid':'is-valid'}} @endif" id="zip_code" name="rol_id" placeholder="5 digits zip code" value="{{ $employee->rol_id }}" >
           <option value="">Select type of Employee</option>
           @foreach(App\Models\Rol::get() as $rol)
        <option value='{{ $rol->id }}' >{{ $rol->name }}</option>
        @endforeach
        </select>
                       {!! $errors->first('rol_id','<div class="invalid-feedback">:message        </div>') !!}

      
      </div>
</div>




 <div class="col-md-5 form-group">
     <small for="inlineFormInputGroup">Photo</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-camera" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="file" class="form-control" id="photo" name="photo" placeholder="10 digits phone" value="{{ $employee->photo}}">
      
      </div>
  </div>






</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-success form-control" type="submit"><i class="fa fa-save"></i> Save</button>
</div>



</form>


@stop

