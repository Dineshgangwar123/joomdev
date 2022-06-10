<?php
session_start();
include 'config.php';
if (isset($_SESSION['uid'])) {
     header('location: dashboard.php');
}else{
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Traveling Expence Tracker</title>
    <meta name="author" content="Codeconvey" />
    
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/login-page.css">
    
    <link rel="stylesheet" href="css/demo.css" />
	
</head>
<body>

<section>
    <div class="rt-container" style="margin-top: 100px;">
          <div class="col-rt-12">
              <div class="Scriptcontent">
                <div class="codehim-form">
        <div class="form-title">
            <div class="user-icon gr-bg">
            <i class="fa fa-user"></i>
            </div>
     <h2> User Login Form</h2>
            </div>
    <label for="email"><i class="fa fa-envelope"></i> Email:</label>
        <input type="email" id="email" class="cm-input" placeholder="Enter your email adress">
        
        <label for="pass"><i class="fa fa-lock"></i> Password:</label>
        <input type="password" id="password" class="cm-input" placeholder="Enter your password">
        <a href="signin.php" >Create New Account?</a>
        <button type="submit" class="btn-login  gr-bg" style="margin-top: 14px" onclick="login()">Login</button>
    </div>
    		
    		</div>
		</div>
    </div>
</section>

	</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script type="text/javascript">
function login() {
    var password=$('#password').val();
    var email=$('#email').val();
    if (email !='' && password!='') {
    $.ajax({
        url: 'login.php',
        type: 'POST',
        data: {email : email,password : password},
        success: function(response) {  
           const obj = JSON.parse(response);
           if (obj.result ==1) {

            window.location.href = "dashboard.php";

           }else if(obj.result ==2){
            Toastify({
              text: "Password Incorrect",
              duration: 3000,
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
              background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
            }).showToast();

           }else if(obj.result ==3){
               
            Toastify({
              text: 'User not found Try again!',
              duration: 3000,
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
              background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
            }).showToast(); 
           }
           
     },
    error: function (request, status, error) {
        console.log(request.responseText);
    }
 });
}else{
    Toastify({
              text: "All Field are required",
              duration: 3000,
              newWindow: true,
              close: true,
              gravity: "top", // `top` or `bottom`
              position: "right", // `left`, `center` or `right`
              stopOnFocus: true, // Prevents dismissing of toast on hover
              style: {
              background: "linear-gradient(to right, #00b09b, #96c93d)",
              },
              onClick: function(){} // Callback after click
            }).showToast(); 
  }
}
</script>