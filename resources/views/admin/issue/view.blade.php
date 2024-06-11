@include ('admin/partials/header')

@include ('admin/partials/sidebar')
 <div class="container-fluid">

    @php
    $err =   ['name', 'device'];
  @endphp
@include ('admin/partials/error')
 

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-9" style="display:flex; align-items:center;">
                     <h6 class="m-0 font-weight-bold text-black" >Issue List</h6> 
                    </div>
                <div class="col-3" style="display:flex; justify-content:flex-end;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addIssueModal">Add New Issue</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Device</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($issues as $issue)
                          <tr>
                            
                            <td>{{ $issue->name}}</td>
                            <td>{{ $issue->device}}</td>
            
                            <td >
                                <div class="d-flex align-items-center">
                            
                                <form method="POST" action="{{ route('issue.delete', $issue->id) }}" style="display:inline;" accept-charset="UTF-8" >
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark p-1" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                   <i class="fa-solid fa-trash-can fa-sm"></i>
                                    </button>
                                </form>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark p-1" href="{{ route('issue.edit', $issue->id) }}"><i class="fa-solid fa-pen-to-square fa-sm"></i></a></div> 
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

@include('admin/issue/add')

<script>
    function addForm(){
   const form = document.getElementById('addForm');


        let isValid = true;
        const inputs = form.querySelectorAll('input');

        inputs.forEach(input => {
           
            if (!input.closest('.bootstrap-select') && input.value.trim() === '') {
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
