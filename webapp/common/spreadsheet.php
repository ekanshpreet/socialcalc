<?php
/**
 * SocialCalc/webapp/session/event.php
 *
 */
chdir('..');
require_once("init.php");

$controller = new SpreadsheetController();
return $controller->go();