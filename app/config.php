<?php
    define('DB_HOST', 'localhost'); /* Server */
    define('DB_USER', 'root'); /* DB Username */
    define('DB_PWD', 'root'); /* DB Password */
    define('DB_NAME', 'app_login'); /* DB Name */
    $conn = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    // echo $conn == true ? 'Connection Successfully' : 'Error DB Connection';