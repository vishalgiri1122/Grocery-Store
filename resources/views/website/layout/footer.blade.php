  <!-- Footer Start -->
  <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-6 col-md-12 mb-5 pr-3 pr-xl-5">
            <a href="{{ asset('/') }}" class="text-decoration-none">
                <!--<h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Shopper</h1>-->
                <img src="{{ asset('assets/website/img/grocery_logo.png') }}" alt="logo" height="160"/>
            </a>
            <!--<p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>-->
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>138 Albert Street, Brisbane, Australia</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>brisbane@grocery.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+610451821784</p>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="row">
                <!--<div class="col-md-4 mb-5">-->
                <!--    <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>-->
                <!--    <div class="d-flex flex-column justify-content-start">-->
                <!--        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>-->
                <!--        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>-->
                <!--        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>-->
                <!--        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>-->
                <!--        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>-->
                <!--        <a class="text-dark" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="col-md-4 mb-5">-->
                <!--    <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>-->
                <!--    <div class="d-flex flex-column justify-content-start">-->
                <!--        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>-->
                <!--        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>-->
                <!--        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>-->
                <!--        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>-->
                <!--        <a class="text-dark mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>-->
                <!--        <a class="text-dark" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-md-12 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                required="required" />
                        </div>
                        <div>
                            <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-dark">
                &copy; <a class="text-dark font-weight-semi-bold" href="#">BrisbaneGrocery</a>. All Rights Reserved. Designed
                by
                <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="img/payments.png" alt="">
        </div>
    </div>
</div>
 <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/website/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/website/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('assets/website/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('assets/website/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/website/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
    console.log("Document is ready!");
    @if(Session::has('success'))
        console.log("Success message is present!");
        setTimeout(function() {
            console.log("Fading out...");
            $('#success-alert').fadeOut('slow');
        }, 5000); // 5 seconds
    @endif
});

    </script>
</body>

</html>
