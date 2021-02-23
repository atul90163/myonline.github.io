<?php
include "../authentication/authentication.php";
?>
<?php
include "../authentication/arole.php";
?>
<?php

include "../connection.php";
$uid=$_SESSION['user_id'];
if(isset($_POST['submit']))
{
	$cl=$_POST['cleave'];
	$ml=$_POST['mleave'];
	$vf=$_POST['lfrm'];
	$vt=$_POST['lto'];
	$status="pending";
	$sql=mysqli_query($conn,"insert into apply_leave(cleave,mleave,vlto,vlfrm,applyby,status)values('$cl','$ml','$vt','$vf','$uid','$status')");
	if($sql)
	{
		//echo 'successfully';
		
		echo "<script> alert('leave applied successfully');</script>";
		echo "<script>window.open('leave.php','_self');</script>";
		//$_SESSION['message']="leave applied successfully";
		
	}else
	{
		//echo "failed";
		//$_SESSION['message']="leave applied not completed";
		echo "<script> alert('leave applied not completed');</script>";
		echo "<script>window.open('leave.php','_self');</script>";
		
		
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
	<script src="../js/jquery.min.js">  </script>
   
    <title> All Total leave</title>
<style>


.navWidth
{
	 background-color:teal;
	padding-top:30px;
   min-height:500px;
   border-left:20px solid red;
   /* border:20px solid red; */
	margin-top:60px;
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
<script>
function checkDateto( )
{
	var ttlclv= $('.ecleave').text();
	var ttlclv = parseInt(ttlclv);
	var eclv = $('#hwmnycle').val();
	var eclv = parseInt(eclv);
	//console.log(typeof eclv);
	//alert(eclv);
	//console.log(eclv);
	//console.log(ttlclv);
	//var add1 = ttlclv+eclv;
	//console.log(add1);
	
	
	if(ttlclv>=eclv)
	{
		//return 
		//alert('eclv');
		//console.log(ttlclv+eclv);
	}
	else
	{
		alert("please enter valid casual leave");
		return false;
	
	}
	
	var ttlmlv= $('.emleave').text();
	var ttlmlv = parseInt(ttlmlv);
	var emlv = $('#hwmnymle').val();
	var emlv = parseInt(emlv);
	//console.log(typeof eml);
	//console.log(typeof ttlmlv);
	//console.log(typeof emlv);
	//var add = ttlmlv+emlv;
	//console.log(add);
	//alert(eclv);
	//console.log(emlv);
	//console.log(mlv);
	//console.log(typeof ttlml);
	
	if(ttlmlv>=emlv)
	{
		//return 
	}
	else
	{
			 alert("please enter valid medical leave");
		     return false;
	
	}
	
	
	var vfrm=$('.vldfrm').text();
	var vto=$('.vldto').text();
	//alert(vto);
	var lto= $('.tillwhichday').val();
	
	//var lfrm = str;
	var date1 = new Date(vfrm);
	var date2 = new Date(lto);
	var diffdays= parseInt((date2 - date1)/(1000*60*60*24));
	//console.log(diffdays);
	//alert(diffdays);
	var date3 = new Date(vto);
	var diffdays2 = parseInt((date3-date2)/(1000*60*60*24));
	//alert(diffdays2);
	if( diffdays>=0 && diffdays2 >=0)
	{
		//alert('ok');
	}
	else{
		alert('please enter valid according to your ending of your leave date ');
		return false;
	}
	
	
	
}

function checkDate( )
{
	var vfrm=$('.vldfrm').text();
	var vto=$('.vldto').text();
	//alert(vto);
	var lfrm= $('.frmwhichdate').val();
	//var lfrm = str;
	var date1 = new Date(vfrm);
	var date2 = new Date(lfrm);
	var diffdays= parseInt((date2 - date1)/(1000*60*60*24));
	//alert(diffdays);
	var date3 = new Date(vto);
	var diffdays2 = parseInt((date3-date2)/(1000*60*60*24));
	//alert(diffdays2);
	if( diffdays>=0 && diffdays2>=0)
	{
		//alert('ok');
	}
	else{
		alert('please enter  valid date for taking leave within leaves days');
		return false;
	}
	
}

</script>
</head>
<body>

 <?php
include "header.php";
?>

 <div class="container-fluid navWidth  ">
 <div class="row brd">
 <div class="col-lg-12">
 <fieldset>
 <legend><b> All your Total leave </b> <a href="apllied_leave.php" class="btn btn-primary">All Applied Leave</a></legend>

 
 
 <table class="table  table-striped table-hover table-borderless ">
 



<thead class="thead-dark">
 <tr>
 <th>Sr.</th>
 <th>Employee name</th>
 <th>Casual Leave</th>
 <th>Medical leave</th>
 <th>Valid from</th>
 <th>Valid to</th>
 
<th>Action</th>
 </tr>

<thead>
 
 <?php

include "../connection.php";
$ttl=0;
//$ia=$_SESSION['authentication'];
$ia=$_SESSION['user_id'];
$slctalusr=mysqli_query($conn, "select * from assign_leave a inner join employee e on a.userid=e.id where e.id='$ia' ");
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
 

<td class="ecleave"><?php echo $data['c_leave']; ?></td>
<td class="emleave"><?php echo $data['m_leave']; ?></td>
<td class="vldfrm"><?php echo $data['v_from']; ?></td>
<td class="vldto"><?php echo $data['v_to']; ?></td>
<td><a href=" view_message.php? id=<?php echo $i ;?>" class="textcolor">View</a></td>
 
 
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
 
 
 </fieldset>
 </div>
 </div>
 <div class="col-sm-2">
<p><i><b>Aply For Leave:</b></i></p>

</div>
<center>
<div class="col-lg-6" style="">

 
<?php //echo $_SESSION['user_id']; ?>
<form method="post" action="" style="background-color:#d9d9d9; padding:5px;" onsubmit="return checkDateto()">
 
 <input type="hidden" name ="assign" value="<?php echo $_SESSION['user_id']; ?>">

  
	  <div class="form-group " style=" ">
	
      <label for="msg" class="col-lg-3 " control-label> <b>Casual Leave</b></label>
	   <input type="number" name ="cleave" id="hwmnycle"  value="" placeholder="Apply for Casual leave" class="form-control" style="border-bottom:2px solid red;" required>
	 
 <label for="msg" class="col-lg-3" control-label> <b>Medical Leave</b></label>
	   <input type="number" name ="mleave" id="hwmnymle" value="" placeholder="Apply for Medical leave" class="form-control " style="border-bottom:2px solid red;" required>
	 	 </div>
	  <div class="form-group " >
	
      <label for="msg" class="col-lg-3" control-label> <b> Frm which Day</b></label>
	  
	   <input type="date" name ="lfrm" value="" class="form-control frmwhichdate" style="border-bottom:2px solid red;"  onblur ="checkDate()" required>
	  
  
 	
      <label for="msg" class="col-lg-3" control-label> <b>Till which Day</b></label>
	  
	   <input type="date" name ="lto" value="" class="form-control tillwhichday" style="border-bottom:2px solid red;"required>
	  
	
  </div>

  
	  
 <center> <button type="submit" class="btn btn-primary " name="submit" style="border-bottom:2px solid red;">Apply Leave</button>
 <button type="reset" class="btn btn-secondary  " name="reset" style="border-bottom:2px solid red;" >Cancel</button></center>
</div>
</form>
</center>

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
