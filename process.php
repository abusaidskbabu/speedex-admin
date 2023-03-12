<?php 
session_start();
require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
//new shipper insert
if(isset($_POST["action"]) && $_POST["action"] == 'newShipper'){ 

	$tracking_no = $_POST["tracking_no"];
	$date = $_POST["date"];
    $reference_no = $_POST["reference_no"];
	$pieces = $_POST["pieces"];
	$weight = $_POST["weight"];
    $description = $_POST["description"];

    $shipper_id = $_POST["shipper_name"];

    if (empty($_POST["subshipper"])) {
        $subshipper_id = $_POST["shipper_name"];
    }else{
        $subshipper_id = $_POST["subshipper"];
    }
    

    // $shipper_name = $_POST["shipper_name"];
    // $shipper_city = $_POST["shipper_city"];
    // $shipper_country = $_POST["shipper_country"];
    // $shipper_address = $_POST["shipper_address"];

    $consignee = $_POST["consignee"];
    $consigneeAddress = $_POST["consigneeAddress"];
    $consignee_country = $_POST["consignee_country"];
    $consignee_city = $_POST["consignee_city"];
    $dox_spx = $_POST["dox_spx"];
    // $destination = $_POST["destination"];
    $via = $_POST["via"];
    $remarks = $_POST["remark"];

    // $total_amount = $pieces * $weight;
	

	if($user = DB::table('shipers_details')->select('tracking_no')->where('tracking_no',$tracking_no)->first()){
        die("This Tracking No Already Inserted");
    }else {
        $user = DB::table('shipers_details')->insert(
                [
                    'tracking_no' => $tracking_no,
                    'reference_no' => $reference_no,
                    'date' => $date,
                    'pieces' => $pieces,
                    'weight' => $weight,
                    'descriptions' => $description,
                    'shipper_id' => $shipper_id,
                    'subshipper_id' => $subshipper_id,
                    'consignee' => $consignee,
                    'consigneeAddress' => $consigneeAddress,
                    'consignee_country' => $consignee_country,
                    'consignee_city' => $consignee_city,
                    'dox_spx' => $dox_spx,
                    'via' => $via,
                    'remarks' => $remarks,
                ]
                );
        if($user){
        	die('successfull');
        }else{
            echo "Sorry.Please Try Again.";
        }
    }
}

// update shipment
if(isset($_POST["action"]) && $_POST["action"] == 'updateShipment'){ 

    $mainTrackingNo = $_POST["mainTrackingNo"];
    
    $date = $_POST["date"];
    $reference_no = $_POST["reference_no"];
    $pieces = $_POST["pieces"];
    $weight = $_POST["weight"];
    $description = $_POST["description"];

    $shipper_id = $_POST["shipper_name"];

    if (empty($_POST["subshipper"])) {
        $subshipper_id = $_POST["shipper_name"];
    }else{
        $subshipper_id = $_POST["subshipper"];
    }
    
    $consignee = $_POST["consignee"];
    $consigneeAddress = $_POST["consigneeAddress"];
    $consignee_country = $_POST["consignee_country"];
    $consignee_city = $_POST["consignee_city"];
    $dox_spx = $_POST["dox_spx"];
    $via = $_POST["via"];
    $remarks = $_POST["remark"];

    $user = DB::table('shipers_details')
    ->where('tracking_no', $mainTrackingNo)
    ->update(
        [
            
            'reference_no' => $reference_no,
            'date' => $date,
            'pieces' => $pieces,
            'weight' => $weight,
            'descriptions' => $description,
            'shipper_id' => $shipper_id,
            'subshipper_id' => $subshipper_id,
            'consignee' => $consignee,
            'consigneeAddress' => $consigneeAddress,
            'consignee_country' => $consignee_country,
            'consignee_city' => $consignee_city,
            'dox_spx' => $dox_spx,
            'via' => $via,
            'remarks' => $remarks,
        ]
    );
    if($user){
        die('successfull');
    }else{
        echo "Sorry.Please Try Again.";
    }
}
// new payment Insert

