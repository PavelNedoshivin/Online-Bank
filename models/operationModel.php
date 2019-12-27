<?php

function addOperation($DBH, $account, $transaction)
{
    $query = "INSERT INTO operations (codeAccount, codeTransaction) VALUES (?, ?);";
    $result = $DBH -> prepare($query);
    $result -> execute([$account, $transaction]);
}

