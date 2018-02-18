<?php
include('template/header.php')
?>
    <!-- Add Page Content here -->
    <!-- If want to use side bar place below here -->
    <div class="container">
    <?php
      $utils = new Utils();
      if($utils->isVoterLoggedIn()) {
        // Redirect Vote Form
        include('view/vote_fruits_view.php');
      } else {
        //print_r($_SESSION);
        // Show Voter name form
        header('Location: '. 'index.php');
        exit();
      }
    ?>
  </div>


<?php include('template/footer.php') ?>
