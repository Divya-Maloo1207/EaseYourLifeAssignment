<?php 
session_start();
require_once('connect.inc.php');
include('header_layout.php');
include('navigation.php');
	?>
<div class="container">
	<div class="row">
	  <table class="table">
	  	<tr>
	  		<th>S.NO</th>
	  		<th>Item Name</th>
			<th>Quantity</th>
	  		<th>Price</th>
	  	</tr>
<?php
// $items = $_SESSION['cart'];
// $cartitems = explode(",", $items);
$total = 0;
$i=1;
if(isset($_SESSION['cart'])){
	foreach ($_SESSION['cart'] as $key=>$value) {
		$id = $value['item_id'];
		$sql = "SELECT * FROM `tblmenu` WHERE `itemId` = $id";
		$res=mysqli_query($con, $sql);
		$r = mysqli_fetch_assoc($res);		
?>	  	
	<tr>
		<td><?php echo $i; ?></td>
		<td><a href="delcart.php?remove=<?php echo $id; ?>">Remove</a> <?php echo $r['itemName']; ?></td>
		<td><?php echo $value['item_quantity'];?></td>
		<td>Rs <?php echo number_format($r['price'],2,'.', ''); ?></td>

	</tr>
<?php 
	$total = $total + ($r['price']*$value['item_quantity']);
	$i++; 
	}
}
?>
<tr>
	<td></td>
	<td><strong>Total Price</strong></td>
	<td><strong>Rs <?php echo number_format($total,2,'.', ''); ?></strong></td>
	<?php
	if (count($_SESSION['cart'])>0){
		echo "<td><a href='CartItem.php' class='btn btn-info'>Checkout</a></td>";
	}
	else{
		echo "<td><a href='CartItem.php' class='btn btn-info' disabled>Checkout</a></td>";
	}
	
	?>
</tr>
<?php 
include('footer_layout.php');?>