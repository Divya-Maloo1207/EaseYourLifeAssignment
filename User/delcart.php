<?php 
session_start();
// $items = $_SESSION['cart'];
// $cartitems = explode(",", $items);
// if(isset($_GET['remove'])){
//     $delitem = $_GET['remove'];
//     echo $cartitems[$delitem];
// 	unset($cartitems[$delitem]);
// 	$itemids = implode(",", $cartitems);
//     $_SESSION['cart'] = $itemids;
    
//     echo $itemids;
// }
// header('location:Cart.php');

if(isset($_GET['remove'])){
    foreach ($_SESSION['cart'] as $key=>$value){
        if($value['item_id']==$_GET['remove']){
            unset($_SESSION['cart'][$key]);
        }
    }
}
header('location:Cart.php');