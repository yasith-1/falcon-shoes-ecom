<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Sidebar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar .nav-item.active a {
            background-color: #495057;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#item1" data-bs-toggle="collapse" aria-expanded="true">Item
                                1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#item2" data-bs-toggle="collapse" aria-expanded="false">Item 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#item3" data-bs-toggle="collapse" aria-expanded="false">Item 3</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#item4" data-bs-toggle="collapse" aria-expanded="false">Item 4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#item5" data-bs-toggle="collapse" aria-expanded="false">Item 5</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="collapse show" id="item1">
                    <h2>Item 1 Content</h2>
                    <p>This is the content for Item 1. Edit this as needed.</p>
                </div>
                <div class="collapse" id="item2">
                    <h2>Item 2 Content</h2>
                    <p>This is the content for Item 2. Edit this as needed.</p>
                </div>
                <div class="collapse" id="item3">
                    <h2>Item 3 Content</h2>
                    <p>This is the content for Item 3. Edit this as needed.</p>
                </div>
                <div class="collapse" id="item4">
                    <h2>Item 4 Content</h2>
                    <p>This is the content for Item 4. Edit this as needed.</p>
                </div>
                <div class="collapse" id="item5">
                    <h2>Item 5 Content</h2>
                    <p>This is the content for Item 5. Edit this as needed.</p>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebarLinks = document.querySelectorAll('.sidebar .nav-link');
            sidebarLinks.forEach(function(link) {
                link.addEventListener('click', function() {
                    sidebarLinks.forEach(function(link) {
                        link.parentElement.classList.remove('active');
                    });
                    link.parentElement.classList.add('active');
                });
            });
        });
    </script>
</body>

</html>