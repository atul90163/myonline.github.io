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
	<script src="../js/jquery.min.js">  </script>
   
    <title> All Total leave</title>
<style>


.navWidth
{
	margin-top:60px;
	
	  background-color:teal;
	 padding-top:20px;
     min-height:500px;
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

.fixed-header , .fixed-footer
{
	width:100%;
	
}
a{
	color:white;
}
a:hover{
	text-decoration:none;
	color:red;
	opacity:1;
}
.msgd
{
	color:red;
	text-decoration:italic;
	
}



.textcolor
{
	color:black;
}	
	body{
	width:100%;
	overflow:auto;
	overflow-x:hidden;
	
}
	
</style>
</head>
<body>

 <?php
include "header.php";
?>

 <div class="container-fluid navWidth  ">
 <div class="row brd">
 <div class="col-lg-12">
 <fieldset>
 <legend><i><b> All Apllied leave by You </b></i> </legend>

 
 <center>
 <table class="table  table-striped table-hover table-borderless ">
 



<thead class="thead-dark">
 <tr>
 <th>Sr.</th>
 <th>Casual Leave</th>
 <th>Medical leave</th>
 <th>Leave from</th>
 <th>Leave to</th>
 
<th>Status</th>
<th>Apllied Date</th>

 </tr>

<thead>
<?php
include "../connection.php";
$ttl=0;
$u=$_SESSION['user_id'];
//echo $u;
$sql= mysqli_query($conn,"select * from apply_leave where applyby='$u'  ");
$row=mysqli_num_rows($sql);
if($row>0)
{
	//echo "data found";
	while($data=mysqli_fetch_assoc($sql))
	{
		$ttl=$ttl+1;
	   ?>
	   <tr>
	   <td><?php echo $ttl; ?></td>
	   <td><?php echo $data['cleave']; ?></td>
	   <td><?php echo $data['mleave']; ?></td>
	   
	   <td><?php echo $data['vlfrm']; ?></td>
	   
	   <td><?php echo $data['vlto']; ?></td>
	   <td style="color:yellow;"><?php echo $data['status']; ?></td>
	    <td><?php echo $data['leaveapplydate']; ?></td>
	  </tr>
	   
	   <?php
	    
	  
	}
}	
else
{
	echo "no data found";
}
	
 ?>
</table>
 
 </center>
 </fieldset>
 </div>
 </div>
 
 </div>
<div class="container-fluid">
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
