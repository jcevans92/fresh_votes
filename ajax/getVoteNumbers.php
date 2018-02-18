<?php
require 'DatabaseUtils.php';

/*$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$VotKey = $request->vot_key;*/

// Start Validation
$dbUtils = new DataUtils();

if (!$dbUtils->conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$bValid = false;
// Get Fruit Info
$fruitArray = [];
  // just query for the fruit. This is users first time
  $getFruitSql = "SELECT * FROM fr_fruits WHERE fru_delete_flag = 0 order by fru_votes desc;";
  $response = $dbUtils->ExecuteScalar($getFruitSql);
  if($response->num_rows > 0) {
    while($row = $response->fetch_assoc()) {
      $row1 = $row;
      array_push($fruitArray, ['fru_key' => $row["fru_key"],
      'fru_name'=>$row["fru_name"],
      'fru_votes'=>$row["fru_votes"]]);
    }
  }

if(!empty($fruitArray)){
  echo json_encode($fruitArray);
} else {
  echo "Failure";
}

$dbUtils->endConnection();

 ?>
