<?php
/**
 *
 * SocialCalc/webapp/session/login.php
 */
chdir('..');
require_once 'init.php';

$controller = new LoginController();
echo $controller->go();