
<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
           
            <div class="modal-header  bg-dark text-danger"> 
                <h4 class="modal-title"></h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
           </div>
         

         <div class="modal-body">

          
                     @include('app.cars.mostrar')
                     @include('app.cars.editar')
                     @include('app.cars.create')
                     @include('app.cars.setEmployee')

          </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-modal" id="btn-modal" data-dismiss="modal">
<i class="fa " id="fa-btn-modal"></i> <label id="btn-txt"></label>          </button>
        </div>
      
       </div>
    </div>
</div>