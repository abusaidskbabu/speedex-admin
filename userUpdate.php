<?php 
	require __DIR__.'/vendor/autoload.php';

    use Illuminate\Database\Capsule\Manager as DB;

    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
	$phone = $_POST["phone"];
    $address = $_POST["city"];
	$userId = $_POST["userId"];


	$userUpdate = DB::table('admin')
            ->where('id',$userId)
            ->update(
            [
                'fullName' => $fullName,
                'email' => $email,
                'phone' => $phone,
                'address' => $address
            ]
            );
    if($userUpdate) {
        die('successfull');
    }else{
        echo "Something Wrong";
    }
?>