<?php
/**
 *
 * SocialCalc/webapp/session/logout.php
 */
chdir('..');
require_once 'init.php';

$controller = new LogoutController();
echo $controller->authControl();