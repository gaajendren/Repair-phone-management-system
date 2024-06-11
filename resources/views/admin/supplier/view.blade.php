@include ('admin/partials/header')
@include ('admin/partials/sidebar')
 <div class="container-fluid">

    @php
    $err =   ['comapny_name', 'email', 'contact'];
  @endphp
@include ('admin/partials/error')
 

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-9" style="display:flex; align-items:center;">
                     <h6 class="m-0 font-weight-bold text-black" >Supplier List</h6> 
                    </div>
                <div class="col-3" style="display:flex; justify-content:flex-end;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addSupplierModal">Add New Supplier</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($suppliers as $supplier)
                          <tr>
                            <td>{{ $supplier->company_name}}</td>
                            <td>{{ $supplier->email}}</td>
                            <td>{{ $supplier->contact}}</td>
                            <td>{{ $supplier->address}}</td>

                            <td>
                                <form method="POST" action="{{ route('supplier.delete', $supplier->id) }}" style="display:inline;" accept-charset="UTF-8" >
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark p-1" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                   <i class="fa-solid fa-trash-can fa-sm"></i>
                                    </button>
                                </form>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark p-1" href="{{ route('supplier.edit', $supplier->id) }}"><i class="fa-solid fa-pen-to-square fa-sm"></i></a>    
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

@include('admin/supplier/add')

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
