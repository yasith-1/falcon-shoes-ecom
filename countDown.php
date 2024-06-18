<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- conunt down cdn  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countdown/2.6.0/countdown.min.js"></script>
    <!-- conunt down cdn  -->

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title>Set Offers End Date & Time</title>

</head>

<body data-bs-theme="dark" class="d-flex justify-content-center align-items-center min-vh-100">

    <!-- Nav bar -->
    <?php include "adminNavBar.php"; ?>
    <!-- Nav bar -->

    <div class="container d-flex justify-content-center">

        <div class="col-12 col-lg-7 ">
            <h2 class="text-center mb-4" style="font-family: poppins;">Set Offer Date & Time</h2>
            <div class="border border-secondary border-2 rounded-3 p-4 bg-body-tertiary">
                <div class="form-group">
                    <label for="offerEndDate" class="form-label fw-bold">Set Offer End Date and Time:</label>
                    <input type="datetime-local" class="form-control text-center " id="offerEndDate">
                </div>

                <div class="text-center mt-3">
                    <button id="setOfferDate" class="btn btn-warning spv spvbg mt-2 " id="reloadPageButton" onclick="settimebtn();">Set Offer Date
                        &nbsp;&nbsp; <span class="spinner-border text-dark spinner-border-sm d-none" id="spinnercountdown" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="countdown.js"></script>
</body>

</html>