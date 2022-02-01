<?php
include'css.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script src="https://kit.fontawesome.com/772d139754.js" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">

    <title>Sign Up</title>
  </head>
  <body>

   <div class="conatainer-fluid" id="menubar">

  <nav class="navbar navbar-expand-lg navbar-light" id="wrapper">
  <div class="container-fluid">
    <a class="navbar-brand" href="homepage.php"><img src="Images/1.png" class="img-fluid" width="80px"  alt="Company Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ABOUT</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            OPTIONS
          </a>
          <ul class="dropdown-menu" style="background-color:#1D2731; padding-right:30px;" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" style="background-color:#1D2731;" href="#">Action</a></li>
            <li><a class="dropdown-item" style="background-color:#1D2731;" href="#">Another action</a></li>
            <li><a class="dropdown-item" style="background-color:#1D2731;"href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <div id="socialsite" class="ssites d-none d-lg-block">
	<ul>
		<li><a href="#" style="text-decoration:none"><i class="fab fa-facebook"></i></a></li>
		<li><a href="#" style="text-decoration:none"><i class="fab fa-youtube"></i></a></li>
		<li><a href="#" style="text-decoration:none"><i class="fab fa-instagram-square"></i></a></li>
	</ul>
	</div>
	</div>
    </div>
</nav>

  </div>

  <div class="container-fluid" id="content">
  <div class="row" style="padding-top:35px">
  <div class="col-md-12 d-none d-md-block" style="height:80px;">

  </div>
  </div>
  <div class="row">
  <div class="col-md-3"></div>
  <div class="col-md-6" style="padding:10px;">
  <div id="logincss">
   <h1 class="text-center" style="padding:15px; font-size:25px; font-weight:650;">SIGN UP</h1>
	<form name="signup" method="POST" action="signup.php" style="margin-bottom:5px;">
	<div id="formgap">
	<label>First Name:</label>
	<input type="text" class="form-control" name="tfname" placeholder="Enter First Name" required>
	</div>
	<div id="formgap">
	<label>Last Name:</label>
	<input type="text" class="form-control" name="tlname" placeholder="Enter Last Name" required>
	</div>
	<div id="formgap">
	<label>Email:</label>
	<input type="email" class="form-control" name="temail" placeholder="Enter Email" required>
	</div>

	<div id="formgap">
	<label>Password:</label>
	<input type="password" id="password" class="form-control" name="tpasswd" onkeyup='check();' placeholder="Enter New Password" required>
	</div>
  <div id="formgap">
  <label>Confirm Password:</label>
  <input type="password" id="confirm_password" class="form-control" name="tconfpasswd" onkeyup='check();' placeholder="Confirm Password" required>
  <span id='message'></span>
  </div>

  <script>
  var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password matched';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password not matching';
  }
}
  </script>

	<div id="formgap" align="center">
	<input type="submit" class="btn btn-primary" name="signupbtn" value="Sign Up">
	</div>
	</form>
	<div class="form-group align-center mt-3" style="float:right;">
		<h5 id="linkcolor">Already a user?<a href="index.php" class="text-decoration-none" type="button" >Login!</a></h5>
		</div>
  </div>
 </div>
  <div class="col-md-3"></div>
  </div>

  <div class="row" style="padding-top:35px">
  <div class="col-md-12 d-none d-md-block" style="height:80px;">

  </div>
  </div>

  </div>


  <div  class="container-fluid" id="footer" align="center">
	  <div class="row">
	  <div class="col-md-2"></div>
	  <div class="col-md-8">
			<h6 style="color:#ffffff;">DISCLAIMER</h6>
			<p id="disclaimer">The contents of all pages published by individuals are solely the responsibility of the page authors. Statements made and opinions expressed are strictly those of the authors and not Website.</p>
			<p id="disclaimer"><i class="far fa-copyright"></i> No Copyright</p>
	</div>
	<div class="col-md-2"></div>
	</div>
	</div>



<?php
if(isset($_REQUEST["signupbtn"]))
{
	$fname=$_POST["tfname"];
	$lname=$_POST["tlname"];
	$email=$_POST["temail"];
	$passwd=$_POST["tpasswd"];
	$confpasswd=$_POST["tpasswd"];
	
  $url="http://localhost:3000/signup";
  $data_array=array(
    'firstName' => ''.$fname.'',
  	'lastName'=> ''.$lname.'',
  	'email'=> ''.$email.'',
  	'password'=> ''.$passwd.'',
  	'confirmPassword'=> ''.$confpasswd.'',
  );

  $data = json_encode($data_array);

  $ch=curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST,true);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
  curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_VERBOSE,0);
  $result = curl_exec($ch);
  $decoded = json_decode($result,true);
  if($e = curl_error($ch))
  {
    echo$e;
  }
  else {
    foreach($decoded as $key => $val)
    {
        if($val=='success')
		{
			echo'<script>alert("Data Saved successfully")</script>';
		}
		else
		{
			echo'<script>alert("Data not Saved successfully")</script>';
		}
    }
  }
  curl_close($ch);

	//for database use
}
?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
