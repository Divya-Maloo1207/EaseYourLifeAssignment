<?php 
session_start();
require_once('connect.inc.php');
include('header_layout.php');
include('navigation.php');?>
<form method="POST" action="CartItem.php">
Enter Name :        <input type = "text" name="userName"><br><br>
Enter Contact No. : <input type = "text" name="userContact"><br><br>
Enter Address :     <input type = "text" name="userAddress"><br><br>
<button class='btn btn-primary' type='submit' name="placeOrder">Place Order</button>
</form>
<?php
if(isset($_GET['errmsg'])){
    $errormsg = $_GET['errmsg'];
    if($errormsg=='C'){
        
    }
}

if(isset($_POST['userName']) && isset($_POST['userContact']) && isset($_POST['userAddress'])){
    $userId = $_POST['userName'];
    $userContact = $_POST['userContact'];
    $delAddress = $_POST['userAddress'];
    if(strlen($userContact)!=10){
        echo "Contact number length should be equal to 10.";
    }
    else{
    
$total = '';
$i=1;
$delTime = 0;
// /echo $items;
$maxCartDetailId = "SELECT max(`CartDetailsId`) AS maxCart from tblCartDetails";
$res1=mysqli_query($con, $maxCartDetailId);
$r1 = mysqli_fetch_assoc($res1);
$cartDetailsId = $r1['maxCart'] +1;
//echo $cartDetailsId;
if(isset($_SESSION['cart'])){
	foreach ($_SESSION['cart'] as $key=>$value) {
        $id = $value['item_id'];
        $quantity = $value['item_quantity'];
        $sql = "SELECT * FROM `tblmenu` WHERE `itemId` = $id";
        $res=mysqli_query($con, $sql);
        $r = mysqli_fetch_assoc($res);
        $itemName = $r['itemName'];
        if($r['DeliveryTime']>$delTime){
            $delTime = $r['DeliveryTime'];
        }
        //echo $itemName;
        $sqlInsert = "INSERT INTO `tblCartDetails`(`CartDetailsId`, `ItemId`, `ItemName`, `Quantity`) VALUES ('".mysql_escape_string($cartDetailsId)."','".mysql_escape_string($id)."','".mysql_escape_string($itemName)."','".mysql_escape_string($quantity)."')";
       $resInsert = mysqli_query($con,$sqlInsert);
       //echo  mysqli_error($con);
?>
<?php 
	$total = $total + ($r['price']*$value['item_quantity']);
	$i++; 
    } 
 }
 $currentDate = date('Y-m-d');
 $currentTime = date("H:i:s");
$sqlCart = "INSERT INTO `tblprocessflow`(`CartDetailsId`, `ProcessFlag`, `totalAmount`, `PaymentMode`, `userID`, `DeliveryAddress`, `OrderDate`, `OrderTime`, `OrderStatus`,`userContact`,`DeliveryTime`) VALUES ($cartDetailsId,'R',$total,'COD','".mysql_escape_string($userId)."','".mysql_escape_string($delAddress)."','".mysql_escape_string($currentDate)."','".mysql_escape_string($currentTime)."','New Order','".mysql_escape_string($userContact)."','".mysql_escape_string($delTime)."')";
if($resCartInsert = mysqli_query($con,$sqlCart)){
            echo "Your Order has been placed and waiting for Restaurant to accpet.<br><b>Your Reference Number is $cartDetailsId.";
            unset($_SESSION['cart']);
            //header('Location : viewOrderDetails.php?id='.$cartDetailsId);
}
}
}
else{
    echo "Enter All Details";
}
include('footer_layout.php'); ?>