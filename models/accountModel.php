<?php

function addAccount($DBH, $balance, $date, $number, $customer, $employee)
{
    $query = "INSERT INTO accounts (id, Balance, OpeningDate, CardsNumber, codeCustomer, codeEmployee) VALUES (NULL, ?, ?, ?, ?, ?);";
    $result = $DBH -> prepare($query);
    $result -> execute([$balance, $date, $number, $customer, $employee]);
}

function getAccountByDate($DBH, $date)
{
    $query = "SELECT * FROM accounts WHERE OpeningDate=?";
    $result = $DBH -> prepare($query);
    $result -> execute([$date]);
    return $result->fetch(PDO::FETCH_ASSOC);
}
