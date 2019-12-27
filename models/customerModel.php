<?php

function addCustomer($DBH, $name, $address, $type)
{
    $query = "INSERT INTO customers (id, CustomerName, CustomerAddress, CustomerType) VALUES (NULL, ?, ?, ?);";
    $result = $DBH -> prepare($query);
    $result -> execute([$name, $address, $type]);
}

function getCustomerByName($DBH, $name)
{
    $query = "SELECT * FROM customers WHERE  CustomerName=?";

    $result = $DBH -> prepare($query);
    $result -> execute([$name]);
    return $result->fetch(PDO::FETCH_ASSOC);
}
