@include ('admin/partials/header')
@include ('admin/partials/sidebar')
 <div class="container-fluid">

    @php
    $err =   ['item_name', 'brand', 'quantity', 'price', 'description'];
  @endphp
@include ('admin/partials/error')
 

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-9" style="display:flex; align-items:center;">
                     <h6 class="m-0 font-weight-bold text-black" >Inventory List</h6> 
                    </div>
                <div class="col-3" style="display:flex; justify-content:flex-end;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addInventoryModal">Add New Inventory</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Brand</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Supplier</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($inventories as $inventory)
                          <tr>
                           
                            <td>{{ $inventory->item_name}}</td>
                            <td>{{ $inventory->brand}}</td>
                            <td>{{ $inventory->quantity}}</td>
                            <td>{{ $inventory->price}}</td>
                            <td>{{ $inventory->category->name}}</td>
                            <td>{{ $inventory->supplier->company_name}}</td>
                            <td>{{ $inventory->description}}</td>
                            <td>
                                <form method="POST" action="{{ route('inventory.delete', $inventory->id) }}" style="display:inline;" accept-charset="UTF-8" >
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark p-1" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                   <i class="fa-solid fa-trash-can fa-sm"></i>
                                    </button>
                                </form>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark p-1" href="{{ route('inventory.edit', $inventory->id) }}"><i class="fa-solid fa-pen-to-square fa-sm"></i></a>    
                            </td>
                          </tr>
                      @endforeach
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


</div>

@include('admin/inventory/add')

<script>
    function addForm(){
   const form = document.getElementById('addForm');


        let isValid = true;
        const inputs = form.querySelectorAll('input');

        inputs.forEach(input => {
            if (input.value.trim() === '') {
                isValid = false; 
                
                input.classList.add('is-invalid');
                const errorDiv = document.createElement('div');
                errorDiv.className = 'text-danger';
                errorDiv.textContent = `${input.previousElementSibling.textContent} is required.`;
                if (!input.nextElementSibling || !input.nextElementSibling.classList.contains('text-danger')) {
                    input.parentNode.appendChild(errorDiv);
                }
            } else {
                input.classList.remove('is-invalid');
                if (input.nextElementSibling && input.nextElementSibling.classList.contains('text-danger')) {
                    input.nextElementSibling.remove();
                }
            }
            
        });

        if (!isValid) {
            event.preventDefault();
        }else{
            form.submit();
        }
    

    console.log(error);
}

</script>


@include('admin/partials/footer')
