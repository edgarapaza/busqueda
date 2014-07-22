<?php
$DB_HOST= "localhost";
$DB_USER= "root";
$DB_PASS= "admin";
$DB_NAME= "dbarp";

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

mysqli_report(MYSQLI_REPORT_ERROR);
?>