<?php 
/* This is a PHP file that contains the connection to the database. */
include('../include/mysqlconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../include/admin.css">
    <title>adminHub</title>
</head>
<body>
    <?php
    /* This is a security feature. If the user is not logged in as admin, the page will not be
    displayed. */
    if ($_SESSION['id'] == 'admin') {
    /* This is a PHP file that contains the navigation bar. */
    include('../include/nav.php'); 
    }
    /* If the user is not logged in as admin, the page will not be displayed. */
    else { 
        echo('<h1> VOUS N\'ÊTES PAS ADMIN</h1>'); 
    } ?>
    <h1 id="hub-title">Hub admin</h1>
</body>
</html>