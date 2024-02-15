<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Lauren Parker Office</title>
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
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                display:flex;
               
                justify-content:center;
                align-items:center;
                height:100vh;
                background:url("https://res.cloudinary.com/edifice-solutions/image/upload/v1699546188/officelp_1_zqspwq.png");
                background-size:cover;
                background-repeat:no-repeat;
                
            }

            .myformdiv{
                min-height: 60vh;;
                background:white;
                border-radius:15px;
            }

            .loginlogo{
                width:32%;
                margin-top:40px;
            }

            .formlabel{
                font-size:14px;
                font-weight: 500;
            }

            .introhead{
                font-size:16px;
                font-weight: 600;

            }

            .forgotlink{
                font-size:13px;
                font-weight: 600;
                color:rgb(42, 100, 163);
            }

            .forgotlink:hover{
                text-decoration: none;
                color:grey;
            }
            

            
            @media screen and (min-width: 768px) and (max-width: 1024px) {
                /* For mobile phones: */
                    .headingoflogin{
                        font-size:20px;
                  
                }

                body{
                    padding-left: 15px;
                    padding-right: 15px;
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
    
    <body id="">



                <div class="col-md-5 myformdiv">

                    <div class="logodiv text-center">
                        <img class="loginlogo" src="https://res.cloudinary.com/edifice-solutions/image/upload/v1699544268/logo_q7gn78.png" >
                     </div>

                     <h4 class="py-3 text-center introhead">Login to your workspace</h4>


                     <form action="{{route('show.office.login.post')}}"method="POST"class="px-3">
                         @csrf

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

                        <div class="form-group">
                            <label class="formlabel">Email Address</label>
                            <input type="email"name="email"class="form-control"required>

                        </div>


                        <div class="form-group">
                            <label class="formlabel">Password</label>
                            <input type="password"name="password"class="form-control"required>

                        </div>

                        <input type="hidden"name="office"value="{{$company->office_name}}"required>

                        <div class=" text-center">

                            <a href="{{ route('password.request') }}" class="forgotlink">Forgot Password</a>

                        </div>


                        <div class="btndiv py-3">
                            <button type="submit" class="btn btn-dark w-100">Go to Dashboard</button>

                        </div>

                     </form>



                 </div>

        
       
      
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
