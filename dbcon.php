<?php
const DB_HOST = 'host_name';
const DB_USER = 'username';
const DB_PASS = 'password';
const DB_NAME = 'database_name';

$link = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($link->connect_error) { 
   die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}
$link->set_charset("utf8"); 
?>