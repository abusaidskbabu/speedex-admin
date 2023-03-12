<?php 

require __DIR__.'/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;


$users = DB::table('admin')->where('role',0)->get(); 

$count = 1;
foreach ($users as $user ) { 
	 echo '<tr>
            <th scope="row">'.$count.'</th>
            <td>'.$user->fullName.'</td>
            <td>'.$user->email.'</td>
            <td>'.$user->phone.'</td>
            <td>'.$user->address.'</td>
            <td>
                <button type="submit" class="btn btn-info edit_data" name="edit" value="Edit" id="'.$user->id.'"><i class="mdi mdi-transcribe"></i> </button>

                <button type="submit" class="btn btn-danger delete_btn" name="delete_btn" value="Delete" id="'.$user->id.'" ><i class=" mdi mdi-delete-forever"></i> </button>
            </td>
        </tr>';
    $count++;
}
?>