<?php
  error_reporting(E_ALL | E_STRICT);
  ini_set("display_errors", true);
  ini_set("log_errors", true);
  // ini_set("error_log", "greske.log");

  $conn = new MySqli('localhost', 'root','','knjigedb');
  $conn->set_charset("utf8");
 ?>