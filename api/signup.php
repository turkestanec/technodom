<?php
include '../config/database.php';

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$repeatpas = $_POST['repeatpas'];

if (isset($email, $username, $password, $repeatpas) &&
    strlen($email) > 5 && strlen($username) > 5 &&
    strlen($password) > 5 && strlen($repeatpas) > 5) {

    if ($password != $repeatpas) {
        echo 'Парольді қате енгіздіңіз';
        exit(); 
    }

    // SQL Injection-ге қарсы өңдеу
    $email = mysqli_real_escape_string($connection, $email);
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password); // міндетті!

    // Хэштемей жазамыз
    $query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";
    $user_query = mysqli_query($connection, $query);

    if (!$user_query) {
        echo 'Сұраныс орындалмады!';
        exit();
    }

    header('Location: http://localhost/интернет%20дүкен/login.php');
    exit();

} else {
    echo 'Мәліметтерді толық енгізіңіз!';
}

?>