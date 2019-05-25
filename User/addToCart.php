<?php
    session_start();
    $category = $_GET['category'];
    if(isset($_POST['quantity']) && $_POST['quantity']!=null){
        $quan = $_POST['quantity'];
        //echo $quan;
    }
    else{
        $quan = 1;
    }
    
	if(isset($_SESSION['cart'])){
        //echo 'have items in cart';
        $item_array_id = array_column($_SESSION['cart'],'item_id');
        if(!in_array($_GET['id'],$item_array_id)){
            $count = count($_SESSION['cart']);
            $item_array = array(
                'item_id'=>$_GET['id'],
                'item_quantity' => $quan,   
            );
            //echo $count;
            $_SESSION['cart'][$count]=$item_array;
            header('location: menuItem.php?type='.$category);
        }else{
            echo "<script>alert('Item is already in cart.');
                 window.location('menuItem.php?type='.$category');</script>";
           // header('location: menuItem.php?type='.$category);
        }
    }else{
        $item_array = array(
                'item_id'=>$_GET['id'],
                'item_quantity' => $_POST['quantity'],
            );
            $_SESSION['cart'][0]=$item_array;
            header('location: menuItem.php?type='.$category);
    }
?>