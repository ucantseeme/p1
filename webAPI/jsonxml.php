<?php
include("../config/config.php");
include("../config/autoloadapi.php");

$book = new Book();

if (isset($_GET['data_format'])) {
  $data_format = strtolower($_GET['data_format']);
  if ($data_format != 'json' && $data_format != 'xml') {
    echo "You must select either 'xml' or 'json' as data encoding format";
  } else {
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $result = $book->book_by_id($id);
    }
    elseif(isset($_GET['name'])){
      $name = $_GET['name'];
      $result = $book->book_by_name($name);
    }
    elseif(isset($_GET['author'])){
      $author = $_GET['author'];
      $result = $book->book_by_author($author);
    }
    elseif(isset($_GET['name']) && isset($_GET['author'])){
      $name = $_GET['name'];
      $author = $_GET['author'];
      $result = $book->book_by_name_author($name, $author);
    }
    elseif(empty($_GET['name']) && empty($_GET['author']) && empty($_GET['id'])){
      $result = $book->view_all_books();
    }
    // Check if result is empty if not display data acc. data format
    if ($result == false) {
      echo "Sorry, there was no data matching your search";
    } else {
      if($data_format == 'json'){
        header('Content-type: application/json');
        echo json_encode($result);
        // echo "true";
      }else{
        header('Content-Type: text/xml; charset=utf-8');

        $books = new SimpleXMLElement("<books />");
        foreach ($result as $key => $value) {
          $book = $books->addChild("book", "");
          $book->addChild("id", $result[$key]['id']);
          $book->addChild("name", $result[$key]['name']);
          $book->addChild("author", $result[$key]['author']);
          $book->addChild("description", $result[$key]['description']);
          $book->addChild("published", $result[$key]['published']);
        }
        echo $books->asXML();
      }
    }
  }
}
?>
