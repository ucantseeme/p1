<?php
class Book{
  private $db;

  public function __construct(){
    $this->db = Db::connect();
  }

  public function view_all_books()
  {
    $query = "SELECT * FROM book";
    $result = $this->db->query($query);
    if($result->num_rows > 0){
      while($data = $result->fetch_object()){
        // var_dump($data);
        $books[] = array(
          "id" => $data->id,
          "name" => $data->name,
          "author" => $data->author,
          "description" => $data->description,
          "published" => $data->published
        );
      }
      return $books;
    }
  }

  public function book_by_id($id){
    $query = "SELECT * FROM book WHERE id = '$id'";
    $result = $this->db->query($query);
    if($result->num_rows > 0){
      while($data = $result->fetch_object()){
        $books[] = array(
          "id" => $data->id,
          "name" => $data->name,
          "author" => $data->author,
          "description" => $data->description,
          "published" => $data->published
        );
      }
      return $books;
    }
  }

  public function book_by_name($name){
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $query = "SELECT * FROM book WHERE name = '$name'";
    $result = $this->db->query($query);
    if($result->num_rows > 0){
      while($data = $result->fetch_object()){
        $books[] = array(
          "id" => $data->id,
          "name" => $data->name,
          "author" => $data->author,
          "description" => $data->description,
          "published" => $data->published
        );
      }
      return $books;
    }
  }

  public function book_by_author($author){
    $author = filter_var($author, FILTER_SANITIZE_STRING);
    $query = "SELECT * FROM book WHERE author = '$author'";
    $result = $this->db->query($query);
    if($result->num_rows > 0){
      while($data = $result->fetch_object()){
        $books[] = array(
          "id" => $data->id,
          "name" => $data->name,
          "author" => $data->author,
          "description" => $data->description,
          "published" => $data->published
        );
      }
      return $books;
    }
  }

  public function book_by_name_author($name, $author){
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $author = filter_var($author, FILTER_SANITIZE_STRING);
    $query = "SELECT * FROM book WHERE name = '$name' AND author = '$author'";
    $result = $this->db->query($query);
    if($result->num_rows > 0){
      while($data = $result->fetch_object()){
        $books[] = array(
          "id" => $data->id,
          "name" => $data->name,
          "author" => $data->author,
          "description" => $data->description,
          "published" => $data->published
        );
      }
      return $books;
    }
  }
}
?>
