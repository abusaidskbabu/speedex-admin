<?php 
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
if (isset($_POST['action']) && $_POST['action'] == 'addNewShipper') {

	$addName = $_POST["addName"];
	$addPhone = $_POST["addPhone"];
	$addEmail = $_POST["addEmail"];
    $addCode = $_POST["addCode"];
    $addCity = $_POST["addCity"];
    $addCountry = $_POST["addCountry"];
	$addAddress = $_POST["addAddress"];


	if($user = DB::table('shippers')->select('name')->where('name',$addName)->first()){
        echo "This shipper name exist";
    }else if($user = DB::table('shippers')->select('shipper_code')->where('shipper_code',$addCode)->first()){
        echo "This shipper code exist";
    }else {
        $user = DB::table('shippers')->insert(
                [
                    'shipper_code' => $addCode,
                    'name' => $addName,
                    'phone' => $addPhone,
                    'email' => $addEmail,
                    'address' => $addAddress,
                    'city' => $addCity,
                    'country' => $addCountry,
                ]
                );
        if($user){
        	die('successfull');
        }else{
            echo "Sorry.Please Try Again.";
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'selectShipperDetails') {
    $userId = $_POST["id"];
    $user = DB::table('shippers')
            ->where('id',$userId)
            ->first();
    echo json_encode($user);
}

if (isset($_POST['action']) && $_POST['action'] == 'UpdateShipper') {
    
    $Name = $_POST["Name"];
    $Phone = $_POST["Phone"];
    $Email = $_POST["Email"];
    $Code = $_POST["Code"];
    $City = $_POST["City"];
    $Country = $_POST["Country"];
    $Address = $_POST["Address"];
    $shipper_id = $_POST['userId'];

    
    $userUpdate = DB::table('shippers')
            ->where('id',$shipper_id)
            ->update(
            [
                'phone' => $Phone,
                'email' => $Email,
                'address' => $Address,
                'city' => $City,
                'country' => $Country,
            ]
            );
    if($userUpdate) {
        die('successfull');
    }else{
        echo "Something Wrong";
    } 
}

if (isset($_POST['action']) && $_POST['action'] == 'deleteShipper') {
    $userId = $_POST['id'];

    $userDelete = DB::table('shippers')
            ->where('id',$userId)
            ->delete();
    if($userDelete){
        die('successfull');
    }else{
        echo 'Something wrong';
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'insertSubshipper') {

    $shipper_name = $_POST["shipper_name"];
    $addName = $_POST["addName"];
    $addPhone = $_POST["addPhone"];
    $addEmail = $_POST["addEmail"];
    $addCode = $_POST["addCode"];
    $addCity = $_POST["addCity"];
    $addCountry = $_POST["addCountry"];
    $addAddress = $_POST["addAddress"];


    if(DB::table('subshippers')->where(['shipper'=>$shipper_name, 'subshipper_name'=>$addName])->exists() ){
        echo "This shipper name already exist";
    }else if(DB::table('subshippers')->where(['shipper'=>$shipper_name, 'subshipper_code'=>$addCode])->exists()){
        echo "This shipper code already exist";
    }else {
        $user = DB::table('subshippers')->insert(
                [
                    'subshipper_code' => $addCode,
                    'shipper' => $shipper_name,
                    'subshipper_name' => $addName,
                    'subshipper_phone' => $addPhone,
                    'subshipper_email' => $addEmail,
                    'subshipper_address' => $addAddress,
                    'subshipper_city' => $addCity,
                    'subshipper_country' => $addCountry,
                ]
                );
        if($user){
            die('successfull');
        }else{
            echo "Sorry.Please Try Again.";
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'selectAllSubshipper') {
    $shipper_id = $_POST['id'];

    $allSubshipper = DB::table('subshippers')->where('shipper',$shipper_id)->get();
    echo '
    <table id="" class="table table-bordered mb-0 dt-responsive nowrap">
    <thead>
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>City</th>
        <th>Country</th>
        <th>Address</th>
    </tr>
    </thead>
    <tbody id="">';
        foreach ($allSubshipper as $sub ) { 
             echo '<tr>
                    <th scope="row">'.$sub->subshipper_code.'</th>
                    <td>'.$sub->subshipper_name.'</td>
                    <td>'.$sub->subshipper_email.'</td>
                    <td>'.$sub->subshipper_phone.'</td>
                    <td>'.$sub->subshipper_city.'</td>
                    <td>'.$sub->subshipper_country.'</td>
                    <td>'.$sub->subshipper_address.'</td>
                </tr>';
        }
    echo '    
    </tbody>
</table>';
}

if (isset($_POST['action']) && $_POST['action'] == 'selectAllShipperSubshipper') {
    $shipper_id = $_POST['id'];

    $allSubshipper = DB::table('subshippers')->where('shipper',$shipper_id)->get();
        echo '<option value="">Select</option>';
    foreach ($allSubshipper as $sb) {
        echo '<option value="'.$sb->subshipper_code.'">'.$sb->subshipper_name.'</option>';
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'selectAllSubshippers') {
   
    $subshipper_details = DB::table('shippers')->get();
        echo '<option value="">Select</option>';
    foreach ($subshipper_details as $ssb) {
        echo '<option value="'.$ssb->shipper_code.'">'.$ssb->shipper_code.' -'.$ssb->name.'</option>';
    }
}
?>