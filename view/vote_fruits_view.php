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
<div class="row" align="center">
  <div class="col-md-2">
  </div>
  <div class="col-md-8" >
    <div ng-controller="voteFruitController as voteList" class="form-div-vote">
      <h4 align="center">Hello, <?php echo $_SESSION["last_voter"]; ?>!</h4>
      <p align="center">Please select the fruits in which you believe will make our cafeteria healthier!</p>
      <form ng-submit="voteList.submitVote()">
        <div class="form-group">
          <ul class="unstyled">
            <li ng-repeat="fruit in voteList.votes">
              <label class="checkbox">
                <input type="hidden" ng-model="fruit.fru_key">
                <input type="checkbox" ng-model="fruit.vfx_vote">
                <span class="label">{{fruit.fru_name}}</span>
              </label>
            </li>
          </ul>
        </div>
        <div class="btn-div">
          <input type="hidden" ng-model="vote.keysToPush">
          <input class="btn-cus-submit-2" type="submit" value="Submit Vote">
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-2">
  </div>
</div>
