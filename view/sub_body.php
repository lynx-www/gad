<?php

if(isset($_GET['sub']) && $_GET['sub'] == 'manufacturer'){
    include('manufacturer.php');
  }
  if(isset($_GET['sub']) && $_GET['sub'] == 'model'){
    include('model.php');
  }
?>