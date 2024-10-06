<?php
require '../utils/functions.php';

if($_POST && isset($_REQUEST['firstname'])) {
  //get each field and insert to the database
  $user['firstname'] = $_REQUEST['firstname'];
  $user['lastname'] = $_REQUEST['lastname'];
  $user['username'] = $_REQUEST['username'];
  $user['province_id'] = $_REQUEST['province_id'];
  $user['password'] = $_REQUEST['password'];
  $user['role_id'] = $_REQUEST['role_id'];


  if (saveUser($user)) {
    header( "Location: /users.php",);
  } else {
    header( "Location: /?error=Invalid user data");
  }
}