@include ('admin/partials/header')
@include ('admin/partials/sidebar')

 <!-- Begin Page Content -->
 <div class="container-fluid">

    @php
    $err =   ['user_id', 'date', 'time', 'device', 'description', 'brand', 'status'];
    @endphp
    @include ('admin/partials/error')
    
<form id="updateForm" enctype="multipart/form-data" action="{{ route('booking.update', $booking->id) }}" method="post">
    @csrf
    @method('PATCH')


    @php
    $form_input = [
        ['type' => 'input', 'title' => 'Date', 'name' => 'date', 'input_type' => 'date'],
        ['type' => 'input', 'title' => 'Time', 'name' => 'time', 'input_type' => 'time'],
        ['type' => 'select', 'title' => 'Device', 'name' => 'device', 'value' => ['Phone', 'Laptop']],
        ['type' => 'input', 'title' => 'Brand', 'name' => 'brand', 'input_type' => 'text'],
        ['type' => 'input', 'title' => 'Description', 'name' => 'description', 'input_type' => 'text'],
        ['type' => 'select', 'title' => 'Status', 'name' => 'status', 'value' =>  ['Pending', 'Hand Over', 'Inspection', 'Repairing', 'Collect', 'Completed', 'Cancelled']],
        ['type' => 'input', 'title' => 'Price', 'name' => 'price', 'input_type' => 'number'],
    ];
    @endphp
    

    <div class="form-group">
        <label for="user_name">Customer Name</label>
         <select class="selectpicker form-control" id="user_id" data-live-search="true" name="user_id">
            <option selected>Select customer name</option>
            @foreach ($rows as $row) 
                <option class="form-control" value="{{$row->id}}"  data-tokens="{{ $row->name }}" @if($row->id == $booking->user_id) selected @endif>{{ $row->name }}</option>
            @endforeach
        </select>
     
    </div>
    
    @foreach ($form_input as $input)
        @if($input['type'] === 'select')
         @if ($input['name'] === 'device')
                       
                    <div class="form-group">
                        <label for="deviceSelect">Select Device</label>
                        <select class="form-control" name="device" id="deviceSelect">
                            <option value="" disabled>Select a device</option>
                            <option value="Laptop"  @if($booking->device == 'Laptop') selected @endif>Laptop</option>
                            <option value="Phone" @if($booking->device == 'Phone') selected @endif>Phone</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="issueSelect">Select Issue</label>
                        <select class="form-control" name="issues_id" id="issueSelect">
                            <option value="" disabled>Select a device first</option>
                            @foreach ($issue as $item)
                            <option value="{{ $item['id'] }}" @if($item['id'] == $booking->issues_id) selected @endif>{{ $item['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                 
            @else
            <div class="mb-3">
                <label class="form-label" for="{{ $input['name'] }}">{{ $input['title'] }}</label>
                <select class="form-control" name="{{ $input['name'] }}" id="{{ $input['name'] }}">
                    @foreach ($input['value'] as $item)
                        <option value="{{ $item }}" @if($item == $booking->{$input['name']}) selected @endif>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            @endif
          
        @else
            <div class="mb-3">
                <label for="{{ $input['name'] }}" class="form-label">{{ $input['title'] }}</label>
                <input type="{{ $input['input_type'] }}" class="form-control" name="{{ $input['name'] }}" id="{{ $input['name'] }}" value="{{ $booking->{$input['name']} }}">
                @error($input['name'])
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        @endif
    @endforeach
      

   
    <button type="submit" class="btn btn-primary">Update</button>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Select JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

    <script>

    $(document).ready(function() {
   
    $('#user_id').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
      
        var selectedValue = $(this).val();
        
        $(this).closest('.bootstrap-select').find('select').val(selectedValue);
    });

    $('.selectpicker').selectpicker();
});


$(document).ready(function() {
            $('#deviceSelect').change(function() {
                var selectedDevice = $(this).val();
                
                if (selectedDevice) {
                    $.ajax({
                        url: '{{ route("fetch.issues") }}',
                        type: 'GET',
                        data: { device: selectedDevice },
                        success: function(data) {
                            console.log('Received data:', data);
                            $('#issueSelect').empty();
                            $('#issueSelect').append('<option value="">Select Issue</option>');
                            data.forEach(function(issue) {
                                $('#issueSelect').append('<option value="' + issue.id + '">' + issue.name + '</option>'); // Modify issue_name to name
                            });
                        },

                            error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                            console.error('Response:', xhr.responseText);
                            alert('Error fetching issues. Check console for details.');
                        }
                        
                    });
                } else {
                    $('#issueSelect').empty();
                    $('#issueSelect').append('<option value="">Select a device first</option>');
                }
            });
    });


</script>
@include('admin/partials/footer')
