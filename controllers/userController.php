<?php
require_once 'models/userModel.php';
require_once 'controllers/indexController.php';

function showLogin($smarty, $DBH){
    loadTemplate($smarty, 'login');
}

function showRegistration($smarty, $DBH){
    loadTemplate($smarty, 'register');
}

function showUsers($smarty, $DBH)
{
    $rows = load_table_from_db($DBH, 'users');
    $newArr = [];
    foreach ($rows as $key => $value) {
        $curArr = [];
        $curArr['id'] = $value['id'];
        $curArr['Login'] = $value['Login'];
        $curArr['Password'] = $value['Password'];
        $curArr['Access'] = getEntityById($DBH, 'access', $value['Access'])['title'];
        $newArr[$key] = $curArr;
    }
    $smarty -> assign("rows", $newArr);
    loadTemplate($smarty, "users");
}

function blockUser($smarty, $DBH)
{
    $userId = $_GET['id'];
    changeUserAccess($DBH, $userId, 2);
    showUsers($smarty, $DBH);
}

function registration($smarty, $DBH){
    $login = $_GET['login'];
    $password = md5($_GET['password']);
    $status = addNewUser($DBH, $login, $password);
    if($status)
    {
        showLogin($smarty, $DBH);
    }
    else{
        error_log('registration failed');
        d('registration failed');
        showRegistration($smarty, $DBH);
    }
}

function sign_in($smarty, $DBH){
    $login = $_GET['login'];
    $password = md5($_GET['password']);
    $result = getUserByLoginAndPassword($DBH, $login, $password);
    if($result === false)
    {
        error_log('Login failed. ' . 'login: ' . $login. ' ' . 'password: ' . $password);
        d('login failed');
        showLogin($smarty, $DBH);
    }else {
        $_SESSION['id'] = $result['id'];
        setcookie('session_id', $_SESSION['id'], time() + 3600);
        $smarty-> assign('access', $result['access']);
        header( 'Location: index.php?command=showMain');
    }
}

function logout($smarty, $DBH){
    if(!empty($_SESSION['id'])) {
        unset($_SESSION['id']);
    }
    if (!empty($_COOKIE['session_id'])) {
        setcookie('session_id', $_SESSION['id'], time() - 60);
        setcookie('user', $_SESSION['id'], time() - 60);
    }
    session_unset();
    session_destroy();
    header( 'Location: index.php?command=login');
}

function handleError($smarty, $DBH)
{
    if(!empty($_SESSION['id'])) {
        unset($_SESSION['id']);
    }
    loadTemplate($smarty, 'error');
}
