<?php
require 'DatabaseUtils.php';

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$votes = $request->votes;
$dbUtils = new DataUtils();

if (!$dbUtils->conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$bValid = false;

// Get Write Query String Info
$updateFruitSql = "UPDATE fr_fruits SET fru_votes =  fru_votes + 1 WHERE fru_key = '%s';";
$query = "";
$count = 0;
foreach($votes as $vote) {
  if($vote->vxf_vote == 1){

      $query = $query . sprintf($updateFruitSql, $vote->fru_key) . ' ';

      $bExecute = true;
    }
    $count = $count + 1;
}

if($bExecute) {
  $result = $dbUtils->ExecuteSql($query);
}

if (strpos($result, 'Error') !== true) {
  echo "success";
} else {
  echo "Failed";
}

$dbUtils->endConnection();
?>
