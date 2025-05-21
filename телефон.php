<?php
$products = [
  [
    "name" => "Xiaomi Redmi Note 13 Pro",
    "price" => "200 000 ₸",
    "description" => "108MP камера, AMOLED экран, 5000mAh батарея.",
    "image" => "https://frankfurt.apollo.olxcdn.com/v1/files/fy1cv0s6bv24-UZ/image"
  ],
  [
    "name" => "Apple Watch Series 9",
    "price" => "300 000 ₸",
    "description" => "Жаңа S9 чип, денсаулық бақылауы, Always-On экран.",
    "image" => "https://www.digitaltrends.com/wp-content/uploads/2023/09/apple-watch-series-9-on-charge.jpg"
  ],
  [
  
    "name" => "ASUS ROG Gaming Laptop",
    "price" => "1 000 000 ₸",
    "description" => "Intel i9, RTX 4080, 32GB RAM, 1TB SSD.",
    "image" => "https://rog.asus.com/media/1640740558135.jpg"
  ],
  [
    "name" => "Samsung Smart TV 55''",
    "price" => "500 000 ₸",
    "description" => "4K UHD, Smart Hub, HDR технологиясы, Tizen OS.",
    "image" => "https://www.bigtv.ru/storage/goodsImages/556/556898/clear_556898_2.jpg"
  ]
];
?>

<!DOCTYPE html>
<html lang="kk">
<head>
  <meta charset="UTF-8">
  <title>TechnoDom Интернет Дүкені</title>
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(to right, #e0eafc, #cfdef3);
      margin: 0;
      padding: 0;
    }
    header {
      background-color: #009688;
      padding: 20px;
      color: white;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
      padding: 40px;
    }
    .product {
      background-color: #ffffff;
      border-radius: 16px;
      width: 260px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 10px 20px rgba(0,0,0,0.15);
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .product:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 25px rgba(0,0,0,0.2);
    }
    .product img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 12px;
      margin-bottom: 15px;
    }
    .product h2 {
      font-size: 18px;
      margin: 10px 0;
      color: #333;
    }
    .product .description {
      font-size: 14px;
      color: #666;
      height: 50px;
      margin-bottom: 10px;
    }
    .product p {
      font-size: 17px;
      font-weight: bold;
      color: #009688;
      margin-bottom: 15px;
    }
    .product button {
      background-color: #ff5722;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 30px;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .product button:hover {
      background-color: #e64a19;
    }
    footer {
      background-color: #263238;
      color: #ccc;
      text-align: center;
      padding: 20px;
      margin-top: 50px;
    }
  </style>
</head>
<body>

<header>
  TechnoDom - IT техника және гаджеттер дүкені
</header>

<div class="container">
  <?php foreach ($products as $product): ?>
    <div class="product">
      <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
      <h2><?= htmlspecialchars($product['name']) ?></h2>
      <div class="description"><?= htmlspecialchars($product['description']) ?></div>
      <p><?= $product['price'] ?></p>
      <button>Себетке қосу</button>
    </div>
  <?php endforeach; ?>
</div>

<footer>
  © <?= date("Y") ?> TechnoDom. Барлық құқықтар қорғалған.
</footer>

</body>
</html>


