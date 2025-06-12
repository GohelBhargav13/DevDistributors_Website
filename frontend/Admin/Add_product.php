<?php
require 'conn.php';
include '../../Comman_pages/navbar.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $company_id   = (int) $_POST['company_name'];
    $product_name = trim($_POST['product-name']);


    // Check if files are uploaded
    if (isset($_FILES['image']) && isset($_FILES['image2'])) {
        $dir1 = 'assets/product_img/';
        $dir2 = 'assets/Extra_image/';

        $img1 = uniqid('prod_') . '_' . basename($_FILES['image']['name']);
        $img2 = uniqid('extra_') . '_' . basename($_FILES['image2']['name']);

        $path1 = $dir1 . $img1;
        $path2 = $dir2 . $img2;

        // Move files and insert into database
        if (
            move_uploaded_file($_FILES['image']['tmp_name'], $path1) &&
            move_uploaded_file($_FILES['image2']['tmp_name'], $path2)
        ) {
            $stmt = $conn->prepare("INSERT INTO product (company_id, name,image, image2)
                                    VALUES (?, ?, ?, ?)");
            $stmt->bind_param('isss', $company_id, $product_name, $img1, $img2);

            if ($stmt->execute()) {
                echo "<script>alert('Product added successfully.');</script>";
            } else {
                echo "<script>alert('Database error: " . $stmt->error . "');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload images.');</script>";
        }
    } else {
        echo "<script>alert('Image files not received.');</script>";
    }
}

// Load company data
$res = $conn->query("SELECT * FROM company");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <style>
        .product-form-container {
            background: #141414;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 20px cyan;
            width: 450px;
            text-align: center;
            margin-top: 30px;
        }

        .company-name {
            color: white;
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        h2 {
            color: aqua;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            color: white;
            display: block;
            margin-bottom: 8px;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 10px;
            background: #333;
            border: 1px solid aqua;
            border-radius: 8px;
            color: white;
            font-size: 1em;
        }

        input[type="file"]::file-selector-button {
            background: aqua;
            color: black;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn {
            background: aqua;
            color: black;
            border: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-size: 1.2em;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #00ffff;
        }

        select option {
            background: #333;
            color: white;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css "
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <center>
        <div class="product-form-container">
            <div class="company-name">Enter Awesome category's</div>
            <h2>Add New Product</h2>
            <form action="#" method="post" enctype="multipart/form-data" id="form_secure">
                <div class="input-group">
                    <label for="company_name">Choose Company:</label>
                    <select id="company_name" name="company_name" required>
                        <option value="">--Select a Company--</option>
                        <?php while ($row = $res->fetch_assoc()): ?>
                            <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['company_name']) ?></option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="product-name">Product Name:</label>
                    <input type="text" name="product-name" id="product-name" required>
                </div>
                <div class="input-group">
                    <label for="image">Product Image:</label>
                    <input type="file" name="image" accept="image/*" required>
                </div>
                <div class="input-group">
                    <label for="image2">Product Extra Image:</label>
                    <input type="file" name="image2" accept="image/*" required>
                </div>
                <button type="submit" class="submit-btn">Add Product</button>
            </form>
        </div>
    </center>
</body>

</html>