<?php
include_once 'libs/mainFunctions.php';

mb_internal_encoding("UTF-8");

//for dataBase
$dsn = "mysql:host=localhost;dbname=onlinebank";
$db_user = "root";
$db_password = "";
$DBH = NULL;
try {
    $DBH = new PDO($dsn, $db_user, $db_password );
    $DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $e->getMessage();
    error_log ($e->getMessage());
    d('Data base connection was rejected. DSN: ' . $dsn . ' ' . 'user: ' . $db_user . ' ' . 'password: ' . $db_password);
}

$main_title = "Tables";

// for controllers
define('PathPrefix', 'controllers/');
define('PathPostfix', 'Controller.php');

// for templates
$template = 'default';
define('TemplatePrefix', "templates/{$template}/");
define('TemplatePostfix', '.tpl');
define('TemplateWebPath', "/templates/{$template}/");

// smarty
require('libs/Smarty.class.php');
$smarty = new Smarty();
$smarty -> setTemplateDir(TemplatePrefix);
$smarty -> setCompileDir('templates_c');
$smarty -> setCacheDir('libs/cache');
$smarty -> setConfigDir('libs/configs');
$smarty -> assign('templatesWebPath', TemplateWebPath);

$_SERVER['DEBUG'] = false;
ini_set('log_errors','on');
ini_set('error_log', __DIR__ . '/main_error.log');
if($_SERVER['DEBUG'])
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
else{
    error_reporting(0);
    ini_set('display_errors', 0);
}
