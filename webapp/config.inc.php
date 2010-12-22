<?php
/************************************************/
/***  APPLICATION CONFIG                      ***/
/************************************************/
/**
 * Main configuration file for SocialCalc. It initializes all the global variables for the
 * application.
 */

// Application title
$SOCIALCALC_CFG['app_title']                 = 'SocialCalc';

// Public path of SocialCalc's /webapp/ folder on your web server.
// For example, if the /webapp/ folder is located at http://yourdomain/socialcalc/, set to '/socialcalc/'.
$SOCIALCALC_CFG['site_root_path']            = '/socialcalc/';

// Full server path to /socialcalc/ folder.
$SOCIALCALC_CFG['source_root_path']          = 'http://localhost/socialcalc/';

// Toggle Smarty caching. true: Smarty caching on, false: Smarty caching off
$SOCIALCALC_CFG['cache_pages']               = true;
$SOCIALCALC_CFG['debug']                     = true;


/************************************************/
/***  DATABASE CONFIG                         ***/
/************************************************/

$SOCIALCALC_CFG['db_host']                   = 'localhost'; //On a shared host? Try mysql.yourdomain.com, or see your web host's documentation.
$SOCIALCALC_CFG['db_type']                   = 'mysql';
$SOCIALCALC_CFG['db_user']                   = 'root';
$SOCIALCALC_CFG['db_password']               = '';
$SOCIALCALC_CFG['db_name']                   = 'socialcalc';
$SOCIALCALC_CFG['db_socket']                 = '';
$SOCIALCALC_CFG['db_port']                   = '';
$SOCIALCALC_CFG['table_prefix']              = 'sc_';