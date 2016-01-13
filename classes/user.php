<?php
class User{
  private $db;

  public function __construct(){
    $this->db = Db::connect();
  }

  public function userLogin($uname, $pass){
    $pass = md5($pass);
  }

  public function register($uname, $pass, $email, $name){
    $pass = md5($pass);
    // prepare and bind
    $query = "INSERT INTO user (username, password, email, name) VALUES (?,?,?,?)";
    $stmt = $this->db->prepare($query);
    if($stmt){
      $stmt->bind_param("ssss", $uname, $pass, $email, $name);
      // set parameters and execute
      $stmt->execute();
      $stmt->close();
    }else{
      echo "<script>alert('Error: Please fill all the fileds correctly.');</script>";
    }
  }

  public function userExists($uname){
    $query = "SELECT * FROM user WHERE username = '$uname'";
    // if($this->db->prepare($query);){
    //   $stmt->execute();
    //   $stmt->bind_result();
    //   $stmt->fetch();
    // }
    $result = $this->db->query($query);
    return $result->fetch_object();
  }
}
?>
