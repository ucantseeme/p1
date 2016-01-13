<?php
include("../config/config.php");
include("../config/autoloadapi.php");
  $user = new User();
  $username = $_GET['u'];
  $result = $user->userExists($username);
  if($result){
    echo "exists";
  }else{
    echo "not";
  }
?>
