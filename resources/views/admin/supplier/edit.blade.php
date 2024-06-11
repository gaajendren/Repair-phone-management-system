@include ('admin/partials/header')
@include ('admin/partials/sidebar')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    @php
      $err =   ['name', 'device', 'img'];
    @endphp
    @include ('admin/partials/error')
    
<form id="updateForm" enctype="multipart/form-data" action="{{ route('supplier.update', $supplier->id) }}" method="post">
    @csrf
    @method('PATCH')

   @php
   $form_input = [
                  ['title'=>'Company Name', 'name'=>'company_name', 'type'=>'text'],
                  ['title'=>'Email', 'name'=>'email', 'type'=>'email'],
                  ['title'=>'Contact', 'name'=>'contact', 'type'=>'text'],
                  ['title'=>'Address', 'name'=>'address', 'type'=>'text'],
                ];
   @endphp

   @foreach ($form_input as  $value) 

    <div class="mb-3">
        <label for="{{$value['name']}}" class="form-label">{{$value['title']}}</label>
        <input type="{{$value['type']}}" class="form-control" name="{{$value['name']}}" id="{{$value['name']}}" value="{{ $supplier->{$value['name']} }}">
    </div>
   
   @endforeach
       

   
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@include('admin/partials/footer')
