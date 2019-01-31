

@extends('app.employees.main')
@section('subtitle', '/ Edit')
@section('sub-content')

<form action="{{route('employee.update', $employee)}}" method="POST"  enctype= "multipart/form-data">

<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="id" value="{{ $employee->id }}">
<img src="/img/employees/{{$employee->img()}}" class="rounded-circle float-left" width="100px" height="100px">
<h1 class="float-center">{{$employee->fullName()}} </h1 >
<br><span>{{$employee->rol->name}}</span>
<hr>




<div class="row"> 



  <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">First Name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-user" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="name" name="name" placeholder="Employee name" value="{{$employee->name}}" required="true">
      </div>
  </div>



  <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Last name</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-users" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Employee last name" value="{{ $employee->last_name }}" required="true">
      </div>
  </div>



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">E-mail</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-at" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="email" name="email" placeholder="Ex: employee@mail.com" value="{{ $employee->email}}" required="true">
      </div>
  </div>


 <div class="col-md-2 form-group">
      <small for="inlineFormInputGroup">Phone</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-phone" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="10 digits" value="{{ $employee->phone }}" required="true">
      </div>

  </div>





 <div class="col-md-6 form-group">
      <small for="inlineFormInputGroup">Address</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-road" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="address" name="address" placeholder="Street number  and street name" value="{{ $employee->address }}" required="true">
      </div>
      </div>



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">City</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-place-of-worship" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control" id="city" name="city" placeholder="Location City" value="{{ $employee->city }}" required="true">
      </div>
      
  </div>


 <div class="col-md-2 form-group">
      <small for="inlineFormInputGroup">Zip code</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-mail-bulk" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="number" class="form-control" id="zip_code" name="zip_code" placeholder="5 digits zip code" value="{{ $employee->zip_code }}" required="true">
      
      </div>
</div>





 <div class="col-md-4 form-group">
     <small for="inlineFormInputGroup">Rol</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-people-carry" style="color: #dc3545"></i>
          </div>
        </div>

<select class="form-control" name="rol_id">
  <option>Select a Rol</option>
  @foreach(App\Models\Rol::get() as $rol)
        <option value='{{ $rol->id }}' @if($rol->id == $employee->rol_id) selected @endif>{{ $rol->name }}</option>
        @endforeach
</select>
      </div>
  </div>


 <div class="col-md-3 form-group">
     <small for="inlineFormInputGroup">Photo</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-camera" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="file" class="form-control" id="photo" name="photo" placeholder="10 digits phone" value="{{ old('photo') }}">
      </div>
  </div>






</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-success form-control" type="submit"><i class="fa fa-save"></i> Save</button>
</div>



</form>


@stop

