
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
     
        <div class="modal-body">
            <form action="{{ route('category.store') }}" enctype="multipart/form-data" id="addForm" method="post">
            @csrf

            <div class="mb-3">
                <label for="img" class="form-label">Image</label>
                <input type="file" class="form-control" name="img" id="img">
                @error('img')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}">
               
            </div>
            <div class="mb-3">
                <label for="device" class="form-label">Device</label>
                <select class="form-control" name="device" id="">
                    <option class="form-control" value="Phone">Phone</option>
                    <option class="form-control" value="Laptop">Laptop</option>
                </select>
                
                @error('device')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
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
