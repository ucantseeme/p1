<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');

include("../config/config.php");
include("../config/autoloadapi.php");

$a = $_GET['action'];
$id = $_GET['id'];
$db = new Db();
$db = Db::connect();

if($a == "delete"){
  $query = "DELETE FROM book WHERE id='$id'";
  $result = $db->query($query);
  if(!$result){
    echo "<script>alert('Error: Can't delete. Something is wrong!');</script>";
  }
}
elseif($a == "insert"){
  $data = json_decode(file_get_contents("php://input"));
  $name = $db->real_escape_string($data->bookname);
  $name = filter_var($name, FILTER_SANITIZE_STRING);
  $author = $db->real_escape_string($data->bookauthor);
  $author = filter_var($author, FILTER_SANITIZE_STRING);

  $query = "INSERT INTO book (name, author) VALUES (?,?)";
  $stmt = $db->prepare($query);
  $stmt->bind_param("ss", $name, $author);
  $stmt->execute();
  $stmt->close();
}


?>
