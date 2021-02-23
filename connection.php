<?php
$h="sql105.epizy.com";
$u="epiz_27973203";
$p="NjRBxYWocF";
$db="epiz_27973203_XXX";
$conn=mysqli_connect($h,$u,$p,$db);
if($conn)
{
	//echo "connection successfully";
}
else
{
	//echo "something error";
	die('something error'.mysqli_connect_error($conn));
}

?>