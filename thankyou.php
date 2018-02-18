<?php
include('template/header.php');
?>
    <!-- Add Page Content here -->
    <!-- If want to use side bar place below here -->
    <div class="container">
    <?php
      $utils = new Utils();
      if($utils->isVoterLoggedIn()) {
        // Redirect Vote Form
        include('view/thankyou_view.php');
      } else {
        //print_r($_SESSION);
        // Show Voter name form
        header('Location: '. $_SERVER['HTTP_REFERER']);
        exit();
      }
    ?>
  </div>


<?php include('template/footer.php') ?>
