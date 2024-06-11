@include ('admin/partials/header')

@include ('admin/partials/sidebar')
 <div class="container-fluid">

    @php
    $err =   ['user_id', 'date', 'time', 'device', 'description', 'brand', 'status'];
  @endphp
@include ('admin/partials/error')
 

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-9" style="display:flex; align-items:center;">
                     <h6 class="m-0 font-weight-bold text-black" >Booking List</h6> 
                    </div>
                <div class="col-3" style="display:flex; justify-content:flex-end;">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addBookingModal">Add New booking</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Contact</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Device</th>
                            <th>Issue</th>
                            <th>Brand</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($bookings as $booking)
                          <tr>
                            
                            <td>{{ $booking->user->name}}</td>
                            <td>{{ $booking->user->contact}}</td>
                            <td>{{ $booking->date}}</td>
                            <td>{{ $booking->time}}</td>              
                            <td>{{ $booking->device}}</td>
                            <td>{{ $booking->issues->name}}</td>
                            <td>{{ $booking->brand}}</td>
                            <td>{{ $booking->description}}</td>
                            <td>{{ $booking->price}}</td>
                            <td>{{ $booking->status}}</td>
                            <td >
                                <div class="d-flex align-items-center">
                            
                                <form method="POST" action="{{ route('booking.delete', $booking->id) }}" style="display:inline;" accept-charset="UTF-8" >
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark p-1" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                   <i class="fa-solid fa-trash-can fa-sm"></i>
                                    </button>
                                </form>
                                    <a class="btn btn-datatable btn-icon btn-transparent-dark p-1" href="{{ route('booking.edit', $booking->id) }}"><i class="fa-solid fa-pen-to-square fa-sm"></i></a>     </div> 
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

@include('admin/booking/add')

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
