<?php
/**
 *
 * SocialCalc/webapp/session/register.php
 */
chdir('..');
require_once 'init.php';

$controller = new RegisterController();
echo $controller->go();