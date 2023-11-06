<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>QuickOffice</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
        <style>
            .loginbutton{
               background:#FFbF00;
               font-size:25px;
               font-weight:bold;
               color:black;
            }
            .headingoflogin{
                background:#FFbF00;
                color:black;
                font-weight:bold;
                
            }
            body{
                overflow-y:scroll;
            }
            

            
            @media screen and (min-width: 768px) and (max-width: 1024px) {
                /* For mobile phones: */
                    .headingoflogin{
                        font-size:20px;
                  
                }
            }


            @media screen and (min-width: 375px) and (max-width: 812px) {
                /* For mobile phones: */
                    .headingoflogin{
                        font-size:20px;
                  
                }
            }

            @media screen and (min-width: 320px) and (max-width: 568px) {
                /* For mobile phones: */
                    .headingoflogin{
                        font-size:15px;
                  
                }
            }
        </style>
    </head>
    
    <body id="page-top">
        <!-- Navigation-->
        
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <form action="{{route('show.office.login.post')}}"method="POST"class="col-md-8 m-auto">
                    @if(session('error'))
                        <div class="alert alert-danger text-center">
                            <p>{{session('error')}}</p>
                        </div>

                    @endif

                    @if(session('success'))
                        <div class="alert alert-success text-center">
                            <p>{{session('success')}}</p>
                        </div>
                    @endif 
                    <h3 class="text-center py-3 rounded headingoflogin my-2">Login To {{$company->office_name}} Section</h3>
                    @csrf

                    <input type="email"name="email"placeholder="Enter Email Address"class="form-control"style="height:80px;"required>
                        <br>
                    <input type="password"name="password"placeholder="Enter Password"class="form-control"style="height:80px;"required>
                    <br>
                   

                    <input type="hidden"name="office"value="{{$company->office_name}}"required>


                     

                    <div class="row">
                        <div class="col-6">
                        <button class="loginbutton btn  px-5 py-2 mt-5">Login</button>
                        </div>

                        <div class="col-6">
                        <a href="/" class="loginbutton btn  px-5 py-2 mt-5">Home</a>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="col-md-6 m-auto">
                            <a href="{{ route('password.request') }}"class="font-weight-bold py-2 px-2"style="background:#FFbF00;font-style:italic;color:black;text-decoration:none;">Forgot Password</a>
                        </div>
                    </div>

                  
                 


                </form>
            </div>
        </header>
       
      
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="/assets/mail/jqBootstrapValidation.js"></script>
        <script src="/assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
    </body>
</html>
