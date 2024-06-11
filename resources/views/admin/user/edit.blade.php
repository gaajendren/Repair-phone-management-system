@include ('admin/partials/header')
@include ('admin/partials/sidebar')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    @include ('admin/partials/error')
    
<form id="updateForm" action="{{ route('user.update', $user->id) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="{{  $user->name}}">
     
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" value="{{  $user->email }}">
      
    </div>
    <div class="mb-3">
        <label for="contact" class="form-label">Contact Number</label>
        <input type="text" class="form-control" name="contact" id="contact" placeholder="Your Phone Number" value="{{ $user->contact }}">
     
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Your Address" value="{{  $user->address }} ">
       
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select class="form-control" name="role" id="role">
            <option value="1" {{$user->role == '1' ? 'selected' : ''}}>Admin</option>
            <option value="0" {{$user->role == '0' ? 'selected' : ''}}>User</option>
        </select>
       
    </div>
   
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@include('admin/partials/footer')