if(isset($_POST["action"]) && $_POST["action"] == 'newPayment'){ 

    $payment_date =$_POST["invoice_date"];

    $ui_id = '';
    $ui_id .= 10000;
    
    $id = DB::table('payments')->orderByDesc('payments.id')->first();
    $lastId = $id->id ?? 1;
    $lastId++;
    $ui_id .= $lastId;
    
    $shipper_name = $_POST["shipper_name"];

    $total = $_POST["total"];
    $fuelCharge = $_POST["fuelCharge"];
    $afterFuelCharge = $_POST["afterFuelCharge"];
    $TTL = $_POST["ttlus"];
    $rate = $_POST["rate"];
    $bdt = $_POST["bdt"];

    $date = $_POST["payment_date"];
    $awb = $_POST["awb"];
    $dest = $_POST["dest"];
    $weight = $_POST["weight"];
    $dox_spx = $_POST["dox_spx"];
    $amount = $_POST["amount"];
    $remarks = $_POST["remarks"];
    
    $payment = DB::table('payments')->insert(
        [
            'u_id' => $ui_id,
            'payment_date' => $payment_date,
            'shipper_id' => $shipper_name,
            'total' => $total,
            'fuelCharge' => $fuelCharge,
            'afterFuelCharge' => $afterFuelCharge,
            'TTL' => $TTL,
            'usd_rate' => $rate,
            'bdt' => $bdt
        ]
    );
    
   
    if($payment){
        $payment_status = false;
        for($p = 0; $p < count($_POST["payment_date"]); $p++){
            $tracking_no = $_POST["awb"][$p];
            $updateShipment = DB::table('shipers_details')
            ->where('tracking_no',$tracking_no)
            ->update(
                [
                    'payment' => 1,
                ]
            );

            if ($updateShipment) {
                $payment2 = DB::table('payment_details')->insert(
                    [
                        'u_id' => $ui_id,
                        'date' => $_POST["payment_date"][$p],
                        'awb' => $_POST["awb"][$p],
                        'shipper_id' => $shipper_name,
                        'dest' => $_POST["dest"][$p],
                        'weight' => $_POST["weight"][$p],
                        'dox_spx' => $_POST["dox_spx"][$p],
                        'charge' => $_POST["amount"][$p],
                        'remarks' => $_POST["remarks"][$p]
                    ]
                );
                $payment_status = true;
            }
        }
        if($payment_status == true){
            die('successfull');
        }else{
            echo "Sorry.Please Try Again.";
        }
    }else{
        echo "Sorry.Please Try Again.";
    }
}

if(isset($_POST["payment_date"])){ 
    $shipper_code = $_POST['shipper_code'];
    $payment_status = false;
    for($p = 0; $p < count($_POST["payment_date"]); $p++){
        $payment = DB::table('statements')->insert(
            [
                'shipper_code' => $shipper_code,
                'payment_date' => $_POST["payment_date"][$p],
                'particulars' => $_POST["particulars"][$p],
                'bill_amount' => $_POST["bill_amount"][$p],
                'paid_amount' => $_POST["paid_amount"][$p],
                'remarks' => $_POST["remarks"][$p],
            ]
            );
        $payment_status = true;
    }
    if($payment_status == true){
        die('successfull');
    }else{
        echo "Sorry.Please Try Again.";
    }
}

if(isset($_POST["action"]) && $_POST["action"] == 'selectShipper'){ 
    $tracking_no = $_POST['parametar'];
    
   $bill_details2 = DB::table('shipers_details')
        ->join('shippers', 'shippers.shipper_code', '=', 'shipers_details.shipper_id')
        ->where('tracking_no',$tracking_no)
        ->first();
    echo json_encode($bill_details2);
}

