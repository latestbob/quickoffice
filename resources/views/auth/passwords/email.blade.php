<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>QuickOffice Reset Password</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
   
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('Arsha/assets/css/style.css')}}" rel="stylesheet">

  
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
                min-height: 50vh;;
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

 <h4 class="py-3 text-center introhead">Verify your email to retrieve your password</h4>


 <form action="{{ route('password.email') }}"method="POST"class="px-3">

 @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
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
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>


   

    

    


    <div class="btndiv py-3">
        <button type="submit" class="btn btn-dark w-100"> {{ __('Send Password Reset Link') }}</button>

    </div>

 </form>



</div>



        


        

        
          <!--start of price listing section -->
        <!-- <section class="thesection">
  <div class="container py-5">
@if(session('msg'))
  <div class="alert alert-success text-center">
    <p>{{session('msg')}}</p>
  </div>

@endif
    

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"style="background:#0CF035;">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn"style="background:#0CF035;">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
       

   

        
-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="{{asset('assets/mail/jqBootstrapValidation.js')}}"></script>
        <script src="{{asset('assets/mail/contact_me.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="{{asset('Arsha/assets/js/main.js')}}"></script>


   
  
    </body>
</html>
