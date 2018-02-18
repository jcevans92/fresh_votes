<?php
class Utils {
  public function isVoterLoggedIn() {
     if(!empty($_SESSION['last_voter']) && !empty($_SESSION['UserKey'])) {
       return true;
     } else {
       return false;
     }
  }
  public function destroySessions() {
     // Destroy Sessions for login here
     session_destroy();

     unset($_SESSION['last_voter']);
     unset($_SESSION['UserKey']);
  }
}
 ?>
