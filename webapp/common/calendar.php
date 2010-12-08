<?php
/**
 * SocialCalc/webapp/session/calendar.php
 *
 */
chdir('..');
require_once("init.php");

$controller = new CalendarController();
echo $controller->go();