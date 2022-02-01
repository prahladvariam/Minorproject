<?php session_start();
include'css.php';
if(isset($_SESSION["username"])&& isset($_SESSION["usertype"]))
{
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

    <title>Get Roll List!</title>
  </head>
  <body>
  
	<div class="container-fluid" id="menubar">
 
  <nav class="navbar navbar-expand-lg navbar-light" id="wrapper">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="homepage.php">HOME</a>
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
	 <a href="logout.php" style="text-decoration:none"><i class="fas fa-sign-out-alt"></i>Sign Out</a>
	</div>
    </div>

</nav>
  
  </div>
 
    <div class="container-fluid" id="rollcreate">
	<div class="row" style="padding-top:35px;">
	
	</div>
	<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4" id="logincss">
	<h1 class="text-center" style="padding:15px; font-size:25px; font-weight:650;">Get Roll List!</h1>
	<form name="createroll" method="POST" action="getroll.php" style="margin-bottom:5px;">
	<div>
	<label>Branch</label>
	<select class="form-select" name="branch" aria-label="Default select example" required>
	<option value="" selected>-Select-</option>
	<option value="ET%26T">ET&T </option>
	<option value="IT">IT</option>
	<option value="CS">CS</option>
	<option value="Civil">Civil</option>
	<option value="Mining">Mining</option>
	<option value="Electrical">Electrical</option>
	<option value="Mechnical">Mechnical</option>
	</select>
	</div>
	<div>
	<label>Semester</label>
	<select class="form-select" name="semester" aria-label="Default select example" required>
	<option value="" selected>-Select-</option>
	<option value="I">I</option>
	<option value="II">II</option>
	<option value="III">III</option>
	<option value="IV">IV</option>
	<option value="V">V</option>
	<option value="VI">VI</option>
	<option value="VII">VII</option>
	<option value="VIII">VIII</option>
	</select>
	</div>
	<div>
	<input type="submit" class="btn btn-primary" style="margin-top:20px;" name="searchroll" value="Search">
	</div>
	</form>
	
	</div>
	<div class="col-md-4"></div>
	</div>
	<div class="row" style="padding-top:35px">
  <div class="col-md-12 d-none d-md-block" style="height:80px;">
  
  </div>
  </div>
	</div>
	</div>

<div class="container-fluid"  id="rollcreate">
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">
<?php
if(isset($_REQUEST["searchroll"]))
{
	$branch=$_REQUEST["branch"];
	$sem=$_REQUEST["semester"];
	//for database use
	if($branch=='ET%26T')
	{	
		echo"<h4>Branch:ET&T  Semester:".$sem."</h4>";
	}
	else
	{
		echo"<h4>Branch:".$branch."  Semester:".$sem."</h4>";
	}
	echo"<table class='table table-dark table-striped'>
		<tr><td>Roll no</td><td>Name</td><td>Gender</td></tr>";
	$url="http://localhost:3000/rollList?branch=$branch&semester=$sem";
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	//curl_setopt($ch,CURLOPT_VERBOSE,0);
  $result = curl_exec($ch);
  $decoded = json_decode($result,true);
   if($e = curl_error($ch))
  {
    echo$e;
  }
  else {
	foreach($decoded as $key => $val)
    {
		if($key=='data')
		{
			$dataarr=$val;
			foreach($dataarr as $dkey => $dval)
			{
				if($dkey=='student')
				{
					$stdntarr=$dval;
					foreach($stdntarr as $skey => $sval)
					{
						$details=$sval;
						echo"<tr>";
						foreach($details as $dkey => $dval)
						{
							echo"<td>".ucfirst($dval)."</td>";
						}
						echo"</tr>";
					}
				}
			}
		}
		
    }
	echo"</table>";
  }
}
?>
</div>
<div class="col-md-2"></div>
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
<?php
}
else
{
	header("location:index.php");
}
?>
