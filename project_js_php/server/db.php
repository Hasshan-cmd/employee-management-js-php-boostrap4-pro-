<?php

class CommonDao{
  public static function getResult($query)
  {
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $database = "earth1";

// Create connection
    $dbconn = mysqli_connect($servername, $username, $password, $database);

// Check connection
    if (!$dbconn) {
      die("Connection failed: " . $dbconn->connect_error);
    }

      $result = $dbconn->query($query);

    return $result;
  }
}

?>