<?php

function indexAction($smarty, $DBH) {
    $smarty -> assign('pageTitle', 'Main page');
    loadTemplate($smarty, 'index');
}
