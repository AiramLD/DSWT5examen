<?php
if (isset($_COOKIE['name'])) {
  unset($_COOKIE['name']); 
  setcookie('name', '', -1, '/'); 
  header("Location: index.php");
}