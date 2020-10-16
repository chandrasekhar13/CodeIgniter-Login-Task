<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<style type="text/css">
  td,th {
    border: 1px solid rgb(190, 190, 190);
    padding: 10px;
  }

  td {
    text-align: center;
  }

  tr:nth-child(even) {
    background-color: #eee;
  }

  table {
    border-collapse: collapse;
    border: 2px solid rgb(200, 200, 200);
    letter-spacing: 1px;
    font-family: sans-serif;
    font-size: .8rem;
  }
</style>

</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="row">
<div class="col-md-12">
<h3>Login Successful <?=$this->session->userdata('first_name')?>  <?=$this->session->userdata('last_name')?></h3>
<?php

  include "SimpleXLSX.php";

  echo '<h4>List of Users</h4><pre>';

  if ( $xlsx = SimpleXLSX::parse('C:\wamp64\www\test\demo.xlsx') ) {
    echo '<table><tbody>';
    $i = 0;

    foreach ($xlsx->rows() as $elt) {
      if ($i == 0) {
        echo "<tr><th>" . $elt[0] . "</th><th>" . $elt[1] . "</th></tr>";
      } else {
        echo "<tr><td>" . $elt[0] . "</td><td>" . $elt[1] . "</td></tr>";
      }      

      $i++;
    }

    echo "</tbody></table>";

  } else {
    echo SimpleXLSX::parseError();
  }

?>
<a href="<?= base_url();?>auth/logout">Logout</a>                                               
</div>
</div>
</div>               
</div>
</div>        
</body>
</html>