<?php
include 'database.php';

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$repeatpas = $_POST['repeatpas'];

if(isset($email, $username, $password, $repeatpas) &&
   strlen($email) > 5 && strlen($username) > 5 &&
   strlen($password) > 5 && strlen($repeatpas) > 5) {

    if($password != $repeatpas){
        echo 'Парольді қате енгіздіңіз';
        exit(); // тоқтату
    }

    // Қауіпсіздік үшін парольді хештеу
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL инъекциядан қорғану
    $email = mysqli_real_escape_string($connection, $email);
    $username = mysqli_real_escape_string($connection, $username);

    $query = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$hashed_password')";
    $user_query = mysqli_query($connection, $query);

    if(!$user_query){
        echo 'Сұраныс орындалмады!';
        exit();
    }

    header('Location:  http://localhost/интернет%20дүкен/login.php');
    exit();

} else {
    echo 'Мәліметтерді толық енгізіңіз!';
}














// include '../config/database.php';

// $email = $_POST['email'];
// $username = $_POST['username '];
// $password = $_POST['password '];
// $repeatpas = $_POST['repeatpas'];

// if(isset($email) && isset($username) && isset($password) && isset($repeatpas) && 
// strlen($email) > 5 && strlen($username)> 5 && strlen($password)> 5 && strlen($repeatpas)> 5 ){

//     if($password != $repeatpas){
//         echo 'Құпиясөзді қате енгіздіңіз';
//     }

// $query = "INSERT INTO users (email, username,password) VALUES('$email','$username','$password')";
// $user_query = mysqli_query($connection, $query);

// if(!$user_query){
//     echo'Сұраныс орындалмады';
// }
// header('Location: http://localhost/%d0%ba%d0%bc4%20%d0%bf%d1%80%d0%b0%d0%ba%d1%82%d0%b8%d0%ba%d0%b0/20%2005%2025/login.php');
// }else{
//     echo 'Мәліметтерді толық енгізіңіз';
// }

?>