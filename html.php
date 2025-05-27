<?php
session_start();

// Себет сессиясы
if (!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = [];
}

// Өнімдер
$products = [
  ["name" => "iPhone 15 Pro Max", "price" => "700 000 ₸", "image" => "https://irecommend.ru/sites/default/files/imagecache/copyright1/user-images/28640/jjqO7gO0gKMP3tHOP6V81A.jpeg"],
  ["name" => "Samsung Galaxy S24 ", "price" => "629 990 ₸", "image" => "https://i.ytimg.com/vi/QgrtD2yGw1Y/maxresdefault.jpg"],
  ["name" => "MacBook Air M2", "price" => "800 000 ₸", "image" => "https://frankfurt.apollo.olxcdn.com/v1/files/tdbd3hpdasq5-KZ/image;s=1600x894"],
  ["name" => "PlayStation 5", "price" => "499 990 ₸", "image" => "https://i.ytimg.com/vi/umR4d7XIH18/maxresdefault.jpg"]
];

$loginMessage = "";
$orderMessage = "";

// POST әрекеттері
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["login"])) {
    $username = $_POST["login_username"];
    $password = $_POST["login_password"];
    if ($username === "admin" && $password === "1234") {
      $_SESSION["user"] = $username;
      $loginMessage = "Сәтті кірдіңіз!";
    } else {
      $loginMessage = "Қате логин немесе құпиясөз!";
    }
  } elseif (isset($_POST["register"])) {
    $registerMessage = "Тіркелу сәтті өтті! (Бұл демонстрация ғана)";
  } elseif (isset($_POST["add_to_cart"])) {
    $_SESSION["cart"][] = $_POST["product_name"];
  } elseif (isset($_POST["place_order"])) {
    if (!empty($_SESSION["cart"])) {
      $orderDetails = "Тапсырыс: " . implode(", ", $_SESSION["cart"]) . "\n";
      file_put_contents("orders.txt", $orderDetails, FILE_APPEND);
      $_SESSION["cart"] = []; // себетті тазалау
      $orderMessage = "Тапсырысыңыз қабылданды!";
    } else {
      $orderMessage = "Себет бос!";
    }
  } elseif (isset($_POST["username"]) && isset($_POST["comment"])) {
    $entry = htmlspecialchars($_POST["username"]) . ": " . htmlspecialchars($_POST["comment"]) . "\n";
    file_put_contents("feedback.txt", $entry, FILE_APPEND);
  }
}

