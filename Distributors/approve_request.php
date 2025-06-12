<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require '../frontend/Admin/conn.php';
include '../Comman_pages/navbar.php';

$select_sql = "SELECT * FROM distributors WHERE approve_status = 'pending' ";
$count = 0;

// Handle Approve or Reject actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn']) && isset($_POST['approve_id'])) {
        $app_id = $_POST['approve_id'];
        $status = 'accepted';
        $update_sql = "UPDATE distributors SET approve_status='$status' WHERE d_id = $app_id";
        $conn->query($update_sql); // execute the update
        echo "<script>alert('Approved Successfully');</script>";
    }
    if (isset($_POST['btn2']) && isset($_POST['approve_id'])) {
        $app_id = $_POST['approve_id'];
        $delete_sql = "DELETE FROM distributors WHERE d_id = $app_id";
        $conn->query($delete_sql); // execute the delete
        echo "<script>alert('Rejected Successfully');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../frontend/Admin/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="background-color: black;">
    <section class="intro" style="margin:20px;">
        <div class="bg-image h-100">
            <div class="mask d-flex align-items-center h-100">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="card shadow-2-strong" style="background-color: #f5f7fa;">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <thead>
                                                <H3 class="text-dark" align="center">New Request's</H3>
                                                <tr style="border-bottom: 2px solid black;">
                                                    <th scope="col">
                                                         
                                                    </th>

                                                    <th scope="col">Shope Name</th>
                                                    <th scope="col">Holder Name</th>
                                                    <th scope="col">Phone No.</th>
                                                    <th scope="col" style="display: flex; margin-left: 60px;">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                                <?php
                                                $res = $conn->query($select_sql);
                                                if ($res && mysqli_num_rows($res) > 0):
                                                    while ($row = mysqli_fetch_assoc($res)):
                                                        $count++;
                                                ?>
                                                        <span class="name" style="display: none;">Count : <b><?= $_SESSION['count'] = $count ?></b></span>
                                                        <tr style="border-bottom: 2px solid black;">

                                                            <th scope="row">
                                                            </th>


                                                            <td><?= htmlspecialchars($row['shop_name']) ?></td>
                                                            <td><?= htmlspecialchars($row['distributor_name']) ?> </td>
                                                            <td><?= htmlspecialchars($row['phone_no']) ?></td>
                                                            <td>
                                                                <form action="#" method="post">
                                                                    <input type="hidden" name="approve_id" value="<?= htmlspecialchars($row['d_id']); ?>">
                                                                <button type="submit" class="btn btn-danger btn-sm px-3" name="btn2">
                                                                    Reject
                                                                </button>
                                                                 <input type="hidden" name="approve_id" value="<?= htmlspecialchars($row['d_id']); ?>">
                                                                <button type="submit" class="btn btn-primary btn-sm px-3 " name="btn" id="btn">
                                                                    Approve
                                                                </button>
                                                                </form>
                                                            </td>


                                                        </tr>
                                                        

                                                <?php endwhile;
                                                endif;
                                                ?>
                                                <hr style="background-color: black;">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>