
<?php
include "../authentication/authentication.php";
?>

<?php
include "../connection.php";
$i=$_GET['id'];
if(isset($_POST['update']))
{
	//echo $_POST['name'];
	
	$n=$_POST['name'];
	$a=$_POST['age'];
	$ed=$_POST['department'];
	$r=$_POST['role'];
	$e=$_POST['email'];
	$updatedata=mysqli_query($conn,"update employee SET e_name='$n',e_age='$a',e_department='$ed', role='$r',e_email='$e' where id='$i'");
	if($updatedata)
	{
		//echo "successfully updated";
		echo "<script> alert('successfully updation');</script>";
		echo "<script>window.open('dashboard.php','_self');</script>";
	}
	else
	{
		echo "something error".mysqli_error();
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
   
    <title> admin</title>
<style>


p{
	font-size:20px;
	font-style:italic;
	
}
.navWidth
{
	background-color:teal;
	min-height:600px;
	padding-top:80px;
	 border-left:20px solid red;
     border-right:20px solid red;
	
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
	color:white;

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
		position:fixed;
	
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
 <div class="container navWidth">
 <?php
 include"../connection.php";
 $user_id = $_GET['id'];
// echo $user_id;
$sql=mysqli_query($conn,"select * from employee where id ='$user_id'");
 if($sql)
 {
	 $row=mysqli_fetch_assoc($sql);
	  $name=$row['e_name'];
	   $age=$row['e_age'];
	   $email=$row['e_email'];
	   $d=$row['e_department'];
	   $role=$row['role'];
 }
 ?>
 <fieldset>
 <legend>Edit User Details</legend>
 
  <form action="" method="post" name="empform" id="empform" onsubmit="return q()">
     
   
    <div class="form-group">
      <label for="usr">Name:</label>
      <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Your Name" value="<?php echo $name; ?>"required >
    </div>
   

 <div class="form-group">
      <label for="usr">Email:</label>
      <input type="email" class="form-control" id="email" name="email"  placeholder="Enter Your Email" value="<?php echo $email; ?>" required>
    </div>
<div class="form-group">
      <label for="usr">Age:</label>
      <input type="number" class="form-control" id="age" name="age" placeholder="Enter Your Age" value="<?php echo $age; ?>" required>
    </div>

   
  
<div class="form-check-inline">
 

  <label class="form-check-label"> Department:
    <input type="radio" class="form-check-input" name="department"  value='Web Development' <?php if($d=='Web Development'){echo "checked";}?> required >Web Development
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="department" value='Android Development' <?php if($d=='Android Development'){echo "checked";}?>   required>Android Development
  </label>
</div>
<div class="role">
 <div class="form-check-inline">
 <label class="form-check-label"> Role:
    <input type="radio" class="form-check-input" name="role"  value='admin' <?php if($role=='admin'){echo "checked";}?> required>Admin
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="role" value='employee' <?php if($role=='employee'){echo "checked";}?> required>Employee
  </label>
  </div>
  </div>



 <center> <button type="submit" class="btn btn-primary btn-block" name="update" >Update</button></center>
<center> <button type="reset" class="btn btn-secondary btn-block " name="reset" >Cancel</button></center>

</form>
</fieldset>
</div>


 <footer>
<div class="row bg-dark">
<div class="col-lg-12 col-md-12 col-sm-12">
<p style="color:white; float:right;"> copyright to EMP.PVT.LTD</P>
</div>

</div>
</footer>

</section>
</div>
</body>
</html>