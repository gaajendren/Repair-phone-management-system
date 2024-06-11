
<div class="modal fade" id="addBookingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New Booking</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
     
        <div class="modal-body">
            <form action="{{ route('booking.store') }}" enctype="multipart/form-data" id="addForm" method="post">
            @csrf

        
            @php
            $form_input = [
                ['type' => 'input', 'title' => 'Date', 'name' => 'date', 'input_type' => 'date'],
                ['type' => 'input', 'title' => 'Time', 'name' => 'time', 'input_type' => 'time'],
                ['type' => 'select', 'title' => 'Device', 'name' => 'device', 'options' => ['Phone', 'Laptop']],
                ['type' => 'input', 'title' => 'Brand', 'name' => 'brand', 'input_type' => 'text'],
                ['type' => 'input', 'title' => 'Description', 'name' => 'description', 'input_type' => 'text'],
                ['type' => 'select', 'title' => 'Status', 'name' => 'status', 'options' => ['Pending', 'Hand Over', 'Inspection', 'Repairing', 'Collect', 'Completed', 'Cancelled']]
            ];
            @endphp
            
            <div class="form-group">
                <label for="user_name">Customer Name</label>
                 <select class="selectpicker form-control" id="user_id" data-live-search="true" name="user_id">
                    <option selected>Select customer name</option>
                    @foreach ($rows as $row) 
                        <option class="form-control" data-tokens="{{ $row->name }}" value="{{ $row->id }}">{{ $row->name }}</option>
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
                                    <option value="Laptop">Laptop</option>
                                    <option value="Phone">Phone</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="issueSelect">Select Issue</label>
                                <select class="form-control" name="issues_id" id="issueSelect">
                                    <option value="" disabled>Select a device first</option>
                                </select>
                            </div>
                        
                    @else
                    <div class="mb-3">
                        <label class="form-label" for="{{ $input['name'] }}">{{ $input['title'] }}</label>
                        <select class="form-control" name="{{ $input['name'] }}" id="{{ $input['name'] }}">
                            @foreach ($input['options'] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                  
                @else
                    <div class="mb-3">
                        <label for="{{ $input['name'] }}" class="form-label">{{ $input['title'] }}</label>
                        <input type="{{ $input['input_type'] }}" class="form-control" name="{{ $input['name'] }}" id="{{ $input['name'] }}">
                        @error($input['name'])
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                @endif
            @endforeach
                   
        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" onclick="addForm()" name="submit" class="btn btn-primary">Save changes</button>
          </div>
      </div>
   
      
 
    </div>
</div>
  
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Select JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>

    <script>

    $(document).ready(function() {
    // Listen for changes in the selectpicker value
    $('#user_id').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
        // Get the selected value from the selectpicker
        var selectedValue = $(this).val();
        // Update the value of the original select element
        $(this).closest('.bootstrap-select').find('select').val(selectedValue);
    });

    // Initialize the selectpicker plugin
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