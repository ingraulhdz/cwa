<div class="modal fade" id="add_expenses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<form>


 <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name_expense" placeholder="Name" required="true">
    </div>
  </div>




  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="description_expense" placeholder="Short Description">
    </div>
  </div>


  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price_expense" placeholder="Cost of the expense" required="true">
    </div>
  </div>


<div class="form-check">
  <input class="form-check-input" type="checkbox" name="exampleRadios" id="is_monthly" value="option1">
  <label class="form-check-label" for="exampleRadios1">
Is Montly?  </label>
</div>
</form>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="create_expense" >Save changes</button>
      </div>
    </div>
  </div>
</div>


