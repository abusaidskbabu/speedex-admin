<?php 
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;


	$addName = $_POST["addName"];
	$addPhone = $_POST["addPhone"];
	$addEmail = $_POST["addEmail"];
	$addAddress = $_POST["addAddress"];
	
	$Pass = md5('@Md1234@');

	if($user = DB::table('admin')->select('email')->where('email',$addEmail)->first()){
        echo "Email already used";
    }else if($user = DB::table('admin')->select('phone')->where('phone',$addPhone)->first()){
        echo "Phone already used";
    }else {
        $user = DB::table('admin')->insert(
                [
                    'fullName' => $addName,
                    'phone' => $addPhone,
                    'email' => $addEmail,
                    'password' => $Pass,
                    'address' => $addAddress
                ]
                );
        if($user){
        	die('successfull');
        }else{
            echo "Sorry.Please Try Again.";
        }
    }
?>
