<?php
session_start();
include "connection.php";

$rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`=`product`.`id` ORDER BY `stock`.`stock_id` ASC");
$num = $rs->num_rows;
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
    <title>Falcon Shoes</title>

</head>

<body>

    <?php include "adminNavBar.php"; ?>

    <div class="container " style="margin-top: 100px;">
        <h2 class="text-center mb-4" style="font-family: poppins;">Change Stock Status</h2>
        <div class="table-responsive">
            <table class="table table-hover table-bordered text-center table-group-divider table-dark mt-4">
                <thead class="table-striped" style="font-family: poppins;">
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price Rs.</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Image</th>
                        <th scope="col">Mark as out of stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                    ?>
                        <tr class="text-light">
                            <td><?php echo $d["name"]; ?></td>
                            <td><?php echo $d["price"]; ?></td>
                            <td><?php if ($d["qty"] == 0) {
                                ?>
                                    <span class="badge text-bg-danger w-auto"><?php echo $d["qty"]; ?></span>
                                <?php
                                } else {
                                ?>
                                    <span class="badge text-bg-success w-auto"><?php echo $d["qty"]; ?></span>
                                <?php
                                }
                                ?>
                            </td>

                            <td><img src="<?php echo $d["path"]; ?>" width="150px" class="img-thumbnail img-fluid" alt="Product Image"></td>

                            <td><?php if ($d["qty"] == 0) {
                                ?>
                                    <button class="btn btn-danger btn-sm mt-3 spv spvbg" id="ststatus" style="font-family: poppins;" onclick="markAsOutOfStock(<?php echo $d['stock_id'] ?>);">Stock Outed</button>
                                <?php
                                } else {
                                ?>
                                    <button class="btn btn-outline-warning border-warning btn-sm mt-3 spv spvbg" id="ststatus" style="font-family: poppins;" onclick="markAsOutOfStock(<?php echo $d['stock_id'] ?>);">Mark as Out of Stock</button>
                                <?php
                                }
                                ?>
                            </td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>