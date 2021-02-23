<?php
include "../authentication/authentication.php";
?>

<?php
include "../authentication/arole.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
   
    <title> user </title>
<style>


p{
	font-size:20px;
	font-style:italic;
	
}
.navWidth
{
	 border-left:20px solid red;
    border-right:20px solid red;
	
	background-color:teal;
	margin-top:60px;
	
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
h1
{
	margin:0;
	padding:0 0 20px;
	text-align:center;
	font-size:22px;
	
	
}
.fixed-header , .fixed-footer
{
	width:100%;
	
}

body{
	width:100%;
	overflow:auto;
	overflow-x:hidden;
	
}
*{
	margin:0;
	padding:0;
	box-sizing:border-box;
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
a:hover
{
text-decoration:none;
	opacity:1;
	color:white;

	}
	a{
		color:white;
	}
.widthnav
{
	width:100%
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
.cv
{
	width:100%;
}
</script>
</head>
<body>

 
<?php
include "header.php";
?>
 <div class="container-fluid navWidth">
 <?php

echo "welcome to employee<br>welcome to employee<br>welcome to employee<br>welcome to employeevv<br>welcome to employee<br>welcome to employee<br>welcome to employee<br>welcome to employee<br>welcome to employee";

 ?>
 
</div>

 <footer class="fixed-footer">
<div class="row bg-dark">
<div class="col-lg-12 col-md-12 col-sm-12">
<p style="color:white; float:right;"> copyright to EMP.PVT.LTD</P>
</div>
</div>
</footer>
</div>


</body>
</html>