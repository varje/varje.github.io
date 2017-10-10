<?php
  $dbhost  = 'localhost';
  $dbname  = 'webshop';
  $dbuser  = 'root';
  $dbpass  = '';
  $appname = "Looga";

  $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($connection->connect_error) die($connection->connect_error);

  function checkSession(){
    if (isset($_SESSION['auth'])&& $_SESSION['auth']==='admin') {
              return true;
              }
    elseif (isset($_SESSION['auth'])&& $_SESSION['auth']==='user') {
              return true;
              }
  }

  function queryMysql($query)
  {
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
  }


  function sanitizeString($var)
  {
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
  }

  function showProfile($user)
  {
    $result = queryMysql("SELECT * FROM users WHERE userName='$user'");

    if ($result->num_rows)
    {
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
    }
  }
?>
