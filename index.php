<?php
include_once 'configs/config.php'; //settings
include_once 'libs/mainFunctions.php'; //functions

session_start();
$command = isset($_GET['command']) ? ($_GET['command']) : 'showLogin';
$controller_params = get_page_param_from_DB($DBH, $command);
$user = login($DBH);
$role = ($user !== false) ? $user['Access'] : 1;
$legalActions = fetch(getActionByAccess($DBH, $role), 'command');
$command = (in_array($command, $legalActions)) ? $command : 'error';
$smarty ->assign('user', $user);
if ($command == 'error')
{
    $smarty ->assign('error', 'Access denied');
}
if(preg_match("/[0-9a-z_]/i", $command)) {
    $controller_params = get_page_param_from_DB($DBH, $command);
    if($controller_params == false)
    {
        d('bad command');
        loadTemplate($smarty, 'error');
        error_log ( 'undefined route.' . ' ' . __FUNCTION__ . ' ' . __LINE__);
    }else {
        $controllerName = 'controllers/' . $controller_params['controller'] . '.php';
        $actionName = $controller_params['function'];
        if (file_exists($controllerName)) {
            loadPage($DBH, $smarty, $controllerName, $actionName);
        }
        else{
            d('function not found');
            loadTemplate($smarty, 'error');
            error_log ( 'Function not found.' . ' ' . __FUNCTION__ . ' ' . __LINE__);
        }
    }
}else{
    d($command);
    loadTemplate($smarty, 'error');
    error_log ( ('undefined route: ' . $command . ' ' . __FUNCTION__ . ' ' . __LINE__));
}
