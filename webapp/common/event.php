<?php
/**
 * SocialCalc/webapp/session/event.php
 *
 */
chdir('..');
require_once("init.php");

$controller = new EventController();
return $controller->go();