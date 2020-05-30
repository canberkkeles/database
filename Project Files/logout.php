<?php
session_start();
session_destroy();
echo "<script>alert('You have succesfully logged out of the system !');</script>";
echo"<script>location.assign('login_d.html')</script>";  // go back to the login page
?>