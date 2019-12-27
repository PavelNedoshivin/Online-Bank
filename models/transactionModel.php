<?php

function addTransaction($DBH, $amount, $date, $type, $customer, $branch)
{
    $query = "INSERT INTO transactions (id, Amount, TransactionDate, TransactionType, codeCustomer, codeBranch) VALUES (NULL, ?, ?, ?, ?, ?);";
    $result = $DBH -> prepare($query);
    $result -> execute([$amount, $date, $type, $customer, $branch]);
}

function getTransactionByDate($DBH, $date)
{
    $query = "SELECT * FROM transactions WHERE  TransactionDate=?";
    $result = $DBH -> prepare($query);
    $result -> execute([$date]);
    return $result->fetch(PDO::FETCH_ASSOC);
}
