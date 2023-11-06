<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
     <form action="paystack"method="POST">
     @csrf 

     <input type="text"name="office"placeholder="office name">
     <input type="email"name="email"placeholder="office email">
     <input type="hidden"name="plan_code"value="PLN_pu0h50rkm1n0ay2">
     
     <button>Submit</button>
     
     </form>
</body>
</html>