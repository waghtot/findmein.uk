<?php
define('CONF', '/etc/config/');
$_SESSION['constants'] = parse_ini_file(CONF."findmein_uk.ini");
error_log('constants: '.print_r($_SESSION, 1));