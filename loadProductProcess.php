<?php
include "connection.php";

$pageno = 0;
$page = $_POST["p"];
// echo ($page);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`=`product`.`id` ORDER BY `stock`.`stock_id` ASC";
$rs = Database::search($q);
$num = $rs->num_rows;
// echo ($num);

$results_per_page = 8;;
$num_of_pages = ceil($num / $results_per_page);

// echo($num_of_pages);

$page_results = ($pageno - 1) * $results_per_page;

// echo ($page_results);

$q2 = $q . " LIMIT  $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;



// echo($num2);

if ($num2 == 0) {
    # No available products
    echo ("No Product Here");
} else {
    # Load Stock
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();




?>
        <!-- Card -->

        <div class="card col-lg-4 col-md-6 col-sm-12" style="width: 350px">
            <a href="singleProductView.php?s=<?php echo $d["stock_id"] ?>"><img src=" <?php echo $d["path"] ?> " class="card-img-top mt-3" alt="..." style="height: 280px;" /></a>

            <div class="card-body">
                <h5 class="card-title text-center pfont"> <?php echo $d["name"] ?> </h5>
                <p class="card-text mt-3 text-center psubfont"> <?php echo $d["description"] ?> </p>
                <h3 class="card-title text-center psubfont"> Rs:<?php echo $d["price"] ?> </h3>



                <!-- Upate stock status as in stock or out of stock -->
                <?php
                $q4 = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`= `product`.`id` 
                INNER JOIN `brand` ON `product`.`brand_id`=`brand`.`brand_id` 
                INNER JOIN `color` ON `product`.`color_id`=`color`.`color_id` 
                INNER JOIN `category` ON `product`.`category_id`=`category`.`cat_id` 
                INNER JOIN `size` ON `product`.`size_id`=`size`.`size_id` WHERE `stock`.`stock_id`='" . $d["stock_id"] . "'";

                $rs4 = Database::search($q4);
                $d4 = $rs->fetch_assoc();

                ?>
                <!-- Upate stock status as in stock or out of stock -->



                <div class="row gap-2 d-flex justify-content-center align-items-center mt-4">
                    <!-- <a href="#" class="btn btn-primary col-5" >Add cart &nbsp; <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a> -->
                    <!-- <a href="#" class="btn btn-success col-5">Buy Now &nbsp; <i class="fa-regular fa-credit-card" style="color: #ffffff;"></i></a> -->
                    <!-- <a href="#" class="btn btn-danger col-10">Add to watchlist &nbsp; <i class="fa-solid fa-heart" style="color: #ffffff;"></i></a> -->
                    <span class="badge text-bg-warning text-center col-12 mt-3 py-2" id="stockStatus"><?php if ($d4["qty"] == 0) {
                                                                                                            echo ("Out Of Stock");
                                                                                                        } else {
                                                                                                            echo ("In Stock");
                                                                                                        } ?></span>
                    <span class="badge text-bg-info text-center col-12 mt-3 py-2" id="stockStatus">Available Quantity :&nbsp;<?php echo ($d4["qty"]); ?></span>
                </div>
            </div>
        </div>

        <!-- Card -->

    <?php
    }

    ?>



    <div class="mt-3 mb-3">

        <!-- pagination -->
        <nav aria-label="Page navigation example ">
            <ul class="pagination justify-content-center">
                +

                <li class="page-item">
                    <a class="page-link" <?php

                                            if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?>onclick="searchproduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                }
                                                                                                    ?> aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {

                    if ($y == $pageno) {
                ?>
                        <li class="page-item active">
                            <a class="page-link" style="cursor: pointer;" onclick="searchproduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" style="cursor: pointer;" onclick="searchproduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                <?php
                    }
                }
                ?>



                <li class="page-item">
                    <a class="page-link" <?php

                                            if ($pageno >= $num_of_pages) {
                                                echo ("#");
                                            } else {
                                            ?>onclick="searchproduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                }
                                                                                                    ?> aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- pagination -->

    </div>
<?php
}


?>