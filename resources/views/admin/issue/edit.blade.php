@include ('admin/partials/header')
@include ('admin/partials/sidebar')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    @php
    $err =   ['name', 'device'];
    @endphp
    @include ('admin/partials/error')
    
  <form id="updateForm" enctype="multipart/form-data" action="{{ route('issue.update', $issue->id) }}" method="post">
    @csrf
    @method('PATCH')


  
    <div class="form-group">
        <label for="name">Name</label>
         <input type="text" class="form-control" value="{{$issue->name}}" id="name"  name="name">
    </div>

    <div class="form-group">
        <label for="device">Select Device</label>
         <select class="form-control" id="device"  name="device">
            <option value="Phone" @if($issue->device === 'Phone') selected @endif>Phone</option>
            <option value="Laptop" @if($issue->device === 'Laptop') selected @endif>Laptop</option>
         </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>

</form>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Select JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

@include('admin/partials/footer')
