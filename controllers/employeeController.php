<?php

require_once 'models/employeeModel.php';
require_once 'models/branchModel.php';

/**
 * @param $smarty
 * @param $DBH
 */
function show($smarty, $DBH){
    $rows = load_table_from_db($DBH, 'employees');
    $newArr = [];
    foreach ($rows as $key => $value) {
        $curArr = [];
        $curArr['id'] = $value['id'];
        $curArr['EmployeeName'] = $value['EmployeeName'];
        $curArr['Position'] = $value['Position'];
        $curArr['Chief'] = $value['Chief'];
        $curArr['Branch'] = getEntityById($DBH, 'branches', $value['codeBranch'])['Address'];
        $newArr[$key] = $curArr;
    }
    $smarty -> assign("rows", $newArr);
    loadTemplate($smarty, "employees");
}

function add($smarty, $DBH) {
    $employee_name = isset($_GET['employee_name']) ? ($_GET['employee_name']) : 'employee_name';
    $employee_position = isset($_GET['employee_position']) ? ($_GET['employee_position']) : 'employee_position';
    $employee_chief = isset($_GET['employee_chief']) ? ($_GET['employee_chief']) : 'employee_chief';
    $employee_branch = isset($_GET['employee_branch']) ? ($_GET['employee_branch']) : 'employee_branch'; 
    if(!preg_match("/[^\\w ]/i", $employee_name)
        and !preg_match("/[^\\w ]/i", $employee_position)
        and !preg_match("/[^\\w ]/i", $employee_chief)
        and !preg_match("/[^\\w., ]/i", $employee_branch)) {
        $employee_name = htmlentities($employee_name);
        $employee_position = htmlentities($employee_position);
        $employee_chief = htmlentities($employee_chief);
        $employee_branch = htmlentities($employee_branch);
        $branch_id = getBranchByAddress($DBH, $employee_branch)['id'];
        addEmployee($DBH,$employee_name, $employee_position, $employee_chief, $branch_id);
    }else{
        ?>
        <script type="text/javascript">
            alert('Wrong params');
        </script>
        <?php
        d('wrong params');
        error_log ( 'wrong account parameters: .' . 'name: ' . $employee_name  . ' ' .
            'position: ' . $employee_position . ' ' . 'chief: ' . $employee_chief . ' ' . 
                'branch: ' . $employee_branch . __FUNCTION__ . ' ' . __LINE__);
    }
    header('Location: index.php?command=showEmployees');
}

function delete($smarty, $DBH) {
    $employee_id = isset($_GET['id']) ? ($_GET['id']) : 'id';
    error_log($employee_id);
    deleteEntityById($DBH, 'employees', $employee_id);
    header('Location: index.php?command=showEmployees');
}

function update($smarty, $DBH) {}
