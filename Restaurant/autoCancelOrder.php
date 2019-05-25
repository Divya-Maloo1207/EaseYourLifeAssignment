<?php
require "connect.inc.php";
require "core.inc.php";
$currentTime = date("H:i:s");

$query = "SELECT DATE_ADD(`OrderTime`, INTERVAL 1 MINUTE) AS addedTime,`CartId` from tblprocessflow where `ProcessFlag`='R'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)){
    //echo $row['addedTime']." Current Time: ".$currentTime;
    if($currentTime > $row['addedTime']){
        $cart_id = $row['CartId'];
        $updateQuery = "UPDATE `tblprocessflow` Set `ProcessFlag`='C', `OrderStatus`='Cancelled' WHERE `CartId`='".mysql_real_escape_string($cart_id)."'";
        $query_run = mysqli_query($con,$updateQuery);
        $historyQuery = "INSERT INTO `tblprocessFlowStatus`(`CartId`, `StatusMsg`) VALUES ($cart_id,'Restaurant did not accept the Order')";    
        $query_run1 = mysqli_query($con,$historyQuery);    
    }
}
?>