<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="resources/Images/orgficon.png" type="image/x-icon">
    <title>Falcon Shoes | Contact</title>
    <link rel="icon" href="resources/Images/falcon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            color: #343a40;
        }

        .contact-section {
            padding: 60px 20px;
        }

        .contact-section h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .contact-section p {
            font-size: 1.2em;
        }

        .contact-info {
            margin-bottom: 40px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-custom {
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container text-start mt-1">
        <a href="home.php" class="text-decoration-none text-info">
            <img src="resources/Images/back.png" alt="Loading...." style="width: 25px; cursor: pointer;" />
            &nbsp;Back to Home
        </a>
    </div>

    <div class="container contact-section border border-secondary p-4 mt-5 mb-5 rounded-5 bg-body-tertiary shadow-lg">
        <h1 class="text-center text-warning">Contact Us !</h1>
        <p class="text-center text-light">We would love to hear from you! Please fill out the form below to get in touch with us.</p>

        <div class="row mt-5">
            <div class="col-md-6 contact-info text-light d-flex flex-column justify-content-center">
                <h3>Our Contact Information</h3>
                <div class="mt-4">
                    <p><strong>Address &nbsp;:</strong><span class="text-info"> No.64,Nathuduwa,kelaniya ,Sri Lanka</span></p>
                    <p><strong>Phone &nbsp;:</strong><span class="text-info"> +94 701410113 | +94 751887145</span></p>
                    <p><strong>Email &nbsp;:</strong><span class="text-info"> info@falconshoes.com</span></p>
                </div>
            </div>

            <div class="col-md-6 text-light">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control text-center" id="name" placeholder="Your Name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control text-center" id="email" placeholder="Your Email">
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control text-center" id="sub" placeholder="Subject">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="msg" rows="4" placeholder="Your Message"></textarea>
                </div>
                <button class="btn btn-warning w-100" onclick="contactbtn();">Send Message</button>

            </div>
        </div>

        <div class="row mt-5 text-light">
            <div class="col-12">
                <h2 class="text-center text-warning">Find Us !</h2>
                <div class="map-responsive text-center mt-2">
                    <iframe src="https://maps.google.com/maps?q=1234%20Street%20Name,%20City,%20Country&t=&z=13&ie=UTF8&iwloc=&output=embed" width="90%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>