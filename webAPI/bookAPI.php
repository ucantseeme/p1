<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: GET, POST, PUT');
include("../config/config.php");
include("../config/autoloadapi.php");
$db = new Db();
$db = Db::connect();

$query = "SELECT * FROM book";
$result = $db->query($query);

while($data = $result->fetch_object()){
  // var_dump($data);
  $books[] = array(
    "id" => $data->id,
    "name" => $data->name,
    "author" => $data->author
  );
}
echo json_encode($books);
?>
