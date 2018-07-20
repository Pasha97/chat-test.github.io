<?php

session_start();
require("conn.php");
unset($_SESSION["id"]);
header("Location:".$site_url);

?>