if(isset($_POST["action"]) && $_POST["action"] == 'searchBill'){ 
    $tracking_no = $_POST["tracking_no"];
    $data = [];

    if($bill = DB::table('bill_details')->where('tracking_no',$tracking_no)->first()){
        $data['bill'] = $bill;
        $data['bill_exist'] = 'yes';
    }


    $bill_details = DB::table('shipers_details')
        ->where('tracking_no',$tracking_no)
        ->first();
    if (empty($bill_details->shipper_id)) {
        $bill_details2 = DB::table('shipers_details')
        ->join('subshippers', 'subshippers.subshipper_code', '=', 'shipers_details.subshipper_id')
        ->where('shipers_details.tracking_no',$tracking_no)
        ->first();
    }else{
        $bill_details2 = DB::table('shipers_details')
        ->join('shippers', 'shippers.shipper_code', '=', 'shipers_details.shipper_id')
        ->where('tracking_no',$tracking_no)
        ->first();
    }

    $data['bill_details2'] = $bill_details2;

    echo json_encode($data);
    
}

if(isset($_POST["action"]) && $_POST["action"] == 'selectBillDetails'){ 
    $tracking_no = $_POST["tracking_no"];

    $bill_details = DB::table('shipers_details')
        ->where('tracking_no',$tracking_no)
        ->first();
    
        $bill_details2 = DB::table('bill_details')
        ->join('shipers_details', 'shipers_details.tracking_no', '=', 'bill_details.tracking_no')
        ->join('shippers', 'shippers.shipper_code', '=', 'shipers_details.shipper_id')
        ->where('bill_details.tracking_no',$tracking_no)
        ->first();
    
    echo json_encode($bill_details2);
    
}    

if (isset($_POST["action"]) && $_POST["action"] == 'updateShiper') {
    $tNo = $_POST["tn"];
    $remarks = $_POST["remarks"];
    
    $shipperUpdate = DB::table('shipers_details')->where('tracking_no',$tNo)
    ->update(
    [
        'remarks' => $remarks
    ]
    );
    if($shipperUpdate) {
        die('successfull');
    }else{
        echo "Something Wrong";
    }
}
if(isset($_POST["action"]) && $_POST["action"] == 'updateBill'){ 
    
    $tr_no = $_POST["tr_no"];
    $description = $_POST["description"];
    $bill_date = date("Y-m-d");

    $rate_per_gm = $_POST["rate_per_gm"];
    $total_wt_charge = $_POST["total_wt_charge"];
    $doct = $_POST["doct"];
    $service_charge = $_POST["service_charge"];
    $sample = $_POST["sample"];
    $total_charge = $_POST["total_charge"];
    $weight = $_POST["weight"];
    $pieces = $_POST["pieces"];
    $amount_word= $_POST["amount_word"];
    
    $total = $_POST["total"];

    if($_POST['bill_exist'] == 'yes' && $user = DB::table('bill_details')->select('tracking_no')->where('tracking_no',$tr_no)->first()){

        $billUpdate = DB::table('bill_details')
            ->where('tracking_no', $tr_no)
            ->update(
                [   
                    'bill_descriptions' => $description,
                    'bill_weight' => $weight,
                    'bill_pieces' => $pieces,
                    'total_amount' => $total,
                    'rate_per_gm' => $rate_per_gm,
                    'total_wt_charge' => $total_wt_charge,
                    'doct' => $doct,
                    'service_charge' => $service_charge,
                    'sample' => $sample,
                    'total_charge' => $total_charge,
                    'taka_in_word' => $amount_word
                ]
            );
        // die("This Bill Already Inserted");
    }else {

        $billUpdate = DB::table('bill_details')->insert(
            [   
                'tracking_no' => $tr_no,
                'bill_date' => $bill_date,
                'bill_descriptions' => $description,
                'bill_weight' => $weight,
                'bill_pieces' => $pieces,
                'total_amount' => $total,
                'rate_per_gm' => $rate_per_gm,
                'total_wt_charge' => $total_wt_charge,
                'doct' => $doct,
                'service_charge' => $service_charge,
                'sample' => $sample,
                'total_charge' => $total_charge,
                'taka_in_word' => $amount_word
            ]
        );    
    }

    if($billUpdate) {
        die('successfull');
    }else{
        echo "Something Wrong";
    }
}
//update bill details
if(isset($_POST["action"]) && $_POST["action"] == 'updateBillDetails'){ 
    
    $tr_no = $_POST["tr_no"];
    $description = $_POST["description"];
    
    $rate_per_gm = $_POST["rate_per_gm"];
    $total_wt_charge = $_POST["total_wt_charge"];
    $doct = $_POST["doct"];
    $service_charge = $_POST["service_charge"];
    $sample = $_POST["sample"];
    $total_charge = $_POST["total_charge"];
    $weight = $_POST["weight"];
    $pieces = $_POST["pieces"];
    $amount_word= $_POST["amount_word"];
    
    $total = $_POST["total"];

    $billUpdate = DB::table('bill_details')
    ->where('tracking_no', $tr_no)
    ->update(
    [   
        'bill_descriptions' => $description,
        'bill_weight' => $weight,
        'bill_pieces' => $pieces,
        'total_amount' => $total,
        'rate_per_gm' => $rate_per_gm,
        'total_wt_charge' => $total_wt_charge,
        'doct' => $doct,
        'service_charge' => $service_charge,
        'sample' => $sample,
        'total_charge' => $total_charge,
        'taka_in_word' => $amount_word
    ]
    );
    if($billUpdate) {
        die('successfull');
    }else{
        echo "Something Wrong";
    }
   
}

