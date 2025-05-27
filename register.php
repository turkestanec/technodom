<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reg.css">
   

</head>
<body>
   
    <section class="log">
        <div class="logg">
            <form action="api/signup.php" method="POST">
                <h3>Тіркелу</h3>
                <input name="email" type="email" placeholder="Почтаңызды енгізіңіз">
                <input name="username" type="text" placeholder="Аты-жөніңізді енгізіңіз">
                <input name="password" type="password" placeholder="Құпия сөзді енгізіңіз">
                <input name="repeatpas" type="password" placeholder="Құпия сөзді қайталаңыз">
                <button type=onClick>Жіберу</button>
            </form>
            <a href="login.php">Аккаунтқа кіру</a>
        </div>
    </section>
    
</body>
</html>