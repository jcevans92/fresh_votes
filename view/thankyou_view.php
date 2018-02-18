<?php

?>
<script src="js/thankYou.js"></script>
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
    <div ng-controller="thankyouController as votedList" class="form-div-vote">
      <div class="logout-btn">
        <a href="logout.php" alt="logout">Logout</a>
      </div>
      <br/>
      <br/>
      <div>
        <p align="center"><?php echo $_SESSION["last_voter"]; ?> thank you for voting. Below are the current standings. Thank you!</p>
      </div>
        <form ng-submit="votedList.submitVote()">
          <div class="form-group">
            <ul class="unstyled">
              <li ng-repeat="fruit in votedList.votes">
                <label class="votes-list">
                  <!--<input id="fruitCheckBoxes" fru_key="{{fruit.fru_key}}" type="checkbox" ng-model="fruit.vxf_vote" ng-true-value="1" ng-false-value="0">-->
                  <div class="votes-label">
                    <strong><span class="label">{{fruit.fru_votes}}</span></strong>
                  </div>
                  <div class="fruit-name">
                    <span class="label">{{fruit.fru_name}}</span>
                  </div>
                </label>
              </li>
            </ul>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-2">
  </div>
</div>
