<?php
include_once 'configs/config.php'; //settings
include_once 'models/userModel.php';

function loadPage($DBH, $smarty, $controller_name, $actionName = 'index') {
    include_once $controller_name;
    $function = $actionName;
    if(function_exists($function)) {
        $function($smarty, $DBH);
    }
}

function login($DBH)
{
    if (isset($_SESSION['id'])) {
        $result = getEntityById($DBH, 'users', $_SESSION['id']);
        if (!empty($result)) {
            return $result;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

/**
 * load templates to template engine from templates folder
 * @param $smarty -- template engine
 * @param $templateName -- name of template that will be load
 */
function loadTemplate($smarty, $templateName) {
    $smarty -> display($templateName . TemplatePostfix);
}

/**
 * debug function
 * @param null $value
 * @param int $die
 */
function d($value = null, $die = FALSE){
    if($_SERVER['DEBUG']) {
        echo 'Debug: <br /> <pre>';
        print_r($value);
        if ($die) {
            die;
        }
    }
}

function getActionByAccess($DBH, $access)
{
    $query = "SELECT command FROM pages WHERE access <= ?";
    if ($query !== false) {
        $result = $DBH->prepare($query);
        $result->execute([$access]);
        return ($result->fetchAll(PDO::FETCH_ASSOC));
    }
    return false;
}

function fetch($fromArray, $key){
    $result = [];
    foreach ($fromArray as $value)
    {
        $result[] = $value[$key];
    }
    return $result;
}

function get_page_param_from_DB($DBH, $command)
{
    $query = "SELECT function, controller, access FROM pages WHERE  command=?";
    if($query !== false) {
        $result = $DBH->prepare($query);
        $result->execute([$command]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    return false;
}

function load_table_from_db($DBH, $table_name)
{
    $query = "SELECT * FROM {$table_name}";
    if($query !== false) {
        $result = $DBH->prepare($query);
        $result->execute();
        return ($result->fetchAll(PDO::FETCH_ASSOC));
    }
    return false;
}

function getEntityById(PDO $DBH, $entityName, $id)
{
    try {
        $query = "SELECT * FROM {$entityName} WHERE  id={$id}";
        d($query);
        $result = $DBH->prepare($query);
        $result->execute();
        return $result->fetch(PDO::FETCH_ASSOC);
    }catch (PDOException $e)
    {
        error_log ($e->getMessage());
        d('Wrong params');
    }
}

function deleteEntityById(PDO $DBH, $entityName, $id)
{
    if((int)$id > 0) {
        try {
            $query = "DELETE FROM {$entityName} WHERE id={$id}";
            d($query);
            if ($query !== FALSE) {
                $result = $DBH->prepare($query);
                ?>
                <script type="text/javascript">
                    if (window.confirm('Delete?')) {
                        alert('Item was deleted');
                        <?php
                        $result->execute();
                        ?>
                    } else {
                        alert('Declined');
                    }
                </script>
                <?php
            } else {
                d("Inserting error");
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
            d('Wrong params');
        }
    }else{
        error_log('Delete error. Wrong index: ' . $id);
        d($id);
    }    
}
