<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Wallstation Complete Online Office</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />

        <style>
        
            /*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

.rounded-lg {
  border-radius: 1rem !important;
}

.text-small {
  font-size: 0.9rem !important;
}

.custom-separator {
  width: 5rem;
  height: 6px;
  border-radius: 1rem;
}

.text-uppercase {
  letter-spacing: 0.2em;
}

/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/

.thesection {
    background:#80B2A6;
 
 
  color: black;
  min-height: 100vh;
}

        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->


        <!-- Navigation-->
        <!-- <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#whychooseus">Why Choose Us</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#aboutus">About Us</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#easyguides">Easy Guides</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger btn"style="background:#FFbF00;color:black;font-weight:bold;" href="{{route('get.office')}}">Get an Office</a></li>
     
                        
                    </ul>
                </div>
            </div>
        </nav> -->

        <!-- End of navigation section --> 
        

        
          <!--start of price listing section -->
        <section class="thesection">
  <div class="container py-5">
@if(session('msg'))
  <div class="alert alert-success text-center">
    <p>{{session('msg')}}</p>
  </div>

@endif

    <div class="mt-5 mb-3"></div>
    <!-- FOR DEMO PURPOSE -->
    <header class="text-center mb-5 text-white">
      <div class="row">
        <div class="col-lg-7 mx-auto">
            @if(session('error'))
                <div class="alert alert-danger text-center">
                    <p>{{session('error')}}</p>
                </div>
            @endif 
          <h1>Workstation Admin Login</h1>


          <form action="{{route('admin.submit.login.form')}}"method="POST">

            @csrf 

            <div class="form-group">

                <label for="">Email Address</label>

                <input type="email"name="email"placeholder="Enter Email Address"class="form-control"style="height:50px;">

            </div>

            <div class="form-group">

            <label for="">Secured Password</label>
            <input type="password"name="password"placeholder="Enter Secured Password"class="form-control"style="height:50px;">

            </div>

            <div class="form-group">
                <button class="px-5 py-2 btn"style="background:#FFbF00;color:black;font-weight:bold;">Login</button>
            </div>
          </form>
        </div>
      </div>
    </header>
    <!-- END -->

       

    <div class="row text-center align-items-end">
</div>
  </div>
</section>

<!-- End of price listing section --> 

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Your Website 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
                <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="{{asset('assets/mail/jqBootstrapValidation.js')}}"></script>
        <script src="{{asset('assets/mail/contact_me.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>
