<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
    <title>Thank You For Your Order</title>

</head>

<body>

    <div class="container text-start mt-3">
        <a href="orderHistory.php" class="text-decoration-none text-info">
            <img src="resources/Images/back.png" alt="Loading...." style="width: 25px; cursor: pointer;" />
            &nbsp;Back To Order History
        </a>
    </div>



    <div class="container mt-3 mb-4" data-bs-theme="light">


        <div class="border border-secondary border-3 bg-custom shadow-custom px-5 py-1 rounded-4 bg-body-tertiary" id="invoiceId"></div>

        <div class="text-center mt-4 mb-4">
            <button class="btn btn-warning col-12 col-md-3 py-2 rounded-3 spv spvbg" style="font-family: poppins;" onclick="genorderhistory();">Print Invoice &nbsp;<i class="fa-solid fa-print fa-lg" style="color: #000000;"></i></button>
        </div>


    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>