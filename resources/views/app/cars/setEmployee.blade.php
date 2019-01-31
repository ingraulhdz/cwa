<div id="setEmployee" style="display: none;">
	<h1>employee</h1>
	 <div class="col-md-12 form-group">
      <small for="inlineFormInputGroup">Detailer</small>
      <div class="input-group mb-2">
       
  <select id="create_employee_id" name="employee_id" class="form-control form-control-sm selectpicker " name="employee_id" data-live-search="true">   
  <option value="">Select detailer</option>
 

@foreach(App\Models\Employee::get() as $employee)
<option value='{{ $employee->id }}' >{{ $employee->name }}</option>
@endforeach
</select>
      </div>
  </div>

</div>