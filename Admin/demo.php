<?php
require './conn.php';
$pro_id = null;

if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['cat_name'])) {
    $cat_name = urldecode($_GET['cat_name']);
} else {
    echo "<script>alert('Product ID is not set.'); window.location.href='index.php';</script>";
    exit;
}

$stmt = $conn->prepare("SELECT * FROM product WHERE name = ?");
$stmt->bind_param("s", $cat_name);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();

if (!$row) {
    echo "<script>alert('Product not found'); window.location.href='index.php';</script>";
    exit;
}

$unit_price = (float) $row['price'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Product Card</title>

  <style>
    .product-card {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 15px;
      margin: 10px auto;
      max-width: 800px;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      background-color: #fff;
    }
    .product-image img {
      height: 100px;
      width: 100px;
      object-fit: cover;
      border-radius: 8px;
    }
    .product-details {
      flex: 1;
      margin-left: 20px;
    }
    .product-details h4 {
      margin: 0;
      font-size: 1.2em;
    }
    .price-section {
      margin-top: 5px;
    }
    .qty-section {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .qty-section button {
      padding: 5px 10px;
      font-size: 16px;
    }
    .qty-section input {
      width: 50px;
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="product-card">
    <div class="product-image">
      <img src="assets/product_img/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
    </div>

    <div class="product-details">
      <h4><?= htmlspecialchars($row['name']) ?></h4>
      <div class="price-section">
        <p><strong>Unit size:</strong> <?= htmlspecialchars($row['unit_size']) ?></p>
        <p><strong>per Unit size:</strong> <?= htmlspecialchars($row['price']) ?>(1 Box)</p>
        <p><strong>Total Price:</strong> ₹<span id="totalPrice"><?= number_format($unit_price, 2) ?></span></p>
      </div>
    </div>

    <div class="qty-section">
      <button onclick="">-</button>
      <input type="text" id="quantity" value="1" readonly />
      <button onclick="">+</button>
    </div>
  </div>
</body>
</html>
