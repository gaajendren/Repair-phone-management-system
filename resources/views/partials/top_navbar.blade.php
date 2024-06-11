<div style="background-color: #2d2b44 !important" class="container-fluid bg-dark text-white-50 py-2 px-0 d-none d-lg-block">
    <div class="row gx-0 align-items-center">
        <div class="col-lg-7 px-5 text-start">
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="fa fa-phone-alt me-2"></small>
                <small>+018 2414 655</small>
            </div>
            <div class="h-100 d-inline-flex align-items-center me-4">
                <small class="far fa-envelope-open me-2"></small>
                <small>gents_tech@example.com</small>
            </div>
        </div>
        <div class="col-lg-5 px-4 ml-auto text-end ">  
            @if (auth()->check())
           
              <div width="width:100px;"  class="dropdown">                
                    <img style="border-radius: 50%; margin-right:30px; cursor: pointer;" class="drop1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" width="40px" height="40px" src="img/icon/icon-logo.jpg" alt=""> 
                <ul  style="background-color: #1e1b35 !important; border-radius: 20px; padding:20px; width:250px;" class="dropdown-menu">
                   <li ><p style="margin-bottom:3px; color:white">{{auth()->user()->name}}</p></li> 
                   <li><p style="color:white">{{auth()->user()->email}}</p></li> 
                  <li><a class="dropdown-item text-light" href="{{ route('profile.edit')}}"><i style="margin-right:5px;" class="fa-solid fa-user" style="color: #ffffff;"></i> Profile</a></li>
                  <li><a class="dropdown-item text-light" href="{{route('book.view')}}"><i  style="margin-right:5px;" class="fa-solid fa-calendar-check" style="color: #ffffff;"></i>Book</a></li>
                  <li><a class="dropdown-item text-light" href="{{route('status.view')}}"><i  style="margin-right:5px;" class="fa-solid fa-list-check" style="color: #ffffff;"></i>Status</a></li>
                  <li><a class="dropdown-item text-light" href="{{route('logout')}}"><i style="margin-right:5px;" class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i>Logout</a></li>
                </ul>
              </div>

            @else
            <a href="{{ route('login') }}" class="btn btn-light bg-primary text-dark btn-custom">Login</a>
            <a href="{{ route('register') }}" class="btn btn-light bg-primary text-dark btn-custom">Register</a>
            @endif
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
    <a href="{{route('dashboard')}}" class="navbar-brand d-flex align-items-center">
        <h1 class="m-0"><img class="img-fluid me-3" src="img/icon/icon_2.jpg" alt="">Gents Tech</h1>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto bg-light pe-4 py-3 py-lg-0">
            <a href="{{route('dashboard')}}" class="nav-item nav-link active">Home</a>
            @if(auth()->check())
            <a href="{{route('book.view')}}" class="nav-item nav-link">Book</a>
            <a href="{{route('status.view')}}" class="nav-item nav-link">Status</a>
            @endif
            <a href="about.html" class="nav-item nav-link">About Us</a>
            <a href="service.html" class="nav-item nav-link">Our Services</a>

           
        </div>
        <div class="h-100 d-lg-inline-flex align-items-center d-none">
            <a class="s btn btn-square rounded-circle bg-light text-primary me-2" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="s btn btn-square rounded-circle bg-light text-primary me-2" href=""><i class="fab fa-twitter"></i></a>
            <a class="s btn btn-square rounded-circle bg-light text-primary me-2" href=""><i class="fab fa-linkedin-in"></i></a>
            <a class="s btn btn-square rounded-circle bg-light text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</nav>