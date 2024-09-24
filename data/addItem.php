<?php 
require_once('../class/Item.php');

// Initialize $item object if it's not initialized in the included class file.
$item = new Item();

if(isset($_POST['data'])){
    $data = json_decode($_POST['data'], true);

    // Extract data from JSON array
    $iN = ucwords($data[0]);
    $aT = $data[1];
    $sN = $data[2];
    $mN = $data[3];
    $b = ucwords($data[4]);
    $a = $data[5];
    $pD = $data[6];
    $eID = $data[7];
    $cID = $data[8];
    $coID = $data[9];

    // Call insert_item method
    $result['valid'] = $item->insert_item($iN, $aT, $sN, $mN, $b, $a, $pD, $eID, $cID, $coID);
    
    if($result['valid']){
        $result['msg'] = "Item Added Successfully!";
        $result['action'] = "Add Data";
        echo json_encode($result);
    } else {
        // Handle the case where insertion fails
        $result['msg'] = "Failed to add item.";
        echo json_encode($result);
    }
}

// Disconnect from the database after the operation.
$item->Disconnect();


