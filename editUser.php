<?php 
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$userId = $_POST["id"];
$user = DB::table('admin')
        ->where('id',$userId)
        ->first();

echo json_encode($user);
?>