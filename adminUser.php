<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="resources/Images/falcon.png" />
    <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
    <title>Falcon Shoes</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .table thead th {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body onload="loadUsersdata();">

    <?php include "adminNavBar.php"; ?>

    <div class="container p-2" style="margin-top: 150px;">
        <div class="row border rounded-3 px-2 py-3">

            <div class="col-lg-3 col-md-12 d-flex flex-column align-items-center text-center mb-5 mb-lg-0 border rounded-4">
                <!-- Search User Heading -->
                <div class="d-flex flex-column justify-content-center align-items-center mt-3 mb-4">
                    <h4 class="text-white">Search User Name OR Email</h4>
                </div>
                <!-- Search Box -->
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Type username here" id="uname">
                    <button class="input-group-text btn btn-success" onclick="searchUserName();">Search</button>
                </div>
                <!-- Email Search Box -->
                <div class="input-group mb-5">
                    <input type="email" class="form-control" placeholder="Type user email here" id="email">
                    <button class="input-group-text btn btn-success" onclick="searchUserEmail();">Search</button>
                </div>
                <!-- Change Status Heading -->
                <div class="d-flex flex-column justify-content-center align-items-center mt-5 mb-4">
                    <h4 class="text-white">Change Users Status</h4>
                </div>
                <!-- Change Status Box -->
                <div class="input-group mb-4">
                    <input type="text" class="form-control" placeholder="Enter User ID here" id="uid">
                    <button class="input-group-text btn btn-danger" onclick="updateUserStatus();">Change Status</button>
                </div>
            </div>

            <div class="col-lg-9 col-md-12">
                <!-- Heading -->
                <div class="d-flex flex-column justify-content-center align-items-center mt-3 mb-4">
                    <h4 class="fw-bold bg-primary py-2 px-3 rounded-3 border border-1 text-white">User Management</h4>
                </div>
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">User ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody id="tb">
                            <!-- Example row -->
                            <!--
                            <tr>
                                <th scope="row">1</th>
                                <td>Yasith</td>
                                <td>Prabashwara</td>
                                <td>yasithprabaswara1@gmail.com</td>
                                <td>0701410113</td>
                                <td>Active</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <button class="btn btn-primary">Active</button>
                                </td>
                            </tr>
                            -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>