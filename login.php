<?php
session_start();
include "connection.php";
if(isset($_POST['login']))
{
	$e= $_POST['email'];
	$p=md5($_POST['pass']);
	//echo $e;
	$selectdata=mysqli_query($conn,"select * from employee where e_email='$e' AND e_password='$p'");
	//$slctdtaqry=mysqli_query($conn,$selectdata);
	$rownumber = mysqli_num_rows($selectdata);
	//echo $rownumber;
	
	if($rownumber==1)
	{
		$session_id=session_id();
		$_SESSION['authentication']=$session_id;
		$datafound=mysqli_fetch_assoc($selectdata);
		//echo $datafound['e_name'];
		$_SESSION['role']=$datafound['role'];
		 $_SESSION['ename']=$datafound['e_name'];
		 $_SESSION['user_id']=$datafound['id'];
		//echo "<br>";
	 	$_SESSION['edepartment']=$datafound['e_department'];
		echo $_SESSION['role'];
		
		if($_SESSION[role]=='employee')
		{
		//echo "<script> window.open('dashboard.php');</script>";
	      header('location: user/dashboard.php');
		}
		else
		{
			header('location:admin/dashboard.php');
		}
		
		
	}
	else{
		//echo "not data found";
         echo "<script> alert('invalid passed data ');</script>"; 
		     echo "<script> window.open('index.php','_self');</script>";

		  }
	
	
}


?>
