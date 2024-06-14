<?php
include "connection.php";

session_start();
if (isset($_SESSION["a"])) {

?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
        <title>Falcon Shoes</title>
    </head>

    <body>

        <?php include "adminNavBar.php"; ?>

        <div class="container " style="margin-top: 100px;">
            <div class="row">
                <!-- Product register -->
                <div class="col-md-6 border border-secondary p-2 me-0 ">


                    <h2 class="card-title text-center">Product Registration</h2>

                    <div class="mb-3 px-3">
                        <label for="pname" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="pname" />
                    </div>

                    <div class="mb-3 px-3">
                        <label for="brand" class="form-label">Brand</label>
                        <select class="form-select" id="brand">
                            <option value="0">Select</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `brand`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $data = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($data["brand_id"]); ?>"><?php echo ($data["brand_name"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3 px-3">
                        <label for="cat" class="form-label">Category</label>
                        <select class="form-select" id="cat">
                            <option value="0">Select</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `category`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $data = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($data["cat_id"]); ?>"><?php echo ($data["cat_name"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3 px-3">
                        <label for="color" class="form-label">Color</label>
                        <select class="form-select" id="color">
                            <option value="0">Select</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `color`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $data = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($data["color_id"]); ?>"><?php echo ($data["color_name"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3 px-3">
                        <label for="size" class="form-label">Size</label>
                        <select class="form-select" id="size">
                            <option value="0">Select</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `size`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $data = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($data["size_id"]); ?>"><?php echo ($data["size_name"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3 px-3">
                        <label for="desc" class="form-label">Description</label>
                        <textarea class="form-control" rows="3" id="desc"></textarea>
                    </div>

                    <div class="mb-3 px-3">
                        <label for="file" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="file" multiple />
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                        <button class="btn btn-success" onclick="regProduct();">Register Product</button>
                    </div>


                </div>

                <!-- Stock Management -->
                <div class="col-md-6 border border-secondary p-2 mt-lg-0 mt-5  ">
                    <h2 class="card-title text-center">Stock Update</h2>

                    <div class="mb-3 px-3">
                        <label for="selectProduct" class="form-label">Product Name</label>
                        <select class="form-select" id="selectProduct">
                            <option value="0">Select</option>
                            <?php
                            $rs = Database::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                            ?>
                                <option value="<?php echo ($d["id"]); ?>"><?php echo ($d["name"]); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3 px-3">
                        <label for="qty" class="form-label">Qty</label>
                        <input type="text" class="form-control" id="qty" min="1" required />
                    </div>

                    <div class="mb-3 px-3">
                        <label for="uprice" class="form-label">Unit Price</label>
                        <input type="text" class="form-control" id="uprice" required />
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                        <button class="btn btn-success" onclick="updateStock();">Update Stock</button>
                    </div>

                </div>


                
            </div>
        </div>


        <?php include "footer.php"; ?>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>

    </html>
<?php
} else {
    echo ("You are not a valid admin");
?>
    <br><br>
    <a href="adminSignin.php">Go Back</a>
<?php
}
?>