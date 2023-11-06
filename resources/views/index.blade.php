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
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#whychooseus">Why Choose Us</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#aboutus">About Us</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#easyguides">Easy Guides</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger btn"style="background:#FFbF00;color:black;font-weight:bold;" href="{{route('get.office')}}">Get an Office</a></li>
     
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{asset('assets/img/work.jpeg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{asset('img/first.jpeg')}}" alt="Second slide">
    </div>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        <!-- Services-->
        <section class="page-section" id="whychooseus">
            <div class="container">

                @if(session('error'))
                    <div class="alert alert-danger text-center">
                        <p>{{session('error')}}</p>
                    </div>

                @endif
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Why Choose Wallstations</h2>
                    <h3 class="section-subheading text-muted">This platform is more than just an office space</h3>
                </div>
                <div class="row text-center">
                    <div class="col-lg-3 col-md-4 p-3 col-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-briefcase fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Office Work flow</h4>
                        <p class="text-muted">Strategic and variety of office environment workflow,assign different role to members of staff</p>
                    </div>

                    <div class="col-lg-3 col-md-4 p-3 col-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-network-wired fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Staffs connection</h4>
                        <p class="text-muted">Access to all staffs, management, and overall supervision of works</p>
                    </div>

                    <div class="col-lg-3 col-md-4 p-3 col-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-tasks fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Tasks management</h4>
                        <p class="text-muted">Manage all tasks, completion progress and notifications based on dates of completion</p>
                    </div>

                    <div class="col-lg-3 col-md-4 p-3 col-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-user-shield fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Secured</h4>
                        <p class="text-muted">Secured working enviromnent from both internet theft and low risk of covid 19 </p>
                    </div>

                    <div class="col-lg-3 col-md-4 p-3 col-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-envelope fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Realtime Chat</h4>
                        <p class="text-muted">Realtime Chat one to one chat system for members of the office, and also clients</p>
                    </div>
                    <div class="col-lg-3 col-md-4 p-3 col-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-video fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Video Conference</h4>
                        <p class="text-muted">Schedule video meetings with members of staffs or clients, with screenshots, handraising etc.</p>
                    </div>
                    <div class="col-lg-3 col-md-4 p-3 col-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-file-invoice-dollar fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Invoice Generator</h4>
                        <p class="text-muted">Automatically generate invoice to send to client, which is specifically branded with office/company identities</p>
                    </div>
                    <div class="col-lg-3 col-md-4 p-3 col-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-calendar-week fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Events</h4>
                        <p class="text-muted">Events and calendar, manage events, latest events get notified on new events.</p>
                    </div>

                    <div class="col-lg-3 col-md-4 p-3 col-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-handshake fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Clients Management</h4>
                        <p class="text-muted">Manage your company clients, works for clients and progress</p>
                    </div>

                    <div class="col-lg-3 col-md-4 p-3 col-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-money-bill-wave fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Payment Management</h4>
                        <p class="text-muted">Record and management monthly payments received and overall payments received</p>
                    </div>

                    <div class="col-lg-3 col-md-4 p-3 col-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-money-bill-alt fa-stack-1x fa-inverse"></i>  
                        </span>
                        <h4 class="my-3">Expenses Management</h4>
                        <p class="text-muted">Record and management monthly expenses and overall expenses made</p>
                    </div>

                    <div class="col-lg-3 col-md-4 p-3 col-6">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas fa-calendar-week fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3">Report Generator</h4>
                        <p class="text-muted">Generate weekly reports and export as pdf</p>
                    </div>


                   
                   
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Few Screens from Wallstation</h2>

                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('img/screen1.png')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Complete Workspace</div>
                                <div class="portfolio-caption-subheading text-muted">Everything you need</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('img/screen2.png')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Realtime Chat System</div>
                                <div class="portfolio-caption-subheading text-muted">Send messages and files to members of staff & clients</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('img/screen3.png')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Reliable Task Manager</div>
                                <div class="portfolio-caption-subheading text-muted">Manage all personal and office tasks</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{('img/screen4.png')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Video conferencing</div>
                                <div class="portfolio-caption-subheading text-muted">Easy video meetings with members of staffs /client</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('img/screen5.png')}}" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Payments & Transactions</div>
                                <div class="portfolio-caption-subheading text-muted">Payments, Expenses & invoice management</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/06-thumbnail.jpg" alt="" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Mobile Friendly</div>
                                <div class="portfolio-caption-subheading text-muted">Responsive and friendly user interface</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <!-- About-->
         <section class="page-section" id="aboutus">
            <div class="container">
                <div class="row">

                    <div class="col-md-7 col-12">
                        <h3 class="text-center mb-2">About Us</h3>

                        <p class="text-justify px-2"style="line-height:2.5;">
                        Welcome to workstation.
Workstation is a virtual office space that is dedicated to providing a full fledged office space with top of the industry tools that combine client management, day to day administration activities and a meeting place with works tools on one platform.

Founded in 2020 by our CEO, workspace grew from an idea to solve the problem with remote working to creating a full fledged virtual workspace. We understand that the business workspace has a dynamic and complex nature that is why we have a flexible plan for whatever stage of business you are in.

We are pleased to see you taking the opportunity to expand your business and ease your day to day running of tasks with the fully integrated virtual workstation. We believe that out tools including: expenses management, report generation, office work flow, staff connection, tasks management, secured, real time chat, video conference, invoice generator and events, will be a huge support to achieve your business goals. 

                        </p>
                    </div>

                    <div class="col-md-5 col-12">
                        
                       <h3 class="text-center">Our Missions</h3>
                        <p class="text-justify px-2">We work to help start up companies, organziations achieve their business goals through the provision of the best virtual workspace through collaborative feedback while improving the quality and effectiveness of communication forever. </p>

                        <br>
                        <h3 class="text-center">Our Visions</h3>
                        <p class="text-justify px-2">Workspace aims to be a leading provider of user friendly remote working and virtual office workspace for members of the global workspace</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="easyguides">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Step by Step guide</h2>
                    <h3 class="section-subheading text-muted">Few easy to follow steps to get your office</h3>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('img/visited.png')}}" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                               
                                <h4 class="subheading">Visit our website </h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Visit our website at www.kdkdk.com and click on the button <b>Get An Office</b> at the top right of the home page,</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('img/plann.png')}}" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                
                                <h4 class="subheading">Choose your desired plan</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">We have plans that suits every category of office strength, also you can try it for free and have access the platform for 10 days. Note Plans are based on monthly subscriptions</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('img/form.png')}}" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                
                                <h4 class="subheading">Complete the registration</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Kindly fill the registration form with the correct details, and secured personal details.</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('img/paystack.png')}}" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                
                                <h4 class="subheading">Complete the payment process</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Complete the paystack subscription payment process to make payment for your desired plan(except free)</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="{{asset('img/login.png')}}" alt="" /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                
                                <h4 class="subheading">Congratulations, You office now registered with us</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">You have now successfully registered your office and get access to all our amazing features, to set a higher standards for your office/company. You can access the login section with : <b>https://ourwebsite.com/officename/login</b> </p></div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                    <h3 class="section-subheading text-muted">People behind the wallstations</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{asset('img/boss.jpg')}}" alt="" />
                            <h4>Okechukwu Udeichi</h4>
                            <p class="text-muted">Managing Director/CEO</p>
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{asset('img/lilian.jpg')}}" alt="" />
                            <h4>Lilian Iwundu</h4>
                            <p class="text-muted">Head, Admin/Finance</p>
                           
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{asset('img/buchi.jpg')}}" alt="" />
                            <h4>Maduka Mmaduabuchi</h4>
                            <p class="text-muted">Staff</p>
                            
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{asset('img/law.jpg')}}" alt="" />
                            <h4>Lawrence Gbenga</h4>
                            <p class="text-muted">Staff</p>
                            
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{asset('img/moses.jpg')}}" alt="" />
                            <h4>Moses Olasunkanmi</h4>
                            <p class="text-muted">Staff</p>
                            
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="{{asset('img/bob.jpg')}}" alt="" />
                            <h4>Bobson Edidiong</h4>
                            <p class="text-muted">Lead Developer</p>
                            
                        </div>
                    </div>

                   
                </div>
               
            </div>
        </section>



  
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/envato.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/designmodo.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/themeforest.jpg" alt="" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/creative-market.jpg" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    @if(session('display'))

                        <div class="alert alert-success text-center">
                            <p>{{session('display')}}</p>
                        </div>
                    @endif
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-light">Need further assistance, contact us now..</h3>
                </div>
                <form  action="{{route('sendcontact')}}"method="POST">
                @csrf 
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control"style="height:60px;" id="name" name="name"type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control"style="height:60px;" id="email" type="email"name="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control"style="height:60px;"name="phone" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control"name="message" id="message"placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                       
                      <button class="btn px-3 py-2"style="font-weight:bold;background:#FFbF00;color:black;">Contact Us</button>
                    </div>
                </form>
            </div>
        </section>
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
        <!-- Portfolio Modals-->
        <!-- Modal 1-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                 
                                   
                                    <img class="img-fluid d-block mx-auto" src="{{asset('img/full/screen1.png')}}" alt="" />
                                    <p>Access to complete dashboard with full functions, unique for each role of staffs and clients, to enable easy and fulfilment of all working goals and objectives.</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 2-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                   
                                    
                                    <img class="img-fluid d-block mx-auto" src="{{asset('img/full/screen2.png')}}" alt="" />
                                    <p>Easy to use Full-fledged Realtime Chat System integrated for each members of an office and its clients. It is a realtime secured messaging system where files, audios, videos, documents, zips, images can be shared amongs members. It also has a customizable interfacing for better chatting experience.</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 3-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                  
                                    <img class="img-fluid d-block mx-auto" src="{{asset('img/full/screen3.png')}}" alt="" />
                                    <p>Task Management, to manage and keep track of the progress of all personal tasks, or office based tasks. This will help monitor and rate the working achievement of staffs.</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 4-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                  
                                    <img class="img-fluid d-block mx-auto" src="{{asset('img/full/screen4.png')}}" alt="" />
                                    <p>Schedule a meeting with member(s) of staff and clients to enable a one to one video conferencing, whith options of sharing links, for more to join, screensharing, livechat while video is on, and many more.</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 5-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    
                                    <img class="img-fluid d-block mx-auto" src="{{asset('img/full/screen5.png')}}" alt="" />
                                    <p>Accounting Role, having access to managing received payments, Expenses made monthly and overall, payment invoice generation, and records keeping.</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal 6-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project Details Go Here-->
                                    
                                    <img class="img-fluid d-block mx-auto" src="{{asset('img/mobilefrendly.png')}}" alt="" />
                                    <p>Responsive and mobile friendly interface, for better navigations and routing.</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
