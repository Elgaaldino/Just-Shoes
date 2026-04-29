<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Just Shoes</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<header>
  <h1>Just Shoes</h1>
  <p>Gaya Kalem, Aura Kenceng</p>
</header>

<main>
  <section id="produk">
    <h2>Produk Unggulan</h2>
    <div class="product-grid">
      <?php
      $result = $conn->query("SELECT * FROM produk ORDER BY (gambar != '') DESC, id DESC");
      while ($row = $result->fetch_assoc()) {
        echo "<article>";
        echo "<h3>{$row['nama']}</h3>";
        echo "<figure><img src='assets/gambar/{$row['gambar']}' alt='{$row['nama']}' />";
        echo "<figcaption>{$row['deskripsi']}</figcaption></figure>";
        echo "<p>Harga: Rp " . number_format($row['harga'],0,',','.') . "</p>";
        echo "<form action='proses/simpan_pesanan.php' method='POST'>";
        echo "<input type='hidden' name='produkPilih' value='{$row['nama']}' />";
        echo "<input type='submit' value='Pesan' />";
        echo "</form>";
        echo "</article>";
      }
      ?>
    </div>
  </section>
</main>

<footer>
  <p>&copy; 2026 Just Shoes</p>
</footer>
</body>
</html>