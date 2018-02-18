<?php
require 'DatabaseUtils.php';

  //session_start(); // Starting Session
  //echo 'Test';
  // check username or password from database
  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);
  $username = $request->username;

  // Start Validation
  $dbUtils = new DataUtils();

  if (!$dbUtils->conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $bValid = false;
  // Get Voter Info
  $getVoterSql = "SELECT * FROM vo_voters WHERE vot_name = '%s' AND vot_delete_flag = 0;";
  $response = $dbUtils->ExecuteScalar(sprintf($getVoterSql, $username));
  if($response->num_rows > 0) {
    // Get The top row
    while($row = $response->fetch_assoc()) {
      $userKey = $row["usr_key"];
      $bValid = true;
    }
  }

  // Set Sessions
  if($bValid) {
    // set session
    $dbUtils->setLoginSessions($username, $userKey);
    echo 'success';
  } else {
    echo "Failure";
  }

  $dbUtils->endConnection();
 ?>
