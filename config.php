<?php
require_once 'environment.php';

define("HOME", "http://localhost/sgb");

global $config;
$config = array();

if (ENVIRONMENT == 'development'):
    $config['dbname']   =   'sgb';
    $config['host']     =   'localhost';
    $config['dbuser']   =   'root';
    $config['dbpass']   =   '';
else:
    $config['dbname']   =   'sgb';
    $config['host']     =   'localhost';
    $config['dbuser']   =   'root';
    $config['dbpass']   =   '';
endif;

global $pdo;
$pdo = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
