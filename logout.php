<?php
error_reporting(E_ALL); ini_set('display_errors', '1'); //enables to display if there is any error
session_start();
session_unset();//it unsets every session
session_destroy();//it destroy every session
header ("Location: index.html"); //it redirects to the main page
exit;
?>