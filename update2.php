<?php session_start();
include'css.php';
if(isset($_SESSION["username"])&& isset($_SESSION["usertype"]))
{
	$rollno=$_GET["rollno"];
	$studentName=$_GET["studentName"];
	$gender=$_GET["gender"];
	$branch=$_GET["branch"];
	$semester=$_GET["semester"];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Update Details</title>
  </head>
  <body>
    <div class="conatainer-fluid">
	<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4">
	<form name="createroll" method="POST" action="update2.php" style="margin-bottom:5px;">
	<?php
{
	//for database use
	echo"<table>
		<tr><td>Roll no</td><td>Name</td><td>Gender</td></tr>";
	//while()
	{
		echo"<tr><td>$rollno</td>
		<td><input type='text' name='sname' value='$studentName'></td>";
		if($gender=='Male')
		{
		echo"<td><select name='gender'>
			<option value='Male' Selected>Male</option>
			<option value='Female'>Female</option>
			<option value='Other'>Other</option>
			</select></td>
		</tr>";
		}
		else if($gender=="Female")
		{
			echo"<td><select name='gender'>
			<option value='Male'>Male</option>
			<option value='Female' Selected>Female</option>
			<option value='Other'>Other</option>
			</select></td>
		</tr>";
		}
		else
		{
			echo"<td><select name='gender'>
			<option value='Male'>Male</option>
			<option value='Female'>Female</option>
			<option value='Other' Selected>Other</option>
			</select></td>
		</tr>";
		}
	}
	echo"</table>";
}
?>
	<input type="submit" name="savedetails" value="Save">
	<div>
	</form>
	</div>
	<div class="col-md-4"></div>
	</div>
	</div>
<?php
if(isset($_REQUEST["savedetails"]))
{
	$sname=$_REQUEST["sname"];
	$ngender=$_REQUEST["gender"];
	$newdata=array(
		'studentName' => $sname,
		'gender' => $gender
	);
	$data=array(
		'branch' => $branch,
		'semester' => $sem,
		'student' => $newdata
	);
	$dataarr=json_encode($data);
	//for database use
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:3000/rollList',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>'{
    "branch" : "ET&T",
    "semester" : "III"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
	 
	
	//if()
	{
		header("location:update.php");
	}
	//else
	{
	//	echo mysqli_error();
	}
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
<?php
}
else
{
	header("location:index.php");
}
?>
