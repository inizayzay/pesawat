<?php
require_once dirname(__FILE__) . "/connections/database.php";
require_once dirname(__FILE__) . "/functions/register.php";
require_once dirname(__FILE__) . "/functions/check.php";

$error = '';
$success = '';

if (isset($_POST['create'])) {
    try {
        $result = register\create($_POST);
        if ($result['success']) {
            $success = 'Registration successful! Please login to continue.';
            header('refresh:10;url=login.php');
        }
    } catch (Exception $e) {
        $error = 'Registration failed: ' . $e->getMessage();
    }
}

if (check()) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Airline Passenger Registration">
    <meta name="author" content="">

    <title>Airline - Passenger Registration</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">

    <!-- Font Awesome -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/airbus.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .card-header {
            background: #4e73df;
            color: white;
            text-align: center;
            padding: 1.5rem;
            border-bottom: none;
        }

        .card-body {
            padding: 2.5rem;
        }

        .form-control {
            border-radius: 0.35rem;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d3e2;
        }

        .form-control:focus {
            border-color: #bac8f3;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
            border-color: #2653d4;
        }

        .btn-back {
            position: absolute;
            left: 1.5rem;
            top: 1.5rem;
            color: white;
            font-size: 1.25rem;
            z-index: 10;
        }

        .btn-back:hover {
            color: #e9ecef;
        }

        .gender-options {
            display: flex;
            gap: 2rem;
            margin-top: 0.5rem;
        }

        .gender-option {
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .gender-option input[type="radio"] {
            margin-right: 0.5rem;
        }

        .form-text {
            font-size: 0.8rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <a href="index.php" class="btn-back" title="Back to Home">
        <i class="fas fa-arrow-left"></i>
    </a>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h3 class="m-0">Passenger Registration</h3>
                        <p class="mb-0">Please fill in your details below</p>
                    </div>
                    <div class="card-body">
                        <?php if ($error): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle me-2"></i><?php echo htmlspecialchars($error); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if ($success): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i><?php echo htmlspecialchars($success); ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST" novalidate>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="fullName" name="FullName"
                                        placeholder="John Doe" required>
                                    <div class="invalid-feedback">
                                        Please provide your full name.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Gender</label>
                                    <div class="gender-options">
                                        <label class="gender-option">
                                            <input type="radio" name="gender" value="Male" class="form-check-input"
                                                required>
                                            <span>Male</span>
                                        </label>
                                        <label class="gender-option">
                                            <input type="radio" name="gender" value="Female" class="form-check-input">
                                            <span>Female</span>
                                        </label>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please select your gender.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="birth_date" class="form-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" required
                                        max="<?php echo date('Y-m-d'); ?>">
                                    <div class="invalid-feedback">
                                        Please provide your date of birth.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="placeOfBirth" class="form-label">Place of Birth</label>
                                    <input type="text" class="form-control" id="placeOfBirth" name="placeOfBirth"
                                        placeholder="e.g., Jakarta, Indonesia" required>
                                    <div class="invalid-feedback">
                                        Please provide your place of birth.
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="contactEmail" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="contactEmail" name="contactEmail"
                                        placeholder="john@example.com" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid email address.
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="contactNumber" class="form-label">Phone Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text">+62</span>
                                        <input type="tel" class="form-control" id="contactNumber" name="contactNumber"
                                            placeholder="81234567890" pattern="[0-9]{10,13}" required>
                                    </div>
                                    <div class="form-text">Enter your phone number without the leading 0</div>
                                    <div class="invalid-feedback">
                                        Please provide a valid phone number (10-13 digits).
                                    </div>
                                </div>

                                <div class="col-12 mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter your password" required>
                                    </div>
                                    <div class="invalid-feedback">
                                        Please provide a strong password.
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block" name="create">
                                <i class="fas fa-user-plus me-2"></i>Register Now
                            </button>

                            <div class="text-center mt-3">
                                <p class="mb-0">Already have an account?
                                    <a href="login.php" class="text-primary">Sign In</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

    <script>
        // Form validation
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>

</html>