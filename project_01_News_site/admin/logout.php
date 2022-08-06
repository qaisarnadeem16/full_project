<?php
  include "config.php";

  session_start();
  session_unset();
  session_destroy();

  
  header("location: http://localhost/PHP%20Practice/project_01_News_site/admin/");


?>
