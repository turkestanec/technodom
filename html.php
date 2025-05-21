<?php
$products = [
  [
    "name" => "iPhone 15 Pro Max",
    "price" => "700 000 ₸",
    "image" => "https://irecommend.ru/sites/default/files/imagecache/copyright1/user-images/28640/jjqO7gO0gKMP3tHOP6V81A.jpeg"
  ],
  [
    "name" => "Samsung Galaxy S24 Ultra",
    "price" => "629 990 ₸",
    "image" => "https://i.ytimg.com/vi/QgrtD2yGw1Y/maxresdefault.jpg"
  ],
  [
    "name" => "MacBook Air M2",
    "price" => "800 000 ₸",
    "image" => "https://frankfurt.apollo.olxcdn.com/v1/files/tdbd3hpdasq5-KZ/image;s=1600x894"
  ],
  [
    "name" => "PlayStation 5",
    "price" => "499 990 ₸",
    "image" => "https://i.ytimg.com/vi/umR4d7XIH18/maxresdefault.jpg"
  ]
];
?>

<!DOCTYPE html>
<html lang="kk">
<head>
  <meta charset="UTF-8">
  <title>TechnoDom Интернет Дүкені</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    header {
      background: #ff6600;
      color: white;
      padding: 20px;
      text-align: center;
      position: sticky;
      top: 0;
      z-index: 999;
    }
    header nav ul {
      list-style: none;
      display: flex;
      justify-content: center;
      padding: 0;
      margin-top: 15px;
      flex-wrap: wrap;
    }
    header nav ul li {
      margin: 0 15px;
    }
    header nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: bold;
    }
    header nav ul li a:hover {
      text-decoration: underline;
    }

    .intro {
      max-width: 900px;
      margin: 30px auto;
      font-size: 18px;
      text-align: center;
      color: #333;
    }
    .banner {
      background: #ffe0b2;
      padding: 20px;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 30px;
      border-top: 2px solid #ff6600;
      border-bottom: 2px solid #ff6600;
    }
    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }
    .card {
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    .card-body {
      padding: 15px;
    }
    .card h2 {
      font-size: 20px;
      margin: 0 0 10px;
    }
    .price {
      color: green;
      font-size: 18px;
      margin-bottom: 15px;
    }
    .buy-button {
      display: inline-block;
      padding: 10px 15px;
      background: #ff6600;
      color: white;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
    }
    .buy-button:hover {
      background: #e65c00;
    }

    .feedback-section {
      max-width: 800px;
      margin: 50px auto;
      padding: 30px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    footer {
      background: #333;
      color: white;
      text-align: center;
      padding: 30px 20px;
      margin-top: 40px;
    }
  </style>
</head>
<body>

<header>
  <h1>TechnoDom - IT техника мен гаджеттер әлемі</h1>
  <nav>
    <ul>
      <li><a href="#">Басты бет</a></li>
      <li><a href="телефон.php">Өнімдер</a></li>
      <li><a href="#about">Біз туралы</a></li>
      <li><a href="телефон.php">Пікірлер</a></li>
      <li><a href="#contacts">Байланыс</a></li>
    </ul>
  </nav>
</header>

<div id="about" class="intro">
  <p>Біз сізге ең соңғы үлгідегі смартфондар, ноутбуктер, ойын құрылғылары мен басқа да IT гаджеттерді ұсынамыз. TechnoDom — сенімділік пен сапаның кепілі!</p>
</div>

<div class="banner">
  🎉 Арнайы акция! Барлық смартфондарға -10% жеңілдік тек осы аптада!
</div>

<div id="products" class="product-grid">
  <?php foreach ($products as $product): ?>
    <div class="card">
      <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
      <div class="card-body">
        <h2><?= htmlspecialchars($product['name']) ?></h2>
        <p class="price"><?= $product['price'] ?></p>
        <a href="телефон.php" class="buy-button">Сатып алу</a>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-- Пікір бөлімі -->
<div id="feedback" class="feedback-section">
  <h2 style="text-align: center; color: #333;">📝 Біз жайлы пікіріңізді қалдырыңыз</h2>
  <form method="post" action="" style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
    <input type="text" name="username" placeholder="Атыңыз" required style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
    <textarea name="comment" placeholder="Пікіріңіз" rows="5" required style="padding: 10px; border-radius: 5px; border: 1px solid #ccc;"></textarea>
    <button type="submit" class="buy-button" style="width: 200px; margin: 0 auto;">Жіберу</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["comment"])) {
      $username = htmlspecialchars($_POST["username"]);
      $comment = htmlspecialchars($_POST["comment"]);
      echo "<div style='margin-top: 30px; padding: 15px; background: #e0ffe0; border-left: 4px solid green;'>
              <strong>$username:</strong> $comment
            </div>";
  }
  ?>
</div>

<footer id="contacts">
  <p>Байланыс: +7 (777) 123-45-67 | Email: support@technodom.kz</p>
  <p>Мекенжай: Алматы қ., Абылай хан даңғ., 45</p>
  <p>&copy; <?= date("Y") ?> TechnoDom. Барлық құқықтар қорғалған.</p>
</footer>
</body>
</html>
