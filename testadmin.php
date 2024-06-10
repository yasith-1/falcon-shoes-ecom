<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sidebar.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Falcon Shoes</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Welcome Admin | Falcon Shoes
                    </li>
                    <li class="sidebar-item">
                        <a href="#section1" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#section1" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#section1" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#section1" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                            Reports
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#Report" class="sidebar-link">User Report</a>
                            </li>

                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Product Report</a>
                            </li>

                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Stock Report</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                            Account
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Login</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Register</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Forgot Password</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>



        <div class="main">



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

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
























            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Falcon Shoes</strong>
                                </a>
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Terms</a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="text-muted">Booking</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>