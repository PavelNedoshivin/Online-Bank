<?php

require_once 'models/accountModel.php';
require_once 'models/customerModel.php';
require_once 'models/employeeModel.php';

/**
 * @param $smarty
 * @param $DBH
 */
function show($smarty, $DBH){
    $rows = load_table_from_db($DBH, 'accounts');
    $newArr = [];
    foreach ($rows as $key => $value) {
        $curArr = [];
        $curArr['id'] = $value['id'];
        $curArr['Balance'] = $value['Balance'];
        $curArr['OpeningDate'] = $value['OpeningDate'];
        $curArr['CardsNumber'] = $value['CardsNumber'];
        $curArr['Customer'] = getEntityById($DBH, 'customers', $value['codeCustomer'])['CustomerName'];
        $curArr['Employee'] = getEntityById($DBH, 'employees', $value['codeEmployee'])['EmployeeName'];
        $newArr[$key] = $curArr;
    }
    $smarty -> assign("rows", $newArr);
    loadTemplate($smarty, "accounts");
}

function add($smarty, $DBH) {
    $account_balance = isset($_GET['account_balance']) ? ($_GET['account_balance']) : 'account_balance';
    $account_date = isset($_GET['account_openingdate']) ? ($_GET['account_openingdate']) : 'account_openingdate';
    $account_number = isset($_GET['account_cardsnumber']) ? ($_GET['account_cardsnumber']) : 'account_cardsnumber';
    $account_customer = isset($_GET['account_customer']) ? ($_GET['account_customer']) : 'account_customer';
    $account_employee = isset($_GET['account_employee']) ? ($_GET['account_employee']) : 'account_employee';
    if(!preg_match("/[^\\d.]/i", $account_balance)
        and !preg_match("/[^\\d-: ]/i", $account_date)
        and !preg_match("/[^\\d]/i", $account_number)
        and !preg_match("/[^\\w ]/i", $account_customer)
        and !preg_match("/[^\\w ]/i", $account_employee)) {
        $account_balance = htmlentities($account_balance);
        $account_date = htmlentities($account_date);
        $account_number = htmlentities($account_number);
        $account_customer = htmlentities($account_customer);
        $account_employee = htmlentities($account_employee);
        $customer_id = getCustomerByName($DBH, $account_customer)['id'];
        $employee_id = getEmployeeByName($DBH, $account_employee)['id'];
        addAccount($DBH,$account_balance, $account_date, $account_number, $customer_id, $employee_id);
    }else{
        ?>
        <script type="text/javascript">
            alert('Wrong params');
        </script>
        <?php
        d('wrong params');
        error_log ( 'wrong account parameters: .' . 'balance: ' . $account_balance  . ' ' .
            'date: ' . $account_date . ' ' . 'number: ' . $account_number . ' ' .
                'customer: ' . $account_customer . ' ' . 'employee: ' . $account_employee .
                __FUNCTION__ . ' ' . __LINE__);
    }
    header('Location: index.php?command=showAccounts');
}

function delete($smarty, $DBH) {
    $account_id = isset($_GET['id']) ? ($_GET['id']) : 'id';
    error_log($account_id);
    deleteEntityById($DBH, 'accounts', $account_id);
    header('Location: index.php?command=showAccounts');
    //show($smarty, $DBH);   
}

function update($smarty, $DBH) {}
