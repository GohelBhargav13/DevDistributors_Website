<?php 
    require './conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <marquee behavior="scroll" direction="left">
    <div class="slider-container" style="background-color: lightcyan; padding: 5px; border-radius: 8px;">
    <div class="slider-track">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM company");
        while ($row = mysqli_fetch_assoc($result)) { ?>
        
            <img width="100px" height="100px" style="border-radius: 50px;" src="./assets/company_img/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['company_name']) ?>">
        <?php } ?>
    </div>
</div>
</marquee>
</body>
</html>