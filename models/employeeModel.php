<?php

function addEmployee($DBH, $name, $position, $chief, $branch)
{
    $query = "INSERT INTO employees (id, EmployeeName, Position, Chief, codeBranch) VALUES (NULL, ?, ?, ?, ?);";
    $result = $DBH -> prepare($query);
    $result -> execute([$name, $position, $chief, $branch]);
}

function getEmployeeByName($DBH, $name)
{
    $query = "SELECT * FROM employees WHERE  EmployeeName=?";
    $result = $DBH -> prepare($query);
    $result -> execute([$name]);
    return $result->fetch(PDO::FETCH_ASSOC);
}
