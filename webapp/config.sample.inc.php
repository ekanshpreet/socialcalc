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

// Public path of thinkup's /webapp/ folder on your web server.
// For example, if the /webapp/ folder is located at http://yourdomain/thinkup/, set to '/thinkup/'.
$SOCIALCALC_CFG['site_root_path']            = '/socialcalc/';

// Full server path to /thinkup/ folder.
$SOCIALCALC_CFG['source_root_path']          = 'http://localhost/socialcalc/';

// Toggle Smarty caching. true: Smarty caching on, false: Smarty caching off
$SOCIALCALC_CFG['cache_pages']               = true;
$SOCIALCALC_CFG['debug']                     = true;


/************************************************/
/***  DATABASE CONFIG                         ***/
/************************************************/

$SOCIALCALC_CFG['db_host']                   = 'localhost'; //On a shared host? Try mysql.yourdomain.com, or see your web host's documentation.
$SOCIALCALC_CFG['db_type']                   = 'mysql';
$SOCIALCALC_CFG['db_user']                   = 'your_database_username';
$SOCIALCALC_CFG['db_password']               = 'your_database_password';
$SOCIALCALC_CFG['db_name']                   = 'your_socialcalc_database_name';
$SOCIALCALC_CFG['db_socket']                 = '';
$SOCIALCALC_CFG['db_port']                   = '';
$SOCIALCALC_CFG['table_prefix']              = 'sc_';
