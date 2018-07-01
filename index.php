<?php

session_start();

use Src\Bootstrap;

require __DIR__.'/vendor/autoload.php';

$bootstrap = new Bootstrap();

$bootstrap->init();
