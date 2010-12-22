<?php
/**
 *
 * SocialCalc/webapp/session/forgot.php
 *
 */
chdir('..');
require_once 'init.php';

$controller = new ForgotPasswordController();
echo $controller->go();
