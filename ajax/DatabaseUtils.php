<?php
class DataUtils {
    public static $conn;
    private $cryptKey = "/OFw./XKwOg.t3UcAULRk27vYIAr63pWGyg8vz50Rx0=";
    function __construct() {
        // create connection here
        $this->conn = new mysqli( "localhost:3306", "root", "kkkok", "symplicity_votes");
    }

    // Only use if object is instantiated and the connect is closed
    public function openConnection() {
        $this->conn = new mysqli( "localhost:3306", "root", "kkkok", "symplicity_votes");
    }

    // Executes a Query String
    public function ExecuteSql($sql){
      if(mysqli_query($this->conn, $sql)){
        return "success";
      } else {
        return "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      }
    }

    public function ExecuteScalar($sql){
      $result = $this->conn->query($sql);
      if(mysqli_error($this->conn)) {
        return "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      } else {
        return $result;
      }
    }

    // Close Connection
    public function endConnection() {
        $this->conn->close();
    }

    // Encrypts password
    public function encryptPassword($rawPwd) {
      $hashed_password = crypt($rawPwd, $this->cryptKey);
      return $hashed_password;
    }

    public function validatePassword($hashed, $password) {
       if(crypt($password, $this->cryptKey) == $hashed){
         return true;
       }
       return false;
    }

    public function setLoginSessions($name, $key) {
       // Sets Sessions for login here
       $_SESSION['last_voter'] = $name;
       $_SESSION['UserKey'] = $key;//$this->getUserKey($name);
    }

    public function destroySessions() {
       // Destroy Sessions for login here
       session_destroy();
    }
    public function getVoterKey($name) {
      $sql = "SELECT vot_key FROM symplicity_votes.vo_voters where vot_name = '%s' and vot_delete_flag = 0;";

      $result = $this->conn->query(sprintf($sql, $name));
      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $key = $row["vot_key"];
          return $key;
        }
      } else {
        return "";
      }
    }

    public function isVoterLoggedIn() {
       if(!empty($_SESSION['last_voter']) &&  !empty($_SESSION['UserKey'])) {
         return true;
       } else {
         return false;
       }
    }
    /*public function getUserKey($user) {
      $sql = "SELECT usr_key FROM portfoliosite2018.co_admin where usr_user_name = '%s' and usr_delete_flag = 0;";

      $result = $this->conn->query(sprintf($sql, $user));
      if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $key = $row["usr_key"];
          return $key;
        }
      } else {
        return "";
      }
    }*/

    /*
    function Salt(){
      return substr(strtr(base64_encode(hex2bin(RandomToken(32))), '+', '.'), 0, 44);
    }

    function RandomToken($length = 32){
      if(!isset($length) || intval($length) <= 8 ){
        $length = 32;
      }
      if (function_exists('random_bytes')) {
          return bin2hex(random_bytes($length));
      }
      if (function_exists('mcrypt_create_iv')) {
          return bin2hex(mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));
      }
      if (function_exists('openssl_random_pseudo_bytes')) {
          return bin2hex(openssl_random_pseudo_bytes($length));
      }
    }*/
  }
?>