if (isset($_POST["action"]) && $_POST["action"] == 'changePassword') {
    $u_email = $_SESSION["email"];
    $curPass = md5($_POST["curPass"]);
    $newPass = md5($_POST["newPass"]);
    
    if($admins = DB::table('admin')->where(['email'=>$u_email, 'password'=>$curPass])->exists() ){
        $userUpdate = DB::table('admin')->where('email',$u_email)
        ->update(
        [
            'password' => $newPass
        ]
        );
        if($userUpdate) {
            die('successfull');
        }else{
            echo "Something Wrong";
        }
    }else{
        echo "Current password not match.";
    }
    
}

if (isset($_POST['action']) && $_POST['action'] == 'FilterShipperPayment') {
    $shipper_name = $_POST['shipper_name'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

    $shippers = DB::table('shipers_details')
                ->whereBetween('date', [$date1, $date2])
                ->where('subshipper_id', $shipper_name)
                ->where('payment', 0)
                ->get();

    echo '<table class="table table-bordered" id="productTable">
            <thead>
                <tr>
                   <th>S/L</th>
                   <th>Date</th>
                   <th>Awb#</th>
                   <th>Dest</th>
                   <th>Dox/Spx</th>
                   <th>Weight</th>
                   <th>Amount U.S $</th>
                   <th>Remarks</th>
                </tr>
            </thead>
            <tbody>';

                $arrayNumber = 1;
                foreach ($shippers as $sp) {
                   
                    echo '<tr id="row'.$arrayNumber.'" class="'.$arrayNumber.'">
                        <td style="">
                            <div class="form-group">
                                '.$arrayNumber.'
                            </div>
                        </td>
                        <td style="">
                            <div class="form-group">
                                <input type="Date" name="payment_date[]" id="payment_date'.$arrayNumber.'" class="form-control" 
                                value="'.$sp->date.'" required placeholder="Date"/>
                            </div>
                        </td>
                        <td style="">
                            <div class="form-group">
                                <input type="text" name="awb[]" id="awb'.$arrayNumber.'" autocomplete="off" value="'.$sp->tracking_no.'" class="form-control" required placeholder="Awb #"/>
                            </div>
                        </td>
                        <td style="">
                            <div class="form-group">
                                <input type="text"  name="dest[]" id="dest'.$arrayNumber.'" autocomplete="off" value="'.$sp->consignee_city.'" class="form-control" required placeholder="Dest"/>
                            </div>
                        </td>
                        <td style="">
                            <div class="form-group">
                                <select name="dox_spx[]" id="dox_spx'.$arrayNumber.'" class="form-control" required>';
                                    if($sp->dox_spx == 'SPX'){
                                        echo '<option value="SPX" selected>SPX</option>
                                                <option value="WPX">WPX</option>';
                                    }else{
                                        echo '<option value="SPX" >SPX</option>
                                                <option value="WPX" selected>WPX</option>';
                                    }
                                echo '    
                                </select>
                            </div>
                        </td>
                        <td style="">
                            <div class="form-group">
                                <input data-parsley-type="number" type="text"  name="weight[]" id="weight'.$arrayNumber.'"  value="'.$sp->weight.'" class="form-control" autocomplete="off" required placeholder="Weight"/>
                            </div>
                        </td>
                        <td style="">
                            <div class="form-group">
                                <input type="text"  name="amount[]" id="amount'.$arrayNumber.'" onkeyup="getTotal('.$arrayNumber.')" class="form-control" autocomplete="off" required placeholder="Amount U.S.$"/>
                            </div>
                        </td>
                        
                        <td style="">
                            <div class="form-group">
                                <input type="text"   name="remarks[]" id="remarks'.$arrayNumber.'" class="form-control" autocomplete="off" placeholder="Remarks"/>
                            </div>
                        </td>
                    </tr>';
                    $arrayNumber++;
                } 
            echo '</tbody>
        </table>
        <input type="hidden" name="shipper_name" value="'.$shipper_name.'" />
        ';
}

if (isset($_POST['action']) && $_POST['action'] == 'filterStatement') {
    $shipper_name = $_POST['shipper_name'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

    $shippers = DB::table('statements')
        ->whereBetween('statements.payment_date', [$date1, $date2])
        ->where('statements.shipper_code', $shipper_name)
        ->get();
    $sip_od_sub = DB::table('shippers')
    ->where('shipper_code', $shipper_name)
    ->first();
    $name = $sip_od_sub->name;
    $city = $sip_od_sub->city;
    $country = $sip_od_sub->country;
    $address = $sip_od_sub->address;

    echo '<div class="col-lg-12">
        <div class="card-box" >
            <div class="row">
                <div class="col-md-6">
                    <h4>'.$name.'</h4>
                    <h6>'.$address.'</h6>
                    <h6>'.$city.', '.$country.'</h6>
                    
                </div>
                <div class=" col-md-6">
                    </br>
                    <h6 class="float-right">'.date('d - F, Y').'</h6>
                </div>
                <div class="col-md-12 mb-2">
                    <h4 class="text text-center mb-0">Statement of Account</h4>
                </div>
            </div>
            <table class="table table-bordered mb-0 " id="prindDiv">
                
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Particulars</th>
                    <th>Bill Amount</th>
                    <th>Paid Amount</th>
                    <th>Balance</th>
                    <th>Remarks</th>
                </tr>
                </thead>
                <tbody>';
                
                
                $balance = 0.00;
                $total_bill = 0;
                $total_paid = 0;
                foreach ($shippers as $stm) { 
                    $total_bill = $total_bill + $stm->bill_amount;
                    $total_paid = $total_paid + $stm->paid_amount;
                    $balance = $balance + ($stm->paid_amount - $stm->bill_amount);
                echo '
                <tr>
                    <th>'.$stm->payment_date.'</th>
                    <td>'.$stm->particulars.'</td>
                    <td>';
                    if($stm->bill_amount == 0){
                        echo("");
                    }else{
                       echo $stm->bill_amount;  
                    }
                    echo '
                    </td>
                    <td>';
                    if ($stm->paid_amount == 0) {
                        echo '';
                    }else{
                        echo $stm->paid_amount; 
                    }
                    echo '
                    </td>
                    <td>';
                    if (abs($balance) == 0) {
                        echo "";
                    }else if ($balance < 0) {
                        echo abs(sprintf("%.2f", $balance)); 
                    }else{
                        echo abs(sprintf("%.2f", $balance)); echo ' (Advance)';
                    }
                    echo '
                    </td>
                    <td>'.$stm->remarks.'</td>
                </tr>';
                } 
                echo '
                </tbody>
            </table>
            <div class="col-md-12 mt-2">';
                include 'convert_number_to_word.php';
                $wbalance = abs($balance);
                $wnBalance = sprintf("%.2f", $wbalance);
                echo ' 
                <p class="m-0 p-0">Amount in word:  Taka '.convertNumber($wnBalance).' Only </p>
                <p class="m-0 p-0">N.B. Please pay in cash / cheque/ pay order in favour of <b >GLOBAL NETWORK</b></p>
                <br>
                <br>
                <p class="m-0 p-0">Best regards</p>
            </div>
        </div>
    </div>';
    
}

?>
