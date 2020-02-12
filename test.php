<?php

  require_once('connect.php');

?>

  <?php

    $sql = "SELECT SUM(gross) AS gross_sum FROM invoices_master";
    $rezult = $connection->query($sql);

    if ($rezult->num_rows > 0) {
        // output data of each row
        while($rowz = $rezult->fetch_assoc()) {
            echo "Gross Total : " . $rowz["gross_sum"];
        }
    } else {
        echo "0 results";
    }
  ?>

  <?php
  $sql1 = "SELECT SUM(tax) AS tax_sum FROM invoices_master";
  $rezult1 = $connection->query($sql1);

  if ($rezult1->num_rows > 0) {
      // output data of each row
      while($rowz1 = $rezult1->fetch_assoc()) {
          echo " Tax Total : " . $rowz1["tax_sum"];
      }
  } else {
      echo "0 results";
  }


   ?>



   <?php
   $sql2 = "SELECT SUM(ni) AS ni_sum FROM invoices_master";
   $rezult2 = $connection->query($sql2);

   if ($rezult2->num_rows > 0) {
       // output data of each row
       while($rowz2 = $rezult2->fetch_assoc()) {
           echo " NI Total : " . $rowz2["ni_sum"];
       }
   } else {
       echo "0 results";
   }


    ?>


    <?php
    $sql3 = "SELECT SUM(total) AS total_sum FROM invoices_master";
    $rezult3 = $connection->query($sql3);

    if ($rezult3->num_rows > 0) {
        // output data of each row
        while($rowz3 = $rezult3->fetch_assoc()) {
            echo " Total : " . $rowz3["total_sum"];
        }
    } else {
        echo "0 results";
    }


     ?>
