  <?php
  require './conn.php';
  include '../../Comman_pages/navbar.php';
  $sql = "SELECT * FROM company";

  if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['btn'])) {
    $com_id = intval($_POST['com_id']);  // Get company ID safely

    $sql = "DELETE FROM product WHERE company_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param('i', $com_id);  // 'i' means integer
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            echo "<script>alert('The record is deleted.....'); window.location.href='simplelist.php';</script>";
        } else {
            echo "<script>alert('Record Not Found......')</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('SQL Error: " . $conn->error . "')</script>";
    }
}

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Image List</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
   

      .image-card {
        border: 1px solid #ddd;
        padding: 16px;
        margin-bottom: 20px;
        width: 300px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .image-card img {
        width: 100%;
        height: auto;
      }

      .image-info {
        margin-top: 10px;
      }

      .delete-button {
        background-color: red;
        color: white;
        border: none;
        padding: 10px 16px;
        cursor: pointer;
        border-radius: 5px;
        margin-top: 10px;
      }

      .delete-button:hover {
        background-color: darkred;
      }
    </style>
  </head>

  <body>
  <form action="#" method="post">
    <div class="image-card">
      <?php
      $res = $conn->query($sql);
      while ($row = mysqli_fetch_assoc($res)):
      ?>
        <img src="assets/company_img/<?= htmlspecialchars($row['image']) ?>" alt="Sample Image">
        <div class="image-info">
          <p><strong>ID:</strong><?= htmlspecialchars($row['id']) ?></p>
          <p><strong>Name:</strong><?=  htmlspecialchars($row['name'])?></p>
          <input type="hidden" name="com_id" value="<?= htmlspecialchars($row['id']) ?>">
          <button class="delete-button" name="btn" id="btn">Delete</button>
        </div>
      <?php endwhile; ?>
    </div>
  </form>
  </body>

  </html>