<html>
<style>
.btn-success{
    width:120px;
    height:40px;
    background-color:#4CAF50;
    border-radius: 5px;
    
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    padding : 10px;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
.OrderDetails{
    width : 70%;
    background-color: #ecf2f9;
    padding: 15px;
    margin:20px;
    box-shadow: 5px 10px #888888;
}
</style>
</head>
</html> 
<?php
 require "connect.inc.php";
 require "core.inc.php";
 $newOrder = 'R';
 $sqlQuery = "SELECT * FROM `tblprocessflow` WHERE `ProcessFlag`='".mysql_real_escape_string($newOrder)."' Order by `CartId` DESC";
 $result = mysqli_query($con,$sqlQuery);
 while($row = mysqli_fetch_array($result)){
    $cart_id = $row['CartId'];
    $cart_detail_id = $row['CartDetailsId'];
    $address = $row['DeliveryAddress'];
    $totalAmount = $row['totalAmount'];
    $contact = $row['userContact'];
    //echo $row['CartId']." ".$row['CartDetailsId']."<button class='btn btn-success' onclick='acceptOrder($cart_id)'>Accept</button><br><br>";
     echo "<div class='OrderDetails'>
             <b>Order No.".$cart_id."</b><br><br>
             <b>Delivery Address : ".$address."</b><br><br>
             <b>Contact Number : ".$contact."</b><br><br>
            <table>
              <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Comments</th></tr>";
    $query =  "SELECT * FROM `tblCartDetails` WHERE `CartDetailsId`='".mysql_real_escape_string($cart_detail_id)."'"; 
    $resultItem = mysqli_query($con,$query);
    while($items = mysqli_fetch_array($resultItem))  {
        $itemName = $items['ItemName'];
        $quantity = $items['Quantity'];
        $comments = $items['Comments'];
        echo "<tr><td>".$itemName."</td><td>".$quantity."</td><td>".$comments."</td></tr>";
    }   
    echo "</table><hr><b>Total Amount : Rs.$totalAmount<br><br><button class='btn-success' onclick=\"location.replace('viewDetails.php?id=$cart_id')\">Accept Order</button></div><br>";
}
?>
 
