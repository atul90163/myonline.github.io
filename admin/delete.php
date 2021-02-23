

<?php
include "../authentication/authentication.php";
?>
<?php
 $id=$_GET['id'];
include "../connection.php";
$deletedata=mysqli_query($conn,"delete from employee where id='$id'");
if($deletedata)
{
	echo "<script> alert('successfully deleted your data');</script>";
		echo "<script>window.open('dashboard.php','_self');</script>";
}
	else
{
		echo "something error".mysqli_error();
}


?>