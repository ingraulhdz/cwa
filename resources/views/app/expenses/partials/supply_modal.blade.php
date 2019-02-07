<div class="modal fade" id="add_supplys" tabindex="-1" role="dialog" aria-labelledby="SupplyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SupplyModalLabel">Add Supply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<form>
  
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
 <select id="supply_id" name="supply_id" class="form-control form-control-sm" ">
                        <option value=""  >Select an expense</option>

 @foreach(App\Models\Supply::get() as $key)
        <option value="{{$key->id}}" >{{ $key->name }}</option>

        @endforeach

          </select>  


 <select id="supply_id_measure" hidden="true">

 @foreach(App\Models\Supply::get() as $key)
        <option value="{{$key->id}}" >{{ $key->measure }}</option>

        @endforeach

          </select>  






            </div>
  </div>


 <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Amount</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="amount_supply" placeholder="Amount" value="0" required="true" onkeyup="validacion();">
                                  <small class="d-none" id="measure">R</small>

    </div>
  </div>


      <input type="number"  id="unit_price"  hidden="true">


  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Total</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="total_supply" value="0" disabled="true">
    </div>
  </div>



</form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="create_supply" >Save changes</button>
      </div>
    </div>
  </div>
</div>


