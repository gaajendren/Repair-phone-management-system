@include ('admin/partials/header')
@include ('admin/partials/sidebar')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    @include ('admin/partials/error')
 


   
    

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-9" style="display:flex; align-items:center;">
                     <h6 class="m-0 font-weight-bold text-black" >User List</h6> 
                    </div>
                <div class="col-3" style="display:flex; justify-content:flex-end;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">Add New User</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                          <tr>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->contact}}</td>
                            <td>{{ $user->address}}</td>
                            <td>{{ $user->role == "1" ? 'Admin' : 'User'}}</td>
                            <td>
                                <form method="POST" action="{{ route('user.delete', $user->id) }}" style="display:inline;" accept-charset="UTF-8" >
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark p-1" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                   <i class="fa-solid fa-trash-can fa-sm"></i>
                                    </button>
                                </form>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark p-1" href="{{ route('user.edit', $user->id) }}"><i class="fa-solid fa-pen-to-square fa-sm"></i></a>
                               
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


<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
     
        <div class="modal-body">
            <form action="{{ route('user.store') }}" id="addForm" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="{{ old('name') }}">
               
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="text" class="form-control" name="contact" id="contact" placeholder="Your Phone Number" value="{{ old('contact') }}">
                @error('contact')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Your Address" value="{{ old('address') }}">
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                @error('password_confirmation')
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
