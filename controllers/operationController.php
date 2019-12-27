<?php

require_once 'models/accountModel.php';
require_once 'models/transactionModel.php';
require_once 'models/operationModel.php';

/**
 * @param $smarty
 * @param $DBH
 */
function show($smarty, $DBH){
    $rows = load_table_from_db($DBH, 'operations');
    $newArr = [];
    foreach ($rows as $key => $value) {
        $curArr = [];
        $curArr['id'] = $value['codeAccount'];
        $curArr['id2'] = $value['codeTransaction'];
        $curArr['AccountDate'] = getEntityById($DBH, 'accounts', $value['codeAccount'])['OpeningDate'];
        $curArr['TransactionDate'] = getEntityById($DBH, 'transactions', $value['codeTransaction'])['TransactionDate'];
        $newArr[$key] = $curArr;
    }
    $smarty -> assign("rows", $newArr);
    loadTemplate($smarty, "operations");
}

function add($smarty, $DBH) {
    $operation_accountdate = isset($_GET['operation_accountdate']) ? ($_GET['operation_accountdate']) : 'operation_accountdate';
    $operation_transactiondate = isset($_GET['operation_transactiondate']) ? ($_GET['operation_transactiondate']) : 'operation_transactiondate';
    if(!preg_match("/[^\\d-: ]/i", $operation_accountdate)
        and !preg_match("/[^\\d-: ]/i", $operation_transactiondate)) {
        $operation_accountdate = htmlentities($operation_accountdate);
        $operation_transactiondate = htmlentities($operation_transactiondate);
        $account_id = getAccountByDate($DBH, $operation_accountdate)['id'];
        $transaction_id = getTransactionByDate($DBH, $operation_transactiondate)['id'];
        addOperation($DBH, $account_id, $transaction_id);
    }else{
        ?>
        <script type="text/javascript">
            alert('Wrong params');
        </script>
        <?php
        d('wrong params');
        error_log ( 'wrong operation parameters: .' . 'accountdate: ' . $operation_accountdate  . ' ' .
            'transactiondate: ' . $operation_transactiondate . __FUNCTION__ . ' ' . __LINE__);
    }
    header('Location: index.php?command=showOperations');
}

function delete($smarty, $DBH) {
    $operation_id = isset($_GET['id']) ? ($_GET['id']) : 'id';
    $operation_id2 = isset($_GET['id2']) ? ($_GET['id2']) : 'id2'; 
    error_log($operation_id);
    if((int)$operation_id > 0) {
        try {
            $query = "DELETE FROM operations WHERE codeAccount={$operation_id} AND codeTransaction={$operation_id2}";
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
    header('Location: index.php?command=showOperations');
    //show($smarty, $DBH);   
}

function update($smarty, $DBH) {}
