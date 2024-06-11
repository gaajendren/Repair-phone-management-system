
<div class="modal fade" id="addInventoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New Inventory</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
     
        <div class="modal-body">
            <form action="{{ route('inventory.store') }}" enctype="multipart/form-data" id="addForm" method="post">
            @csrf
            
                @php
                $form_input = [
                                ['title'=>'Item Name', 'name'=>'item_name', 'type'=>'text'],
                                ['title'=>'Brand', 'name'=>'brand', 'type'=>'text'],
                                ['title'=>'Description', 'name'=>'description', 'type'=>'text'],
                                ['title'=>'Quantity', 'name'=>'quantity', 'type'=>'number'],
                                ['title'=>'Price', 'name'=>'price', 'type'=>'number'],
                                ];
                @endphp


                @foreach ($form_input as  $value)                

                    <div class="mb-3">
                        <label for="{{$value['name']}}" class="form-label">{{$value['title']}}</label>
                        <input type="{{$value['type']}}" class="form-control" name="{{$value['name']}}" id="{{$value['name']}}">
                        @error($value['name'])
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                @endforeach

               <div class="mb-3"><label class="form-label" for="">Supplier</label>
                <select class="form-control" name="supplier_id" id="">
                    @foreach ($suppliers as $item)
                        <option  value="{{$item->id}}">{{$item->company_name}}</option>
                    @endforeach
                </select>
              </div>

               
               <div class="mb-3"><label class="form-label" for="">Category</label>
                <select class="form-control" name="category_id" id="">
                    @foreach ($categories as $item)
                        <option class="form-control" value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
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
