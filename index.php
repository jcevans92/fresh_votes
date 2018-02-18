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
        header('Location: '. 'localhost/symplicity/vote.php');
      } else {
        // Show Voter name form
        include('view/voter_login_view.php');
      }
    ?>
  </div>


<?php include('template/footer.php') ?>
