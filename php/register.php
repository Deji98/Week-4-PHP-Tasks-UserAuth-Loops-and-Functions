<?php
if (isset($_POST['submit'])) {
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    registerUser($username, $email, $password);
}

function registerUser($username, $email, $password)
{
    $data = [
        'fullname' => $username,
        'email' => $email,
        'password' => $password,
    ];
    $exist = checkIfUserExist($email);
    if ($exist) {
        echo 'User already exist';
    } else {
        $file = fopen('../storage/users.csv', 'a');
        fputcsv($file, $data);
        fclose($file);
        echo '<h1>User Successfully Registered</h1>';
    }
}
function checkIfUserExist($email)
{
    $file = fopen('../storage/users.csv', 'r');
    while (!feof($file)) {
        $line = fgetcsv($file);
        if ($line[1] == $email) {
            return true;
        }
    }
    fclose($file);
    return false;
}
