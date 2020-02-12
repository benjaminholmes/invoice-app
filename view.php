<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  require_once('connect.php');




  $perpage = 10;
  if(isset($_GET['page']) & !empty($_GET['page'])){
  	$curpage = $_GET['page'];
  }else{
  	$curpage = 1;
  }
  $start = ($curpage * $perpage) - $perpage;
  $PageSql = "SELECT * FROM `invoices_master`";
  $pageres = mysqli_query($connection, $PageSql);
  $totalres = mysqli_num_rows($pageres);

  $endpage = ceil($totalres/$perpage);
  $startpage = 1;
  $nextpage = $curpage + 1;
  $previouspage = $curpage - 1;

  $ReadSql = "SELECT * FROM `invoices_master` LIMIT $start, $perpage";
  $res = mysqli_query($connection, $ReadSql);





?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title> Chef Invoices</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
      <link rel="stylesheet" href="style.css" >
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    </head>
    <body>




    <div class="container">

      <h2>Chef Invoices</h2>





      <div class="row">



        <table class="table" id="mytable">
          <tr>

            <th>Date</th>
            <th>Agency</th>
            <th>Name</th>
            <th>Postcode</th>
            <th>Hours</th>
            <th>Gross</th>
            <th>Tax</th>
            <th>Ni</th>
            <th>Total</th>


          </tr>
          <?php




          /*$gross_array = array();
          $tax_array = array();
          $ni_array = array();
          $total_array = array(); */

          while($r = mysqli_fetch_assoc($res)){
          ?>
          <tr>

            <td><?php echo $r['date']; ?></td>
            <td><?php echo $r['agency']; ?></td>
            <td><?php echo $r['name']; ?></td>
            <td><?php echo $r['postcode']; ?></td>
            <td><?php echo $r['hours']; ?></td>
            <td><?php echo $r['gross']; ?></td>
            <td><?php echo $r['tax']; ?></td>
            <td><?php echo $r['ni']; ?></td>
            <td><?php echo $r['total']; ?></td>
            <td><a class="btn btn-primary" href="update.php?id=<?php echo $r['id']; ?>">Edit</a> </td>

            <?php /* $gross_array[] = $r['gross'];?>
            <?php $tax_array[] = $r['tax'];?>
            <?php $ni_array[] = $r['ni'];?>
            <?php $total_array[] = $r['total'];*/?>

          </tr>
        <?php } ?>

        </table>

        <nav aria-label="Page navigation">
            <ul class="pagination">
              <?php if($curpage != $startpage){ ?>
                  <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $startpage ?>" tabindex="-1" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                      <span class="sr-only">First</span>
                    </a>
                  </li>
                  <?php } ?>
                  <?php if($curpage >= 2){ ?>
                  <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
                  <?php } ?>
                  <li class="page-item active"><a class="page-link" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a></li>
                  <?php if($curpage != $endpage){ ?>
                  <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
                  <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $endpage ?>" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                      <span class="sr-only">Last</span>
                    </a>
                  </li>
                <?php } ?>
            </ul>
        </nav>








       <div id="addNewDiv">

        <a href="invoice.php"  class="btn btn-primary col-md-2 col-md">Add New<a>


        <div id="totals">



        <?php
        $sql = "SELECT SUM(gross) AS gross_sum FROM invoices_master";
        $rezult = $connection->query($sql);

        if ($rezult->num_rows > 0) {
            // output data of each row
            while($rowz = $rezult->fetch_assoc()) {
         ?>
        <span>
            <?php echo "Gross Total : " . $rowz["gross_sum"]; ?>
        </span></br>
        <?php     }
        } else { ?>
          <span><?php echo "0 results"; ?></span>
        <?php } ?>



        <?php
        $sql1 = "SELECT SUM(tax) AS tax_sum FROM invoices_master";
        $rezult1 = $connection->query($sql1);

        if ($rezult1->num_rows > 0) {
            // output data of each row
            while($rowz1 = $rezult1->fetch_assoc()) {
         ?>
        <span>
            <?php echo "Tax Total : " . $rowz1["tax_sum"]; ?>
        </span></br>
        <?php     }
        } else { ?>
          <span><?php echo "0 results"; ?></span>
        <?php } ?>





        <?php
        $sql2 = "SELECT SUM(ni) AS ni_sum FROM invoices_master";
        $rezult2 = $connection->query($sql2);

        if ($rezult2->num_rows > 0) {
            // output data of each row
            while($rowz2 = $rezult2->fetch_assoc()) {
         ?>
        <span>
            <?php echo "NI Total : " . $rowz2["ni_sum"]; ?>
        </span></br>
        <?php     }
        } else { ?>
          <span><?php echo "0 results"; ?></span>
        <?php } ?>







        <?php
        $sql3 = "SELECT SUM(total) AS total_sum FROM invoices_master";
        $rezult3 = $connection->query($sql3);

        if ($rezult3->num_rows > 0) {
            // output data of each row
            while($rowz3 = $rezult3->fetch_assoc()) {
         ?>
        <span>
            <?php echo "Paid Total : " . $rowz3["total_sum"]; ?>
        </span></br>
        <?php     }
        } else { ?>
          <span><?php echo "0 results"; ?></span>
        <?php } ?>



        </div>

      </div>












     </div>
   </div>
  </body>

</html>
