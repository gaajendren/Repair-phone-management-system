
<div class="modal fade" id="addIssueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New Issue</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
     
        <div class="modal-body">
            <form action="{{ route('issue.store') }}" enctype="multipart/form-data" id="addForm" method="post">
            @csrf

       
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name">
             
            </div>

            <div class="form-group">
                <label for="device">Device</label>
                 <select class=" form-control" id="device" name="device">
                    <option selected>Select device type</option>
                    <option class="form-control" value="Phone">Phone</option>
                    <option class="form-control" value="Laptop">Laptop</option>
                </select>
             
            </div>
            
           
                   
        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" onclick="addForm()" name="submit" class="btn btn-primary">Save changes</button>
          </div>
      </div>
   
      
 
    </div>
</div>
  
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Select JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

  