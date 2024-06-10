<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
    <title>Admin | Falcon shoes</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-secondary px-3 py-1 fixed-top ">
        <div class="container-fluid">
            <a class="navbar-brand me-3" href="adminDashboard.php">
                <img src="resources/Images/orgficon.png" class="img-fluid" alt="Admin panel" width="50px">
            </a>
            <a class="navbar-brand fw-bolder" href="adminDashboard.php" style="font-family: poppins; letter-spacing: 1px;">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto  d-flex flex-lg-grow-1 justify-content-center align-items-center gap-lg-5 gap-md-3">
                    <li class="nav-item ">
                        <a class="nav-link adminnavbarhov text-light" style="font-family: poppins;" aria-current="page" href="adminUser.php">User Management</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link adminnavbarhov text-light" style="font-family: poppins;" aria-current="page" href="adminProduct.php">Product Management</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link adminnavbarhov text-light" style="font-family: poppins;" aria-current="page" href="adminStock.php">Stock Management</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link adminnavbarhov text-light" style="font-family: poppins;" aria-current="page" href="adminReport.php">Reports</a>
                    </li>
                </ul>
                <div class="d-flex ms-lg-4">
                    <button type="button" class="btn btn-light btn-outline-secondary" onclick="adminLogout();">LOG OUT &nbsp;<i class="fa-solid fa-right-from-bracket"></i></button>
                </div>
            </div>
        </div>
    </nav>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="script.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>

</html>