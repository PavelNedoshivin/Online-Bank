<?php

require_once 'models/customerModel.php';

/**
 * @param $smarty
 * @param $DBH
 */
function show($smarty, $DBH){
    $rows = load_table_from_db($DBH, 'customers');
    $smarty -> assign("rows", $rows);
    loadTemplate($smarty, "customers");
}

function add($smarty, $DBH) {
    $customer_name = isset($_GET['customer_name']) ? ($_GET['customer_name']) : 'customer_name';
    $customer_address = isset($_GET['customer_address']) ? ($_GET['customer_address']) : 'customer_address';
    $customer_type = isset($_GET['customer_type']) ? ($_GET['customer_type']) : 'customer_type';    
    if(!preg_match("/[^\\w ]/i", $customer_name)
        and !preg_match("/[^\\w., ]/i", $customer_address)
        and !preg_match("/[^\\w ]/i", $customer_type)) {
        $customer_name = htmlentities($customer_name);
        $customer_address = htmlentities($customer_address);
        $customer_type = htmlentities($customer_type);
        addCustomer($DBH,$customer_name, $customer_address, $customer_type);
    }else{
        ?>
        <script type="text/javascript">
            alert('Wrong params');
        </script>
        <?php
        d('wrong params');
        error_log ( 'wrong account parameters: .' . 'name: ' . $customer_name  . ' ' .
            'address: ' . $customer_address . ' ' . 'type: ' . $customer_type . 
                __FUNCTION__ . ' ' . __LINE__);
    }
    header('Location: index.php?command=showCustomers');
}

function delete($smarty, $DBH) {
    $customer_id = isset($_GET['id']) ? ($_GET['id']) : 'id';
    error_log($customer_id);
    deleteEntityById($DBH, 'customers', $customer_id);
    header('Location: index.php?command=showCustomers');
}

function update($smarty, $DBH) {}
