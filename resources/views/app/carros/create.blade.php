@extends('app.main')

@include('app.carros.nav-bar')


@section('sub-content')



<form action="{{route('carro.store')}}" method="POST" >
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="row"> 



  <div class="col-md-8 form-group">
      <small for="inlineFormInputGroup">Dealer</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-clipboard-list" style="color: #dc3545"></i>
          </div>
        </div>
        <select type="text" class="form-control form-control-sm @if ($errors->any()) {{$errors->has('dealer_id') ? 'is-invalid':'is-valid'}} @endif" id="dealer_id" name="dealer_id" placeholder="Dealer " value="{{ old('dealer_id') }}" required="true">
                     <option value=""  >Select a Dealer</option>

 @foreach(App\Models\Dealer::get() as $dealer)
        <option value="{{$dealer->id}}">{{ $dealer->name }}</option>  @endforeach
          </select>

                   {!! $errors->first('dealer_id','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>



   <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Stock</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-clipboard-list" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm  @if ($errors->any()) {{$errors->has('stock') ? 'is-invalid':'is-valid'}} @endif" id="stock" name="stock" placeholder="Stock " value="{{ old('stock') }}" required="true">
                   {!! $errors->first('stock','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>


<hr>



 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Year</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm  @if ($errors->any()) {{$errors->has('year') ? 'is-invalid':'is-valid'}} @endif" id="year" name="year" placeholder="Year" value="{{ old('year') }}" required="true">
                   {!! $errors->first('year','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>



     <div class="col-md-5 form-group">
      <small for="inlineFormInputGroup">Make</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-clipboard-list" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm  @if ($errors->any()) {{$errors->has('make') ? 'is-invalid':'is-valid'}} @endif" id="make" name="make" placeholder="Make " value="{{ old('make') }}" required="true">
                   {!! $errors->first('make','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>



 <div class="col-md-3 form-group">
      <small for="inlineFormInputGroup">Model </small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-money-check-alt" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm  @if ($errors->any()) {{$errors->has('model') ? 'is-invalid':'is-valid'}} @endif" id="model" name="model" placeholder="Model " value="{{ old('model') }}" required="true">
                   {!! $errors->first('model','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>


 <div class="col-md-4 form-group">
      <small for="inlineFormInputGroup">Vin #</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-tag" style="color: #dc3545"></i>
          </div>
        </div>
        <input type="text" class="form-control form-control-sm  @if ($errors->any()) {{$errors->has('vin') ? 'is-invalid':'is-valid'}} @endif" id="vin" name="vin" placeholder="Vin #" value="{{ old('vin') }}" required="true">     

                   {!! $errors->first('vin','<div class="invalid-feedback">:message        </div>') !!}

      </div> <small for="inlineFormInputGroup">Last 6 digits</small>
  </div>



  <div class="col-md-8 form-group">
      <small for="inlineFormInputGroup">Detailer</small>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text bg-dark"><i class="fa fa-clipboard-list" style="color: #dc3545"></i>
          </div>
        </div>
        <select type="text" class="form-control form-control-sm @if ($errors->any()) {{$errors->has('employee_id') ? 'is-invalid':'is-valid'}} @endif" id="employee_id" name="employee_id" placeholder="Detailer " value="{{ old('employee_id') }}" required="true">
                     <option value=""  >Select a Detailer</option>

 @foreach(App\Models\Employee::get() as $employee)
        <option value="{{$employee->id}}">{{ $employee->name }}</option>  @endforeach
          </select>

                   {!! $errors->first('employee_id','<div class="invalid-feedback">:message        </div>') !!}

      </div>
  </div>



</div>

<div class="form-group float-right">
    <button class="btn btn-md btn-success form-control form-control-sm " type="submit"><i class="fa fa-save"></i> Save</button>
</div>



</form>


@stop

