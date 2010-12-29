<?php
/**
 * SocialCalc/webapp/session/chatlist.php
 *
 */
chdir('..');
require_once("init.php");

$controller = new ChatListController();
return $controller->go();