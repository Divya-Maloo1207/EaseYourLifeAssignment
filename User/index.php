<?php 
session_start();
require_once('connect.inc.php');
?>
<html>
<head>
<style>
.ItemType{
    margin: 0 0 2em 0;
  list-style-type: none;
  padding: 0;
}
.ItemType li{
    height : 10%;
    background-image: linear-gradient(#ebfafa, #d6f5f5);
    margin-left : -50px;
    margin-top : 15px;
    box-shadow: 5px 5px #1f7a7a;
    padding-left: 50px;
    padding-top: 10px;
    font-size: 200%;
    color : #1f7a7a;
    cursor: pointer;
}
.ItemType li:hover {
  color: #607D8B;
  background-image: linear-gradient #80bfff #66b3ff);
  margin-left : -45px;
  margin-top : 20px;
  box-shadow: 0px 0px #1f7a7a;
}
</style>
</head>
<?php
include('header_layout.php');
include('navigation.php');
?>

<div class="container">
 
	<ul class="ItemType">
    <div class="row">
    <div class="col-12 col-md-8">
        <!-- <li onclick="location.replace('menuItem.php?type=South Indian')" >
            <b>South Indian ></b>
        </li>--> <p onclick="location.replace('menuItem.php?type=South Indian')" ><b>South Indian ></b> </p>
        </div> 
        <div class="col-12 col-md-8">
        <!-- <li onclick="location.replace('menuItem.php?type=Quick Bites')" >
            <b>Quick Bites ></b>
        </li> -->
        <p onclick="location.replace('menuItem.php?type=Quick Bites')" ><b>Quick Bites ></b> </p>
        </div>
        <div class="col-12 col-md-8">
        <!-- <li onclick="location.replace('menuItem.php?type=Starters')">
            <b>Starters ></b>
        </li> -->
        <p onclick="location.replace('menuItem.php?type=Starters')" ><b>Starters ></b> </p>
        </div>
    </div>
    
    <li onclick="location.replace('menuItem.php?type=Soups')">
        <b>Soups ></b>
    </li>
    <li onclick="location.replace('menuItem.php?type=Indian')">
        <b>Indian ></b>
    </li>
    <li onclick="location.replace('menuItem.php?type=Indian Breads')" >
        <b>Indian Breads ></b>
    </li>
    <li onclick="location.replace('menuItem.php?type=Desserts')">
        <b>Desserts ></b>
    </li>
</ul>
 
</div>
 
<?php include('footer_layout.php'); ?>