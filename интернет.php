...
<!-- Бұрынғы код жалғасады -->

<div class="product-grid">
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
<div class="feedback-section" style="max-width: 800px; margin: 50px auto; padding: 30px; background: #fff; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
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

<footer>
  <p>Байланыс: +7 (777) 123-45-67 | Email: support@technodom.kz</p>
  <p>Мекенжай: Алматы қ., Абылай хан даңғ., 45</p>
  <p>&copy; <?= date("Y") ?> TechnoDom. Барлық құқықтар қорғалған.</p>
</footer>

</body>
</html>
