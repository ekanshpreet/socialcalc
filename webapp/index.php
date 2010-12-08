<?php
/**
 * This file is the entry point for the application.
 */
require_once("init.php");

$controller = new HomeController();
echo $controller->go();