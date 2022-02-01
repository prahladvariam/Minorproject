<?php session_start();
include'css.php';
if(isset($_SESSION["username"])&& isset($_SESSION["usertype"]))
{
?>
<?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
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
	
    <title>Attendance</title>
  </head>
  <body>
  
  <div class="container-fluid" id="menubar">
 
  <nav class="navbar navbar-expand-lg navbar-light" id="wrapper">
  <div class="container-fluid">
    <a class="navbar-brand" href="homepage.php"><img src="Images/1.png" class="img-fluid" width="80px"  alt="Company Logo"></a>
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
	<div class="col-md-2"></div>
	<div class="col-md-8">
	<form name="createroll" class="row g-3" method="POST" action="attendance.php">
	<div class="col-auto">
	<label style="color:#ffffff;">Branch</label>
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
	<div class="col-auto">
	<label style="color:#ffffff;">Semester</label>
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
	<div class="col-auto">
	<button type="submit" class="btn btn-primary" style="margin-top:23px;" name="searchroll" >Search</button>
	</div>
	</form>
	
	</div>
	<div class="col-md-2"></div>
	</div>
	<div class="row" style="padding-top:35px;">
	<div class="col-md-12 d-none d-md-block" style="height:80px;">
  
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
		echo"<h4 style='color:#ffffff;'>Branch:ET&T  Semester:".$sem."</h4>";
	}
	else
	{
		echo"<h4 style='color:#ffffff;'>Branch:".$branch."  Semester:".$sem."</h4>";
	}
	echo"<form  action='attendance.php'>";
	echo"<table class='table table-success table-striped'>
		<tr><td>Roll no</td><td>Name</td><td>Gender</td><td>Attendance</td></tr>";
	$url="http://localhost:3000/rollList?branch=$branch&semester=$sem";
	$ch=curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	//curl_setopt($ch,CURLOPT_VERBOSE,0);
  $result = curl_exec($ch);
  $decoded = json_decode($result,true);
  $x=1;
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
							if($dkey=='rollnumber')
							{
									echo"<td>".ucfirst($dval)."<input class='form-control' type='text' name='srollno$x' value='$dval' hidden></td>";
									$temproll=$dval;
							}
							elseif($dkey=='studentName')
							{
									echo"<td>".ucfirst($dval)."<input class='form-control' type='text' name='sname$x' value='$dval' hidden></td>";
							}	
							elseif($dkey=='gender')
							{
								if($dval=='Male')
								{
										echo"<td>".ucfirst($dval)."<select class='form-select' name='gender$x' hidden>
										<option value='Male' Selected>Male</option>
										<option value='Female'>Female</option>
										<option value='Other'>Other</option>
										</select></td>";
										echo"<td><input name='$temproll' value='A' type='checkbox' checked hidden><input name='$temproll' value='P' type='checkbox'></td>";
								}
								elseif($dval=='Female')
								{
										echo"<td>".ucfirst($dval)."<select class='form-select' name='gender$x' hidden>
										<option value='Male' >Male</option>
										<option value='Female' Selected>Female</option>
										<option value='Other'>Other</option>
										</select></td>";
										echo"<td><input name='$temproll' value='A' type='checkbox' checked hidden><input name='$temproll' value='P' type='checkbox'></td>";
								}
								elseif($dval=='Other')
								{
										echo"<td>".ucfirst($dval)."<select class='form-select' name='gender$x' hidden>
										<option value='Male' >Male</option>
										<option value='Female'>Female</option>
										<option value='Other' Selected>Other</option>
										</select></td>";
										echo"<td><input name='$temproll' value='A' type='checkbox' checked hidden><input name='$temproll' value='P' type='checkbox'></td>";
								}		
						
							}
								
								
							
													
						}	
						$x++;
					}
				}
			}
		}
		
    
    }
	
	echo"</tr></table>";
	echo"<div align='center'>
	<input type='number' class='form-control' value='$x' name='totalstudent' hidden>
	<input type='text' class='form-control' value='$branch' name='branch' hidden>
	<input type='text' class='form-control' value='$sem' name='semester' hidden>
	<input type='submit' class='btn btn-primary' align='center' name='saveno' value='Save'>
	<input type='reset' class='btn btn-secondary' align='center' name='saveno' value='Reset'>
	</div></form>";
  }
 
}


if(isset($_REQUEST["saveno"]))
{
		$totalstudent=$_REQUEST["totalstudent"];
		$totalstudent-=1;
		if($_REQUEST["branch"]=='ET%26T')
		{
			$branch='ET&T';
		}
		else
		{
			$branch=$_REQUEST["branch"];
		}
		$sem=$_REQUEST["semester"];
		$studentno=1;
		$i=0;
		$narray=array();
		while($studentno<=$totalstudent)
		{
			$sname=$_REQUEST["sname$studentno"];
			$rollno=$_REQUEST["srollno$studentno"];
			$gender=$_REQUEST["gender$studentno"];
			$narray[$i] =
			array(
				'rollnumber' => $rollno,
				'studentName' => $sname,
				'gender' => $gender
				);
			$i+=1;
			//for database use
			$studentno+=1;
			
		}
		$details=array(
			'branch' => $branch,
			'semester' => $sem,
			'student' => $narray
		);
}



	/*	
		echo"<form name='savenumber' method='POST' action='attendance.php' style='margin-bottom:5px;'>";
		echo"<input type='date' value='$today' id='date' name='dated'>
			 <input type='text' value='$branch' name='branch' hidden>
			 <input type='text' value='$sem' name='semester' hidden>";
	//	while($record=mysqli_fetch_array($result))
		{
			$studentroll='xxx';
			echo"<table>
			<tr><td>xyz</td>
			<td>xxxxx</td>
			<td>IVIVI</td>
			<td><input name='$studentroll' value='A' type='checkbox' checked hidden></td>
			<td><input name='$studentroll' value='P' type='checkbox'></td></tr>
			</table>";
		}
		echo"<input type='submit' name='attendance' value='save'>
		</form>";
		
	}
	if(isset($_REQUEST["attendance"]))
	{
		$abranch=$_REQUEST["branch"];
		$asem=$_REQUEST["semester"];
		$dated=$_REQUEST["dated"];
		//for database use
	//	while()
		{
			$curentroll='xxxx';
			$present=$_REQUEST["$curentroll"];
			//for database use
			
		}
		echo"attendance taken!!";
	}*/
	?>
	</div>
<div class="col-md-2"></div>
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
<?php
}
else
{
	header("location:index.php");
}
?>
