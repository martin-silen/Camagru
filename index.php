<?php

session_start() or die("Failed to resume session\n");

if (!isset($_SESSION['logged_user'])) {
  require_once('config/setup.php');
  header("Location: pages/home.php"); // redirect to login page
}
else
  header("Location: pages/webcam.php"); // redirect to webcam page

?>
