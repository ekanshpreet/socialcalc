<?php
/**
 *
 * SocialCalc/webapp/session/login.php
 */
chdir('..');
require_once 'init.php';

$controller = new LastSeenController();
echo $controller->go();