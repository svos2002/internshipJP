<?php
error_reporting(E_ALL);

date_default_timezone_set('Asia/Manila');

$key = "example_key";
$issued_at = time();
$expiration_time = $issued_at + (60 * 60); // valid for 1 hour
$issuer = "http://localhost/intern/api/";

include_once (LIBS_PATH.DS.'php-jwt-master/src/BeforeValidException.php');
include_once (LIBS_PATH.DS.'php-jwt-master/src/ExpiredException.php');
include_once (LIBS_PATH.DS.'php-jwt-master/src/SignatureInvalidException.php');
include_once (LIBS_PATH.DS.'php-jwt-master/src/JWT.php');
?>