<?php

?>
<script src="js/voteForFruit.js"></script>
<!-- links the form -->
<div class="row top-row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
  </div>
  <div class="col-md-2">
  </div>
</div>
<div class="row">
  <div class="col-md-2">
  </div>
  <div class="col-md-8">
    <div ng-controller="voterLoginController as voterLogin" class="form-div" >
      <form ng-submit="voterLogin.login()">
        <div class="form-group">

        </div>
        <div class="btn-div">
          <input class="btn-cus-submit" type="submit" value="Submit Vote">
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-2">
  </div>
</div>
