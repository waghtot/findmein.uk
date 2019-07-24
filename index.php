<?php
session_start();
require_once "vendor/autoload.php";
require_once "app/config/constants.php";

mail('waghtot@gmail.com', 'test message', 'test message');

new Router();

ob_flush();
?>