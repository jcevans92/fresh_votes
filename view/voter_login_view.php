<?php

?>
<script src="js/voterLogin.js"></script>
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
          <div class="text-label">
            <label>Student's First Name:</label>
          </div>
          <div class="text-input">
            <input ng-model="voterLogin.firstName" class="form-control name-input"  type="text" placeholder="e.g. Jane">
          </div>
        </div>
        <div class="btn-div">
          <input class="btn-cus-submit" type="submit" value="Go Vote">
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-2">
  </div>
</div>
