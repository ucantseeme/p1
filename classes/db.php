<?php
class Db{
  //database connection
  protected static $connection;

  public static function connect(){
    //try and connect to database
    if(!isset(self::$connection)){
      //load configuration as an array
      global $config;

      self::$connection = new mysqli($config['host'],$config['username'],$config['password'],$config['db']);
    }

    //if connection was not successful, handle the error
    if(self::$connection === false){
      // Handle error - notify administrator, log to a file, show an error screen, etc.
      return false;
    }
    return self::$connection;
  }
}
?>
