@include ('admin/partials/header')
@include ('admin/partials/sidebar')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    @php
      $err =   ['name', 'device', 'img'];
    @endphp
    @include ('admin/partials/error')
    
<form id="updateForm" enctype="multipart/form-data" action="{{ route('category.update', $category->id) }}" method="post">
    @csrf
    @method('PATCH')

    <div class="mb-1">
       
        <img style="max-width:200px; max-height:150px" src="{{ asset('storage/' . $category->img) }}" alt="category img">
    </div>

    <div class="mb-3">
        <label for="img" class="form-label">Image</label>
        <input type="file" class="form-control" name="img" id="img">
     
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{  $category->name}}">
     
    </div>
   
    <div class="mb-3">
        <label for="device" class="form-label">Device</label>
        <select class="form-control" name="device" id="">
            <option class="form-control" value="Phone" @if( $category->device == 'Phone') selected @endif>Phone</option>
            <option class="form-control" value="Laptop" @if( $category->device == 'Laptop') selected @endif>Laptop</option>
        </select>
       
       
    </div>
   
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@include('admin/partials/footer')
