    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6">
                    <h1 class="text-white mb-4"><img width="50px" height="50px" class="img-fluid me-3" src="img/icon/icon_2.jpg" alt="">Gents Tech</h1>
                  
                </div>
                <div class="col-md-6">
                    <h5 class="text-light mb-4">Newsletter</h5>
                   
                    <div class="position-relative">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Get In Touch</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>UTHM, Batu Pahat, Johor</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+018 2414 655</p>
                    <p><i class="fa fa-envelope me-3"></i>gents_tech@example.com</p>
                </div>
               
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-light mb-4">Follow Us</h5>
                    <div class="d-flex">
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    
<script>
   const picker = document.getElementById('date165');
picker.addEventListener('input', function(e){
  var day = new Date(this.value).getUTCDay();
  if([6,0].includes(day)){
    e.preventDefault();
    this.value = '';
    alert('Weekends not allowed');
  }
});

document.getElementById('time156').addEventListener('change', function(event) {
            let time = event.target.value;
            let hours = parseInt(time.split(':')[0]);
            let minutes = parseInt(time.split(':')[1]);

            if (hours < 8 || (hours >= 17 && minutes > 0)) {
                alert('Please select a time between 8 a.m. and 5 p.m.');
                event.target.value = '';
            }
        });

        $(document).ready(function() {
    $('#device1').change(function() {
        var selectedDevice = $(this).val();
        
        if (selectedDevice) {
            $.ajax({
                url: '{{ route("fetch.issues") }}',
                type: 'GET',
                data: { device: selectedDevice },
                success: function(data) {
                    console.log('Received data:', data);
                    $('#issue1').empty();
                    $('#issue1').append('<option value="">Select Issue</option>');
                    data.forEach(function(issue) {
                        $('#issue1').append('<option value="' + issue.id + '">' + issue.name + '</option>'); // Modify issue_name to name
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
</body>

</html>
