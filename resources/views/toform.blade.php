<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>QuickOffice Registration</title>
    <link href="{{asset('Arsha/assets/css/style.css')}}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

body{
    background:#3F51B5;
}
</style>
<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <!--<h1 class="logo mr-auto"><a href="index.html">Arsha</a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
    <a href="/" class="logo mr-auto"><img src="{{asset('logo/quickofficemain.png')}}" alt="" class="img-fluid"style=""></a>
    <h1 class="logo mr-auto"style=""><a href="/">QuickOffice</a></h1>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/">Home</a></li>
          <li><a href="/#about">About</a></li>
          <li><a href="/#services">Services</a></li>
          <li><a href="/#whyus">Why Us</a></li>
          <li><a href="/#steps">Step Guides</a></li>
          <li><a href="/#price">Pricing</a></li>
          <li><a href="/#team">Team</a></li>
          <li><a href="/#faq">FAQ</a></li>
          <li><a href="/#contact">Contact</a></li>
          
            
         

        </ul>
      </nav><!-- .nav-menu -->

    

    </div>
  </header><!-- End Header -->





<form id="regForm"action="/testpaystack"method="POST"enctype="multipart/form-data"class="px-3">
@csrf 
@if ($errors->any())
                        <div class="alert alert-danger text-center">
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li style="list-style:none">{{ $error }}</li>
                        @endforeach
                        </ul>
                        </div>

                        @endif

                        @if(session('error'))

                            <div class="alert alert-danger text-center">
                                {{session('error')}}
                            </div>
                        @endif
                        <h2 class="text-center"><strong>Sign Up Your Office Account</strong></h2>
                <p class="text-center">Fill all form field to go to next step</p>
  <input type="hidden"name="plan"value={{$plan}}>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">Account Information:
    <p><input type="email" placeholder="Enter Office Email" oninput="this.className = ''" name="office_email"></p>
    <p><input type="text" placeholder="Enter Office Name" oninput="this.className = ''" name="office_name"></p>
  </div>
  <div class="tab">Other Details:
    <p><input type="tel" placeholder="Enter Office phone" oninput="this.className = ''" name="office_phone"></p>
    <p><input type="text" placeholder="Office/Company Address" oninput="this.className = ''" name="office_address"></p>

    <div class="form-group">
            <label for="Logo">Office Logo</label><input type="file"accept="image/*"name="logo" oninput="this.className = ''" placeholder="office Logo"required/>
        </div>
  </div>
 
  <div class="tab">Admin Login Info:
    <p><input type="email"placeholder="Admin Login Email" oninput="this.className = ''" name="admin_email"></p>
    <p><input type="text" placeholder="Admin Fullname" oninput="this.className = ''" name="admin_name"></p>
    <p><input type="password" placeholder="Admin Secured Password" oninput="this.className = ''" name="admin_password"></p>

  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


<script src="{{asset('Arsha/assets/js/main.js')}}"></script>
</body>
</html>