// Іздеу
$search = isset($_GET['search']) ? strtolower($_GET['search']) : '';
$filteredProducts = array_filter($products, function ($product) use ($search) {
  return empty($search) || strpos(strtolower($product['name']), $search) !== false;
});
?>
<!DOCTYPE html>
<html lang="kk">
<head>
  <meta charset="UTF-8">
  <title>TechnoDom Интернет Дүкені</title>
  <style>
    footer {
      background: #333;
      color: white;
      text-align: center;
      padding: 30px 20px;
      margin-top: 40px;
    }
    body { font-family: sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
    header { background: #ff6600; color: white; padding: 20px; text-align: center; position: sticky; top: 0; z-index: 999; }
    header nav ul { list-style: none; display: flex; justify-content: center; padding: 0; margin-top: 15px; flex-wrap: wrap; }
    header nav ul li { margin: 0 15px; }
    header nav ul li a { color: white; text-decoration: none; font-weight: bold; }
    .product-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; max-width: 1200px; margin: 0 auto; padding: 0 20px; }
    .card { background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); text-align: center; padding-bottom: 10px; }
    .card img { width: 100%; height: 200px; object-fit: cover; }
    .buy-button { padding: 10px 15px; background: #ff6600; color: white; border: none; border-radius: 5px; text-decoration: none; font-weight: bold; cursor: pointer; }
    .intro { max-width: 900px; margin: 30px auto; font-size: 18px; text-align: center; color: #333; }
    .banner { background: #ffe0b2; padding: 20px; text-align: center; font-size: 20px; font-weight: bold; margin-bottom: 30px; border-top: 2px solid #ff6600; border-bottom: 2px solid #ff6600; }
  </style>
</head>
<body>

<header>
  <h1>TechnoDom - IT техника мен гаджеттер әлемі</h1>
  <nav>
    <ul>
      <li><a href="#">Басты бет</a></li>
      <li><a href="телефон.php">Өнімдер</a></li>
      <li><a href="#feedback">Пікірлер</a></li>
      <li><a href="телефон.php">Байланыс</a></li>
      <?php if (isset($_SESSION["user"])): ?>
        <li><strong><?= htmlspecialchars($_SESSION["user"]) ?></strong> | <a href="?logout=1">Шығу</a></li>
      <?php else: ?>
        <li><a href="#" onclick="document.getElementById('loginModal').style.display='block'">Кіру</a></li>
        <li><a href="register.php" >Тіркелу</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>

<?php if (isset($_GET['logout'])) { session_destroy(); header("Location: index.php"); exit; } ?>

<div class="intro">
  <p>Смартфондардан бастап ойын құрылғыларына дейін – заманауи технологиялар әлемі TechnoDom-да!
TechnoDom – сенімділік пен жоғары сапаның символы.</p>
</div>

<div class="banner">
  🚀 Смартфоныңды жаңартатын уақыт келді! Тек осы аптада – барлық смартфондарға -15% жеңілдік!
</div>

<div id="products" class="product-grid">
  <?php foreach ($filteredProducts as $product): ?>
    <div class="card">
      <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
      <div class="card-body">
        <h2><?= htmlspecialchars($product['name']) ?></h2>
        <p class="price"><?= $product['price'] ?></p>
        <form method="post">
          <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['name']) ?>">
          <button type="submit" name="add_to_cart" class="buy-button">Себетке қосу</button>
        </form>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-- 🛒 Себет -->
<div id="cart" style="max-width: 800px; margin: 50px auto; background: #fff; padding: 20px;">
  <h2>🛒 Себет</h2>
  <?php
  if (!empty($_SESSION["cart"])) {
    $counts = array_count_values($_SESSION["cart"]);
    foreach ($counts as $item => $qty) {
      echo "<p>" . htmlspecialchars($item) . " — $qty дана</p>";
    }
  } else {
    echo "<p>Себет бос.</p>";
  }
  ?>
  <form method="post">
    <button type="submit" name="place_order" class="buy-button">Тапсырыс беру</button>
  </form>
  <?php if (!empty($orderMessage)) echo "<p style='color:green;'>$orderMessage</p>"; ?>
</div>

<!-- Пікірлер -->
<div id="feedback" style="max-width: 800px; margin: 50px auto; background: #fff; padding: 20px;">
  <h2>Пікір қалдыру</h2>
  <form method="post">
    <input type="text" name="username" placeholder="Атыңыз" required><br>
    <textarea name="comment" placeholder="Пікіріңіз" rows="5" required></textarea><br>
    <button type="submit" class="buy-button">Жіберу</button>
  </form>
  <?php
  if (file_exists("feedback.txt")) {
    $comments = file("feedback.txt");
    foreach ($comments as $c) {
      echo "<div style='margin-top:10px; background:#f1f1f1; padding:10px;'>".htmlspecialchars($c)."</div>";
    }
  }
  ?>
</div>

<!-- Модалдар -->
<div id="loginModal" class="modal" style="display:none;position:fixed;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.6);">
  <div class="modal-content" style="background:#fff;max-width:400px;margin:10% auto;padding:20px;position:relative;">
    <span onclick="document.getElementById('loginModal').style.display='none'" style="position:absolute;top:10px;right:15px;cursor:pointer;">&times;</span>
    <h3 style="text-align:center">Кіру</h3>
    <form method="post">
      <input type="text" name="login_username" placeholder="Логин" required><br>
      <input type="password" name="login_password" placeholder="Құпиясөз" required><br>
      <button type="submit" name="login" class="buy-button">Кіру</button>
    </form>
    <?php if (!empty($loginMessage)) echo "<p style='color:green;'>$loginMessage</p>"; ?>
  </div>
</div>

<div id="registerModal" class="modal" style="display:none;position:fixed;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.6);">
  <div class="modal-content" style="background:#fff;max-width:400px;margin:10% auto;padding:20px;position:relative;">
    <span onclick="document.getElementById('registerModal').style.display='none'" style="position:absolute;top:10px;right:15px;cursor:pointer;">&times;</span>
    <h3 style="text-align:center">Тіркелу</h3>
    <form method="post">
      <input type="text" name="register_username" placeholder="Логин" required><br>
      <input type="password" name="register_password" placeholder="Құпиясөз" required><br>
      <button type="submit" name="register" class="buy-button">Тіркелу</button>
    </form>
    <?php if (isset($registerMessage)) echo "<p style='color:green;'>$registerMessage</p>"; ?>
  </div>
</div>

<footer>
  <p>Байланыс: +7 (777) 123-45-67 | Email: support@technodom.kz</p>
  <p>Мекенжай: Алматы қ., Абылай хан даңғ., 45</p>
  <p>&copy; <?= date("Y") ?> TechnoDom. Барлық құқықтар қорғалған.</p>
</footer>

<script>
window.onclick = function(event) {
  if (event.target.classList.contains('modal')) {
    event.target.style.display = "none";
  }
}
</script>

</body>
</html>


