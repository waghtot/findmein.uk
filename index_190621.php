<?php
session_start();
require "vendor/autoload.php";
require_once "app/config/constants.php";
require_once "app/views/templates/secure.php";

new Router();

?>