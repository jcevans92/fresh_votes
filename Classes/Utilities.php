<?php
class Utils {
  public function isVoterLoggedIn() {
     if(!empty($_SESSION['last_voter']) && !empty($_SESSION['UserKey'])) {
       return true;
     } else {
       return false;
     }
  }
}
 ?>
