<?php

include '../config/database.php';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if (isset($email, $password) && strlen($email) > 5 && strlen($password) > 5) {

    $query = "SELECT * FROM users WHERE email = '$email'";
    $user_query = mysqli_query($connection, $query);

    if (mysqli_num_rows($user_query) > 0) {
        $user_about = mysqli_fetch_assoc($user_query);

        if ($password != $user_about['password']) {
            echo 'Парольді қате енгіздіңіз!';
            exit();
        }

        session_start();
        $_SESSION['id'] = $user_about['id'];
        $_SESSION['username'] = $user_about['username'];
        header('Location: http://localhost/интернет%20дүкен/html.php');
        exit(); // header-ден кейін міндетті түрде exit() болуы керек

    } else {
        echo 'Пайдаланушы табылмады';
        exit();
    }

} else {
    echo 'Мәліметтерді толық енгізіңіз';
    exit();
}
?>
