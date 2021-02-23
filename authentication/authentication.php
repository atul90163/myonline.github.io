<?php
session_start();
if(!isset($_SESSION['authentication']))
{
	header('location:../index.php');
}
?>