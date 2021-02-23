<?php
include "../authentication/authentication.php";
?>
<?php
include "../authentication/role.php";
?>
<?php
//session_start();
include "../connection.php";
$a=100;
if(isset($_POST["submit"]))
{
	//echo "fdhsjdfh";
$name=$_POST['name'];
$email=$_POST['email'];
$age=$_POST['age'];
//echo $a+$age;
//echo var_dump($age);
$password=md5($_POST['pass']);
$department=$_POST['department'];
$role=$_POST['role'];
$selectdata= "select * from employee where e_email = '$email'";
$slctquery=mysqli_query($conn,$selectdata);
$rows=mysqli_num_rows($slctquery);
	
//$rownum= mysqli_num_rows($slctquery);
//echo $rows;

if($rows>0)
{
//echo "user already exist";
  echo "<script> alert('User already exist please add new employee');</script>";
	//header('location:login.php');
  echo"<script> window.open('registration.php', '_self');</script>";


}

else{
	
$sql="insert into employee(e_name,e_email,e_age,e_password,e_department,role)values('$name','$email','$age','$password','$department','$role')";
if($query=mysqli_query($conn,$sql))
{
	//echo "insertion ";
	echo "<script> alert('registration successfully');</script>";
	//header('location:login.php');
	echo"<script> window.open('dashboard.php', '_self');</script>";
}
else
{
	echo  "failed" . mysqli_error($conn);
}
}

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
   
    <title> Admin</title>
<style>


p{
	font-size:20px;
	font-style:italic;
	
}
.navWidth
{
	background-color:teal;
	min-height:600px;
	padding-top:30px;
	 border-left:20px solid red;
     border-right:20px solid red;
	margin-top:65px;
	
	
	
	
	
}
h4
{
color:white;	
}
.role{

	height:60px;
	
	margin-top:10px;
	padding-top:10px;
}
input[type=radio] {
    
	width:50px;
	height: 20px;
	
   
    
}
a:hover
{
text-decoration:none;
	opacity:1;
	color:#000;

	}
	a{
		color:white;
	}
h1
{
	margin:0;
	padding:0 0 20px;
	text-align:center;
	font-size:22px;
	
	
}
.login-box padding{
	margin:0px;
	padding:0px;
	font-weight:bold;
	
}
.heading
{
margin-left:45%;
margin-bottom:0.60em;
padding-top: 30px;
color:red;

}
nav a:hover
{
text-decoration:none;
	opacity:1;
	color:red;

	}


a{
	color:white;

}
body{
	width:100%;
	position:fixed;
	
	}
.widthnav
{
	width:100%
	
}



.fixed-header , .fixed-footer
{
	    width:100%;
		
	
}


</style>
<script>
function q()
{
var a=document.empform.age.value;
var p= document.empform.pass.value;
if(a<18)
{
alert("age must be greater than 18 year");
return false;

}
if(p.length<6)
{
alert("password must be atleast 6 character");
return false;

}
}
</script>
</head>
<body>

<?php
include "header.php";?>
 <div class="container-fluid navWidth ">
 
 
 
  <form action="" method="post" name="empform" id="empform" onsubmit="return q()">
 
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="name" name="name" style="border-bottom:2px solid red;" placeholder="Enter Your Name"required>
    </div>
   

 <div class="form-group">
      <label for="usr">Email:</label>
      <input type="email" class="form-control" id="email" name="email" style="border-bottom:2px solid red;" placeholder="Enter Your Email"required>
    </div>
<div class="form-group">
      <label for="usr">Age:</label>
      <input type="number" class="form-control" id="age" name="age" placeholder="Enter Your Age" style="border-bottom:2px solid red;"required>
    </div>
<div class="form-group">
      <label for="usr">Password:</label>
      <input type="password" class="form-control" id="pass" name="pass" style="border-bottom:2px solid red;" placeholder="Enter Your Password"required>
    </div>
   
  
<div class="form-check-inline">
 

  <label class="form-check-label"> Department:
    <input type="radio" class="form-check-input" name="department"  value='Web Development' required>Web Development
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="department" value='Android Development' required>Android Development
  </label>
</div>
<div class="role">
 <div class="form-check-inline">


  <label class="form-check-label"> Role:
    <input type="radio" class="form-check-input" name="role"  value='admin' required>Admin
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="role" value='employee' required>Employee
  </label>
  </div>
  </div>



 <center> <button type="submit" class="btn btn-info "style="border-bottom:2px solid red;" name="submit" >Submit</button>
 <button type="reset" class="btn btn-secondary  " style="border-bottom:2px solid red;"name="reset" >Cancel</button></center>

</form>
</fieldset>
</div>

<div class="container-fluid">
 <footer>
<div class="row bg-dark">
<div class="col-lg-12 col-md-12 col-sm-12">
<p style="color:white; float:right;"> copyright to EMP.PVT.LTD</P>
</div>

</div>
</footer>
</div>

</div>
</body>
</html>