<?php

function addBranch($DBH, $city, $address, $code)
{
    $query = "INSERT INTO branches (id, City, Address, CityCode) VALUES (NULL, ?, ?, ?);";
    $result = $DBH -> prepare($query);
    $result -> execute([$city, $address, $code]);
}

function getBranchByAddress($DBH, $address)
{
    $query = "SELECT * FROM branches WHERE  Address=?";
    $result = $DBH -> prepare($query);
    $result -> execute([$address]);
    return $result->fetch(PDO::FETCH_ASSOC);
}
