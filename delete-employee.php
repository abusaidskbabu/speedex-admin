<?php
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$userId = $_POST['id'];

$userDelete = DB::table('admin')
        ->where('id',$userId)
        ->delete();
if($userDelete){
	die('successfull');
}else{
	echo 'successfull';
}
?>