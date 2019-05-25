<html>
<head>
<style>
.Item{
    width : 60%;
    height : 8%;
    background-image: linear-gradient(#ebfafa, #d6f5f5);
    margin-left : 10px;
    margin-top : 15px;
    box-shadow: 5px 5px #1f7a7a;
    padding-left: 50px;
    padding-top: 10px;
    color : #1f7a7a;
    cursor: pointer;
}
</style>
</head>
</html>
<?php
include('header_layout.php');
include('navigation.php');
require "connect.inc.php";
$category = $_GET['type'];
$query = "SELECT * FROM `tblmenu` WHERE `Category`='".mysql_real_escape_string($category)."'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)){  
    $itemId = $row['itemId'];
    echo "<div class='Item'>
    <form method='POST' action='addToCart.php?id=$itemId&category=$category'>
    <div class='row' style = 'margin-left:10px;'>
    <div class='col-sm-3'><b>".$row['itemName']."</b></div>
    <div class='col-sm-2'><b>Rs.".$row['price']."</b></div>
    <div class='col-sm-3'><input type='number' name='quantity' placeholder='Quantity'></div>
    <div class='col-sm-2'><button class='btn btn-primary' type='submit'>Add to Cart</div></div></form></div>";
}
?>