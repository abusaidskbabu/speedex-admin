<?php 
	$id = $_SESSION['id'];
	
	include_once 'DBconnection.php';
    $con = connect();

    $userInfoSql= "SELECT * FROM admins WHERE id = '$id';";
    $userInfoResult = $con->query($userInfoSql);
    foreach ($userInfoResult as $uir) {
    	$admin_name = $uir['admin_name'];
    	$profile= $uir['profile'];
    }
?>