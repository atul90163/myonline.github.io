<?php
include "../authentication/authentication.php";
?>
<?php
include "../authentication/role.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 
   <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>
   
    <title> All Employee Leave</title>
<style>

nav a:hover
{
text-decoration:none;
	opacity:1;
	color:red;

	}


.navWidth
{
	background-color:teal;
	min-height:500px;
	 border-left:20px solid red;
     border-right:20px solid red;
	margin-top:65px;
	
	
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


.fixed-header , .fixed-footer
{
	width:100%;
	
	
	
}

a{
	
	

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

	
	body{
	width:100%;
	overflow:auto;
	overflow-x:hidden;
	
}
</style>
</head>

<body class="">

<?php
include "header.php";
?>



 <div class="container-fluid navWidth">
 <div class="row ">
  <div class="col-lg-12 col-md-12 col-sm-12 ">
  <center>
 <div class="col-sm-6"> <h3><i> <b>All Employee Leave lists</b></i></h3> </div>
 </center>
 <table class="table  table-striped table-hover table-borderless ">
 



<thead class="thead-dark">
 <tr>
 <th>Sr.</th>
 <th>Employee name</th>
 <th>Casual Leave</th>
 <th>Medical leave</th>
 <th>Valid from</th>
 <th>Valid to</th>
 
 </tr>

<thead>
 
 <?php

include "../connection.php";
$ttl=0;
//$ia=$_SESSION['authentication'];
$ia=$_SESSION['user_id'];
//echo $ia;
$slctalusr=mysqli_query($conn, "select * from assign_leave a inner join employee e on a.userid=e.id ");
$countuser= mysqli_num_rows($slctalusr);
if($countuser>0)
{
	// echo $countuser;
	while($data=mysqli_fetch_assoc($slctalusr))
	{
		$ttl=$ttl+1;
		$i=$data['id'];
		?>
	
	<tr>
 <td><?php echo $ttl;?></td>
 <td ><?php echo $data['e_name']; ?></td>
 

<td><?php echo $data['c_leave']; ?></td>
<td><?php echo $data['m_leave']; ?></td>
<td><?php echo $data['v_from']; ?></td>
<td><?php echo $data['v_to']; ?></td>
 
 
 </tr>
 <br>

	<?php
	
	}
	 
}
else
{
	echo "no data found";
}
	
 ?>
</table>  
</div>
</div>
</div>

<div class="container-fluid bg-dark">
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