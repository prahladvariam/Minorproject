<?php session_start();
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

    <title>Login In </title>
  </head>
  <body>

  <div class="conatainer-fluid" id="menubar">

  <nav class="navbar navbar-expand-lg navbar-light" id="wrapper">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="Images/1.png" class="img-fluid" width="80px"  alt="Company Logo"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">HOME</a>
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
  <div class="row" id="opcss" style="padding-top:35px">
  <div class="col-md-12 d-none d-md-block" style="height:80px;">

  </div>
  </div>
  <div class="row" id="opcss">
  <div class="col-md-3"></div>
  <div class="col-md-6" style="padding:10px;">
  <div id="logincss">
  <h1 class="text-center" style="padding:15px; font-size:25px; font-weight:650;">LOGIN</h1>
  <form name="attendance" method="POST" action="index.php" style="margin-bottom:5px;">
	  <div class="mb-3 row">

    <label for="staticEmail"  class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" name="txtuser" class="form-control" id="staticEmail" placeholder="email@example.com" required>
    </div>
  </div>
  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="txtpassword" class="form-control" id="inputPassword" placeholder="Password" required>
    </div>
  </div>
   <div class="mb-3 text-center">
    <button type="submit" name="btnlogin" class="btn btn-primary">Log in</button>
  </div>

  <?php
  if(isset($_REQUEST["btnlogin"]))
  {
  $username=$_REQUEST["txtuser"];
  $password=$_REQUEST["txtpassword"];
  //for database use
  $data_array = array(
    'email' => ''.$username.'',
  	'password' => ''.$password.''
  );
  $data = json_encode($data_array);
  $url="http://localhost:3000/signin";
  $ch=curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_POST,true);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
  curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_VERBOSE,0);
  $result = curl_exec($ch);
  $decoded = json_decode($result,true);
  if($e = curl_error($ch)){
    echo $e;
  }
  else
  {
    foreach($decoded as $key => $val)
    {
        if($val=='success')
        {
          $_SESSION["username"]=$username;
		      $_SESSION["usertype"]=$password;
		      echo "<script>window.location.href='homepage.php'</script>";
        }
        else
        {
          echo"INVALID Email or Password!";
          break;
        }
    }
    
  }
  curl_close($ch);
  }
  ?>

  </form>
	<div class="form-group align-center mt-3" style="float:right;">
		<a href="signup.php" class="text-decoration-none" type="button" ><h5 id="linkcolor">New?Register here!</h5></a>
		</div>
		</div>
		</div>
  <div class="col-md-3"></div>
  </div>

  <div class="row" id="opcss" style="padding-top:35px">
  <div class="col-md-12 d-none d-md-block" style="height:80px;">

  </div>
  </div>

  </div>

<div class="container-fluid" style="background-color:#1D2731;">
	<div class="row">
	<div class="col-md-3"><h5 style="padding-left:20px; color:#ffffff;">Contact</h5><p style="padding:0 20px 20px 20px; color:#ffffff;">Street 123 near xyz, city, district, pincode-123456<br>Phone-9876543210<br>Email- abc@xyz.fgh</p></div>
	<div class="col-md-3"><h5 style="padding-left:20px; color:#ffffff;">About</h5><p style="padding:0 20px 20px 20px; color:#ffffff;">This is about section of the site for short brief of the purpose of this site.</p></div>
	<div class="col-md-3"><h5 style="padding-left:20px; color:#ffffff;">XYZZ</h5><p style="padding:0 20px 20px 20px; color:#ffffff;">A section for XYZ to get important information about the Website. </p></div>
	<div class="col-md-3"><h5 style="padding-left:20px; color:#ffffff;">Important Links</h5><p style="padding:0 20px 20px 20px; color:#ffffff;">The important links for career opportunities.</p></div>
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
