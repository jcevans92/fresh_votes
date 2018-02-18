<?php
  include('template/header.php');
  $utils = new Utils();
  $utils->destroySessions();

  header('Location: '. 'index.php');
  exit();
 ?>
