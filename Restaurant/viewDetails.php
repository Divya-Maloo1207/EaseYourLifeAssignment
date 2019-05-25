<html>
<style>
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
    box-shadow: 5px 10px #888888;
    margin:20px;
}
.btn-success{
    width:120px;
    height:40px;
    background-color:#4CAF50;
    border-radius: 5px;
    
}
.btn-default{
    width:80px;
    height:40px;
    background-color:#0080FF;
    border-radius: 5px;
}
</style>
</head>
 <body>

  <button  onclick="location.replace('home.php')" class="btn-default"><font style='color:#ffffff'><- Back</font></button>
  <!-- <?php
 require "connect.inc.php";
 require "core.inc.php";
$cart_id = $_GET['id'];

echo "<div class='OrderDetails'>
<b>Order No.".$cart_id."</b><br><br>
        <table>
          <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Comments</th></tr>";
$query =  "SELECT * FROM `tblCartDetails` WHERE `CartDetailsId`=(SELECT `CartDetailsId` from `tblprocessflow` where `Cartid`='".mysql_real_escape_string($cart_id)."')"; 
$resultItem = mysqli_query($con,$query);
while($items = mysqli_fetch_array($resultItem))  {
    $itemName = $items['ItemName'];
    $quantity = $items['Quantity'];
    $comments = $items['Comments'];
    echo "<tr><td>".$itemName."</td><td>".$quantity."</td><td>".$comments."</td></tr>";
}   
    echo "<table><br><button class='btn-success' onclick='acceptOrder()'><font style='color:#ffffff'>Accept</font></button><div>";
 
 ?> -->


 <script type="text/javascript">
 function acceptOrder(){   
     <?php  
     $query1 = "UPDATE `tblprocessflow` SET `ProcessFlag`='A', `OrderStatus`='Accepted' WHERE `CartId`='".mysql_real_escape_string($cart_id)."'";
     $query_run = mysqli_query($con,$query1);
     $historyQuery = "INSERT INTO `tblprocessFlowStatus`(`CartId`, `StatusMsg`) VALUES ($cart_id,'Order is accepted by Restaurant.')";
     //$query_run = mysqli_query($con,$query);
    
     $query_run1 = mysqli_query($con,$historyQuery);     
   ?>
 }
 window.location.replace('home.php');
 </script> 
 </body>
 </html>