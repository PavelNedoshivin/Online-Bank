<?php
require_once 'models/branchModel.php';

/**
 * @param $smarty
 * @param $DBH
 */
function show($smarty, $DBH){
    $rows = load_table_from_db($DBH, 'branches');
    $smarty -> assign("rows", $rows);
    loadTemplate($smarty, "branches");
}

function add($smarty, $DBH) {
    $branch_city = isset($_GET['branch_city']) ? ($_GET['branch_city']) : 'branch_city';
    $branch_address = isset($_GET['branch_address']) ? ($_GET['branch_address']) : 'branch_address';
    $branch_code = isset($_GET['branch_citycode']) ? ($_GET['branch_citycode']) : 'branch_citycode';
    if(!preg_match("/[^\\w]/i", $branch_city)
        and !preg_match("/[^\\w. ]/i", $branch_address)
        and !preg_match("/[^\\d]/i", $branch_code)) {
        $branch_city = htmlentities($branch_city);
        $branch_address = htmlentities($branch_address);
        $branch_code = htmlentities($branch_code);
        addBranch($DBH,$branch_city, $branch_address, $branch_code);
    }else{
        ?>
        <script type="text/javascript">
            alert('Wrong params');
        </script>
        <?php
        d('wrong params');
        error_log ( 'wrong account parameters: .' . 'city: ' . $branch_city  . ' ' .
            'address: ' . $branch_address . ' ' . 'code: ' . $branch_code . 
                __FUNCTION__ . ' ' . __LINE__);
    }
    header('Location: index.php?command=showBranches');
}

function delete($smarty, $DBH) {
    $branch_id = isset($_GET['id']) ? ($_GET['id']) : 'id';
    error_log($branch_id);
    deleteEntityById($DBH, 'branches', $branch_id);
    header('Location: index.php?command=showBranches');
}

function update($smarty, $DBH) {}
