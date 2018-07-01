<?php

$pageURL = (isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] == 'on') ? "https://" : "http://";
$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$url = explode('?', $pageURL);

define('BASE_URL', $url[0]);
