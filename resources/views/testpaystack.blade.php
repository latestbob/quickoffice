<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Paystack</title>
</head>
<body>
    <form action="/testpaystack"method="POST">
        @csrf  

        <input type="text"name="first_name"placeholder="Firstname"required> <br><br>
        <input type="text"name="last_name"placeholder="Last name"required> <br><br>
        <input type="text"name="office"placeholder="Enter Office"required> <br><br>
        <input type="email"name="email"placeholder="Enter Email"required><br><br>
        <input type="text"name="admin"placeholder="Enter Admin Name"required> <br><br><br>
        <input type="text"name="password"placeholder="Enter password"required> <br><br>
        <input type="text"name="phone"placeholder="Enter Phone"required> <br><br>
         <br><br>

        <br>
        <button>Submit</button>
    </form>
</body>
</html>