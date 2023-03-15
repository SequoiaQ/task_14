<?php 

$login = $_POST["user_login"] ?? null;
$password = $_POST["password"] ?? null;
$birthday = $_POST["birthday"] ?? null;


if (existsUser($login !== false) && checkPassword($login, $password)) {
    session_start();
    $_SESSION["login"] = $login;
    $_SESSION["name"] = getCurrentUser($login) ?? 'Незнакомец';
    $_SESSION["time"] = date('Y-m-d H:i:s');
    $_SESSION["birthday"] = getCurrentDay($login);
}

header("Location: /task_14");

function existsUser($login) {
    $userExist = getUsersList();
    $index = false;
    foreach ($userExist as $key => $value) {
        foreach ($value as $value2) {
            if ($login == $value2){
                $index = $key;
            }
        }
    }
    return $index;
}

function checkPassword($login, $password) {
    $userExist = getUsersList();
    $index = existsUser($login);
    $passwordCheck = password_verify($password, $userExist[$index]["password"]);
        if ($passwordCheck) {
            return true;
        }
        return false;
}

function getCurrentUser($login){
    $userExist = getUsersList();
    $index = existsUser($login);
    if($index !== false){
        return $userExist[$index]["name"];
    }
    return null;
}

function getCurrentDay($login){
    $userExist = getUsersList();
    $index = existsUser($login);
    if($index !== false){
        return $userExist[$index]["birthday"];
    }
    return null;
}

function getUsersList() {
    return json_decode(file_get_contents('data/db.json'), true);
}


