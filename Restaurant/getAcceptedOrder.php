<html>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
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
    box-shadow: 5px 10px #888888;
}
</style>
</head>
<body>
<?php
 require "connect.inc.php";
 require "core.inc.php";
 $acceptedOrder = 'A';
 $sqlQuery = "SELECT * FROM `tblprocessflow` WHERE `ProcessFlag`='".mysql_real_escape_string($acceptedOrder)."' Order by `CartId` DESC";
 $result = mysqli_query($con,$sqlQuery);
 while($row = mysqli_fetch_array($result)){
    $cart_id = $row['CartId'];
    $cart_detail_id = $row['CartDetailsId'];
    $totalAmount = $row['totalAmount'];
    $address = $row['DeliveryAddress'];
    $contact = $row['userContact'];
    //echo $row['CartId']." ".$row['CartDetailsId']."<button class='btn btn-success' onclick='acceptOrder($cart_id)'>Accept</button><br><br>";
    echo "<div class='OrderDetails'>
            <b>Order No.".$cart_id."<font style='color: #4CAF50;margin-left:20px;'>Accepted</font></b><hr>
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
        echo "</table><hr><b>Total Amount : Rs.$totalAmount</div><br>";
}
?>
<script type="text/javascript">
    function acceptOrder(){
        var cartId = 0;
        alert(cartId);
        // <?php
        //     $lcart_id = "<script>document.write(cartId)</script>";
        //     $query = "UPDATE `tblprocessflow` SET `ProcessFlag`='A', `OrderStatus`='Accepted' WHERE `CartId` =$lcart_id";
        //     if ($query_run = mysql_query($query)){
        //         echo "<script></script>";
        //     }
        // ?>
    }
</script>
<body>
</html>  
