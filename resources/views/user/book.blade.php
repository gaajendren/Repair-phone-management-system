<!DOCTYPE html>
<html lang="en">

@include('partials/header')

<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

   @include('partials/top_navbar')
   @php $today = date('Y-m-d', strtotime('+1 day')); @endphp

   <div class="container-fluid overflow-hidden my-5 px-lg-0">
    <div class="container quote px-lg-0">
        <div class="row g-0 mx-lg-0">
           <div class="col-lg-1"></div>
            <div class="col-lg-10 quote-text" style="padding-left:0" data-parallax="scroll" data-image-src="img/carousel-1.jpg">
              <div class="d-flex align-items-center justify-content-center">
                <div class="h-100 w-50 px-0 wow fadeIn" data-wow-delay="0.5s">
                    <div class=" bg-white p-4 p-sm-5">
                        <div class="row g-3">
                           <form action="{{route('book.store')}}" method="post">
                            @csrf
                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="date" min="{{$today}}" class="form-control" id="date165" name="date">
                                            <label for="date">Date</label>
                                        </div>
                                    @error('date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-floating">
                                                <input type="time" min="09:00" max="17:00" class="form-control" name="time" id="time156" >
                                                <label for="time">Time</label>
                                            </div>
                                    @error('time')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <select class="form-select"  name="device" id="device1">
                                                <option class="form-select" value="Phone">Phone</option>
                                                <option class="form-select" value="Laptop">Laptop</option>
                                            </select>  
                                            <label for="device">Select Device</label>
                                        </div>  
                                    @error('device')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="brand" id="brand">
                                            <label for="brand">Brand</label>
                                        </div>
                                    @error('brand')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                </div>

                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <div class="form-floating">
                                            <select class="form-select"  name="issues_id" id="issue1">
                                            
                                               <option  value="" disabled>Select Device First</option>
                                               
                                            </select>  
                                            <label for="issue">Select Issues</label>
                                        </div>  
                                    @error('issue')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12 mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="description" placeholder="Descript the issues here" id="description" style="height: 80px"></textarea>
                                        <label for="description">Issues</label>
                                    </div>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-6 m-auto">
                                    <button class="btn btn-primary py-3 px-5" type="submit">Book the service</button>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div> 
            </div> 
            <div class="col-lg-1"></div>
        </div>
    </div>
</div>  




   @include('partials/footer')

  