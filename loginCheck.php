<?php
session_start();
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

//Check and redirect
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
die('login');
}

$email = $_POST["email"];
$password = md5($_POST["password"]);

if($admins = DB::table('admin')->where(['email'=>$email, 'password'=>$password])->exists() ){
	// Store session variables
	$_SESSION["loggedin"] = true;
	$_SESSION["email"] = $email;
	die('successfull');
		
}else if (!DB::table('admin')->where(['email'=>$email])->exists()) {
	echo "This email does not exit";
}else if (!DB::table('admin')->where(['email'=>$email, 'password'=>$password])->exists() ) {
	echo "Password Incorrect";
}
?>