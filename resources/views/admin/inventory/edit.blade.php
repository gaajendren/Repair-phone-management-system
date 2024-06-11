@include ('admin/partials/header')
@include ('admin/partials/sidebar')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    @php
      $err =   ['name', 'device', 'img'];
    @endphp
    @include ('admin/partials/error')
    
<form id="updateForm" enctype="multipart/form-data" action="{{ route('inventory.update', $inventory->id) }}" method="post">
    @csrf
    @method('PATCH')

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
            <input type="{{$value['type']}}" class="form-control" name="{{$value['name']}}" value="{{ $inventory->{$value['name']} }}" id="{{$value['name']}}">
            @error($value['name'])
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
    @endforeach

   <div class="mb-3"><label class="form-label" for="">Supplier</label>
    <select class="form-control" name="supplier_id" id="">
        @foreach ($suppliers as $item)
            <option class="form-control" value="{{$item->id}}" @if($inventory->supplier->company_name === $item->company_name) ? selected : "" @endif >{{$item->company_name}}</option>
        @endforeach
    </select>
  </div>

   
   <div class="mb-3"><label class="form-label" for="">Category</label>
    <select class="form-control" name="category_id" id="">
        @foreach ($categories as $item)
            <option class="form-control" value="{{$item->id}}" @if($inventory->category->name === $item->name) ? selected : "" @endif >{{$item->name}}</option>
        @endforeach
    </select>
  </div>


   
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@include('admin/partials/footer')
