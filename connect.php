<?php
 $connection = mysqli_connect('localhost', 'root', 'mershman666');
  if(!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
 }
 $selectdb = mysqli_select_db($connection, 'invoices');
 if(!$selectdb){
   die("Databse Selection Failed" . mysqli_error($connection));
 }

?>
