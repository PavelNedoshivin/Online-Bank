<?php

require_once 'models/transactionModel.php';
require_once 'models/customerModel.php';
require_once 'models/branchModel.php';

/**
 * @param $smarty
 * @param $DBH
 */
function show($smarty, $DBH){
    $rows = load_table_from_db($DBH, 'transactions');
    $newArr = [];
    foreach ($rows as $key => $value) {
        $curArr = [];
        $curArr['id'] = $value['id'];
        $curArr['Amount'] = $value['Amount'];
        $curArr['TransactionDate'] = $value['TransactionDate'];
        $curArr['TransactionType'] = $value['TransactionType'];
        $curArr['Customer'] = getEntityById($DBH, 'customers', $value['codeCustomer'])['CustomerName'];
        $curArr['Branch'] = getEntityById($DBH, 'branches', $value['codeBranch'])['Address'];
        $newArr[$key] = $curArr;
    }
    $smarty -> assign("rows", $newArr);
    loadTemplate($smarty, "transactions");
}

function add($smarty, $DBH) {
    $transaction_amount = isset($_GET['transaction_amount']) ? ($_GET['transaction_amount']) : 'transaction_amount';
    $transaction_date = isset($_GET['transaction_date']) ? ($_GET['transaction_date']) : 'transaction_date';
    $transaction_type = isset($_GET['transaction_type']) ? ($_GET['transaction_type']) : 'transaction_type';
    $transaction_customer = isset($_GET['transaction_customer']) ? ($_GET['transaction_customer']) : 'transaction_customer';
    $transaction_branch = isset($_GET['transaction_branch']) ? ($_GET['transaction_branch']) : 'transaction_branch';
    if(!preg_match("/[^\\d.]/i", $transaction_amount)
        and !preg_match("/[^\\w:- ]/i", $transaction_date)
        and !preg_match("/[^\\w ]/i", $transaction_type)
        and !preg_match("/[^\\w ]/i", $transaction_customer)
        and !preg_match("/[^\\w. ]/i", $transaction_branch)) {
        $transaction_amount = htmlentities($transaction_amount);
        $transaction_date = htmlentities($transaction_date);
        $transaction_type = htmlentities($transaction_type);
        $transaction_customer = htmlentities($transaction_customer);
        $transaction_branch = htmlentities($transaction_branch);
        $customer_id = getCustomerByName($DBH, $transaction_customer)['id'];
        $branch_id = getBranchByAddress($DBH, $transaction_branch)['id'];
        addTransaction($DBH,$transaction_amount, $transaction_date, $transaction_type, $customer_id, $branch_id);
    }else{
        ?>
        <script type="text/javascript">
            alert('Wrong params');
        </script>
        <?php
        d('wrong params');
        error_log ( 'wrong account parameters: .' . 'amount: ' . $transaction_amount  . ' ' .
            'date: ' . $transaction_date . ' ' . 'type: ' . $transaction_type . ' ' .
                'customer: ' . $transaction_customer . ' ' . 'branch: ' . $transaction_branch .
                __FUNCTION__ . ' ' . __LINE__);
    }
    header('Location: index.php?command=showTransactions');
}

function delete($smarty, $DBH) {
    $transaction_id = isset($_GET['id']) ? ($_GET['id']) : 'id';
    error_log($transaction_id);
    deleteEntityById($DBH, 'transactions', $transaction_id);
    header('Location: index.php?command=showTransactions');
}

function update($smarty, $DBH) {}
