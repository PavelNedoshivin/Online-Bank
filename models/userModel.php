<?php

function getUserByLogin($DBH, $login)
{
    $query = "SELECT * FROM users WHERE  login=?";
    if($query !== false) {

        $result = $DBH->prepare($query);
        $result->execute([$login]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    return false;
}

function getUserByLoginAndPassword($DBH, $login, $password)
{
    $query = "SELECT * FROM users WHERE  login=? and password=?";
    d($query);
    if($query !== false) {
        $result = $DBH->prepare($query);
        $result->execute([$login, $password]);
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    return false;
}

function addNewUser($DBH, $login, $password)
{

    $query = "SELECT * FROM users WHERE  login=?";
    d($query);
    if ($query !== false) {
        $result = $DBH->prepare($query);
        $result->execute([$login]);
        $test = $result->fetch(PDO::FETCH_ASSOC);
        if ($test != false) {
            d('user already registered');
            error_log('user already registered');
            return false;
        } else {
            $query = "INSERT INTO users (id, Login, Password, Access) VALUES  (NULL, ?, ?, 3)";
            if ($query !== false) {
                $result = $DBH->prepare($query);
                $result->execute([$login, $password]);
                return true;
            }
            return false;
        }
        return false;
    }
}

function changeUserAccess($DBH, $userId, $access)
{
    $query = "UPDATE users SET Access=? WHERE id=?";
    d($query);
    if ($query !== false) {
        $result = $DBH->prepare($query);
        $result->execute([$access, $userId]);
        return true;
    }
    return false;
}
