<?php
include "connection.php";

$pageno = 0;
$page = $_POST["pg"];
$product = $_POST["p"];

// echo($product);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id`=`product`.`id` WHERE `product`.`name` LIKE '%$product%'";
$rs = Database::search($q);
$num = $rs->num_rows;
// echo($num);

$results_per_page = 8;

$num_of_pages = ceil($num / $results_per_page);
// echo($num_of_pages);

$page_results = ($pageno - 1) * $results_per_page;
// echo ($page_results);

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
// echo ($num2);


if ($num2 == 0) {
    # No Any Search Results

?>
    <div class="d-flex align-items-center flex-column mt-5">
        <h5>Search No Results</h5>
        <p>We're Sorry , We cannot find any matches for your search term...</p>
        <div>
            <img src="resources/Images/sad.png" alt="loading..." width="90px">
        </div>
    </div>
    <?php

} else {
    # Load Results

    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();

        $dataset = $rs->fetch_assoc();




    ?>
        <!-- Card -->

        <div class="card col-lg-4 col-md-6 col-sm-12" style="width: 350px">
            <a href="singleProductView.php?s=<?php echo $d["stock_id"] ?>"><img src=" <?php echo $d["path"] ?> " class="card-img-top mt-3" alt="..." style="height: 280px;" /></a>

            <div class="card-body">
                <h5 class="card-title text-center pfont"> <?php echo $d["name"] ?> </h5>
                <p class="card-text mt-3 text-center text-muted psubfont"> <?php echo $d["description"] ?> </p>
                <h3 class="card-title text-center fw-semibold fs-6 psubfont"> Rs&nbsp;.&nbsp;<?php echo $d["price"] ?> </h3>


                <?php

                if ($d["qty"] > 0) {
                ?>
                    <div class="row gap-2 d-flex justify-content-center align-items-center mt-4">
                        <!-- <a href="#" class="btn btn-primary col-5" >Add cart &nbsp; <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a> -->
                        <!-- <a href="#" class="btn btn-success col-5">Buy Now &nbsp; <i class="fa-regular fa-credit-card" style="color: #ffffff;"></i></a> -->
                        <!-- <a href="#" class="btn btn-danger col-10">Add to watchlist &nbsp; <i class="fa-solid fa-heart" style="color: #ffffff;"></i></a> -->
                        <span class="badge text-bg-warning text-center col-12 mt-3 py-2" id="stockStatus">In Stock</span>
                        <span class="badge bg-success text-center col-12 mt-3 py-2" id="stockStatus">Available Quantity :&nbsp;<?php echo $d["qty"] ?></span>
                    </div>
                <?php
                } else {
                ?>
                    <div class="row gap-2 d-flex justify-content-center align-items-center mt-4">
                        <!-- <a href="#" class="btn btn-primary col-5" >Add cart &nbsp; <i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a> -->
                        <!-- <a href="#" class="btn btn-success col-5">Buy Now &nbsp; <i class="fa-regular fa-credit-card" style="color: #ffffff;"></i></a> -->
                        <!-- <a href="#" class="btn btn-danger col-10">Add to watchlist &nbsp; <i class="fa-solid fa-heart" style="color: #ffffff;"></i></a> -->
                        <span class="badge text-bg-danger text-light col-12 mt-3 py-2" id="stockStatus">Out Of Stock</span>
                    </div>
                <?php
                }


                ?>

            </div>
        </div>

        <!-- Card -->
    <?php

    }

    ?>



    <div class="mt-5 mb-4">

        <!-- pagination -->
        <nav aria-label="Page navigation example ">
            <ul class="pagination justify-content-center">
                <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->

                <li class="page-item">
                    <a class="page-link" <?php

                                            if ($pageno <= 1) {
                                                echo ("#");
                                            } else {
                                            ?>onclick="loadhomeproduct(<?php echo ($pageno - 1) ?>);" <?php
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
                            <a class="page-link" onclick="loadhomeproduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="loadhomeproduct(<?php echo $y ?>);"><?php echo $y ?></a>
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
                                            ?>onclick="loadhomeproduct(<?php echo ($pageno + 1) ?>);" <?php
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
