<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /Conferences Near you Proyecto/index.php');
?>