<?php
require_once('connect.inc.php');
include('header_layout.php');
include('navigation.php');
?>
<html>
<head>
<style>
 table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 80%;
    margin-left : 20px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
</style>
</head>
<div style="margin:60px;">
<form action="viewOrderDetails.php" method = "POST">
Enter Contact No. : <input type = "text" name="userContact"><br><br>
<button class='btn btn-primary' type='submit' name="getDetails">get Order Details >></button>
</form>
</div>
</html>
<?php
if(isset($_GET['errmsg'])){
    $errormsg = $_GET['errmsg'];
    if($errormsg=='C'){
        echo "Contact number length should be equal to 10.";
    }
}

 if(isset($_POST['userContact'])){
     $contact = $_POST['userContact'];
     $len =  (int)strlen($contact);
     
     if($len !=10){
        echo "<font style='color:red;'>Contact number length should be equal to 10.</font>";
    }
else{
 $query = "SELECT * FROM `tblprocessflow` WHERE `userContact` = '".mysql_escape_string($contact)."'";
 $resultItem = mysqli_query($con,$query);
 $num_rows = mysqli_num_rows($resultItem);
 if($num_rows >0){
     echo "<table>
            <tr>
            <th> Reference No</th>
            <th> Status</th></tr>
            ";
    while($items = mysqli_fetch_array($resultItem))  {
        $status = $items['ProcessFlag'];
        $orderNo = $items['CartDetailsId'];
        //echo $status;
        $time = $items['DeliveryTime'];
        $statusmsg;
        if($status=='R'){
            echo "<tr><td>".$orderNo."</td>
             <td><font style='color:blue'>Waiting for confirmation</font></tr>";
            //$statusmsg = "Waiting for confirmation";
        }
        else if($status == 'A'){
            echo "<tr><td>".$orderNo."</td>
             <td><font style='color:green'>Order will be delivered in ".$time." minutes.</font></tr>";
            //$statusmsg = "Order will be delivered in ".$time." minutes.";
        }
        else if($status == 'C'){
            echo "<tr><td>".$orderNo."</td>
             <td><font style='color:red'>Order has been cancelled.</font></tr>";
            $statusmsg = "Order has been cancelled.";
        }

        

        // if($status=='R'){
        //     echo "<font style='font-size:20px;margin:60px;'>Your Order Reference No. $orderNo has been placed and waiting for Restaurant to confirm.<font>";
        // }
        // else if($status=='A'){
        //     echo "<font style='font-size:20px;margin:60px;'>Your Order Reference No. $orderNo has been confirmed by Restaurant. And will be delivered in $time minutes.<font>";
        // }else if($status=='C'){
        //     echo "<font style='font-size:20px;margin:60px;'>Sorry for the Inconvience!!. Your Order Reference No. $orderNo has been cancelled by Restaurant.<br><font>";
        // }       
    } 
    echo "</table>";
 }
 else{
    echo "<font style='font-size:20px;margin:60px;'>No Order has been Placed by $contact.<font>";
 }
}
 }
?>




