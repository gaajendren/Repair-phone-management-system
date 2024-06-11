<!DOCTYPE html>
<html lang="en">

@include('partials/header')

<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

   @include('partials/top_navbar')
   <div class="title mt-4 d-flex align-items-center justify-content-center">
    <h2 class="text-align-center" >Booking Status</h2>
 </div>
   @foreach ($booking as $book)
       
  
   <div class="row mb-4 mt-5">
    <div class="col-10 m-auto" >
        <div class="card">
            <div class="card-body">

            <div class="row d-flex align-items-center m-auto">
                   
               
                    <div class="col-md-1 m-auto">
                        <p style="text-muted small">Details: </p>
                    </div>
                    
                    
                    <div class="col-md-2">
                        <p>Date: {{$book->date}}</p>
                    </div>
                    <div class="col-md-2 pl-0 pr-0">
                        <p>Time: {{$book->time}}</p>
                    </div>
                    <div class="col-md-2 ">
                        <p>Device: {{$book->device}}</p>
                    </div>
                    
                    <div class="col-md-2 ">
                        <p>Issue : {{$book->issues->name}}</p>
                    </div>

                    <div class="col-md-2 ">
                       <p>Price : {{ $book->price === null ? 'Uncertain' : 'RM ' . $book->price }}</p>
                 
                    </div>

                    <div class="col-md-1 ">
                        @if($book->status == 'Pending')
                         <form method="POST" action="{{ route('user.booking.delete', $book->id) }}" style="display:inline;" accept-charset="UTF-8" >
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm(&quot;Confirm Cancel Order?&quot;)">
                             Cancel 
                            </button>
                        </form>
                        @endif
                     </div>
                   
                    </div>
            <hr>
                       @php
                      
                        if($book->status == 'Pending'){
                            $width = '8%';
                        }elseif($book->status  == 'Hand Over'){
                            $width = '23%';
                        }else if($book->status  == 'Inspection'){
                            $width = '38%';
                        }elseif($book->status  == 'Repairing'){
                            $width = '53%';
                        }elseif($book->status  == 'Collect'){
                            $width = '67%';
                        }elseif($book->status  == 'Completed'){
                            $width = '100%';
                        }elseif($book->status  == 'Cancelled'){
                            $width = '100%';
                        }else{
                            $width = '100%';
                        } 
                        @endphp

                    <div class="row d-flex align-items-center m-auto">
                        <div class="col-md-1 m-auto">
                            <p class="text-muted mb-0 small">Track Order</p>
                        </div>
                        <div class="col-md-11 m-auto">
                            <div class="progress" style="height: 6px; border-radius: 16px;">
                                <div class="progress-bar  {{ $book->status == 'Cancelled' ? 'bg-danger' : ($book->status == 'Completed' || $book->status == 'Collect' ? 'bg-success' : 'bg-primary') }} role="progressbar"
                                    style="width:{{ $width }}; border-radius: 16px;" aria-valuenow="100"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                                
                            <div class="d-flex justify-content-between mb-1">
                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Pending</p>
                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Hand Over</p>
                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Inspection</p>
                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Repairing</p>
                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Collect</p>
                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Completed</p>
                                <p class="text-muted mt-1 mb-0 small ms-xl-5">Cancelled</p>
                            </div>
                        </div>
                    </div>           
            </div>
        </div>
    </div>
</div>
@endforeach

  
   @include('partials/footer')

  