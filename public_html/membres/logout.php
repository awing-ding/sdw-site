<?php 
/* This is a way to connect to the database. */
include('../include/mysqlconnect.php');
/* This is destroying the session. */
session_destroy();

/* This is telling the browser to go to the login page. */
header("Location: login.php");

?>