<?php
/**
 * Created by PhpStorm.
 * User: Onur
 * Date: 27.11.2018
 * Time: 02:32
 */

session_start();
session_destroy();
$_SESSION = array();

header("Location: /index.php" ,TRUE, 302);

