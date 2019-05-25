<?php
 require "connect.inc.php";
 require "core.inc.php";
?>

<html>
    <head>
        <style>
         .hearderstyle{
             margin:60px; font-size:30px; 
             color:#848484;
         }
        </style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>EaseYourLife Assignment</title>

        <!-- Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
            
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
            <ul class='nav navbar-nav navbar-left'>
            <li> <a href=#getDataHeader>New Order</a></li>
            <li> <a href=#getAcceptedDataHeader>Accepted Order</a></li>
            <li> <a href=#getOrderHistoryHeader>Cancelled Order</a></li>
            </ul>  
            <ul class='nav navbar-nav navbar-right'>
            <li> <a href="index.php">LogOut</a></li>
            </ul>            
            </div>
        </nav>

         <div id="getDataHeader" class="hearderstyle">
         New Orders<hr>
        </div>
        <div id="getData" style="margin:60px">
        </div>
        <div id="getAcceptedDataHeader" class="hearderstyle">
        Accepted Order<hr>
        </div>
        <div id="getAcceptedData" style="margin : 60px">
        </div>
        <div id="getOrderHistoryHeader" class="hearderstyle">
        Cancelled Order<hr>
        </div>
        <div id="getOrderHistory" style="margin : 60px">
        </div>
        <div id="autoCancelOrder" style="margin : 60px">
        </div>
        <script type="text/javascript">
        
        function getNewOrder(){
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","getNewOrder.php",false);
            xmlhttp.send(null);
            document.getElementById("getData").innerHTML = xmlhttp.responseText;
        }
        function getAcceptedOrder(){
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","getAcceptedOrder.php",false);
            xmlhttp.send(null);
            document.getElementById("getAcceptedData").innerHTML = xmlhttp.responseText;
        }
        function getOrderHistory(){
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","getOrderHistory.php",false);
            xmlhttp.send(null);
            document.getElementById("getOrderHistory").innerHTML = xmlhttp.responseText;
        }
        function autoCancelOrder(){
            xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET","autoCancelOrder.php",false);
            xmlhttp.send(null);
            document.getElementById("autoCancelOrder").innerHTML = xmlhttp.responseText;
        }
        getNewOrder();
        getAcceptedOrder();
        getOrderHistory();
        autoCancelOrder();
        setInterval(function(){
            getNewOrder();
            getAcceptedOrder();
            getOrderHistory();
        },15000);

        setInterval(function(){
            autoCancelOrder();
        },40000)
        </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>