<?php
    session_start();
    $_SESSION['acc_type'] = "Admin";
    include "../session.php";
    
?>

<!DOCTYPE html>

<html>

<head>
    <title>NGCBDC</title>
    <link rel="icon" type="image/png" href="../Images/login2.png">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
</head>

<body>
    <div id="content">
        <span class="slide">
            <a href="#" class="open" id="sideNav-a" onclick="openSlideMenu()">
                <i class="fas fa-bars"></i>
            </a>
            <h4 class="title">NEW GOLDEN CITY BUILDERS AND DEVELOPMENT CORPORATION</h4>
            <div class="account-container">
                <?php 
                        $sql = "SELECT * FROM accounts WHERE accounts_id = '$accounts_id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($result);
            ?>
                <h5 class="active-user">
                    <?php echo $row[1]." ".$row[2]; ?>
                </h5>
                <div class="btn-group dropdown-account">
                    <button type="button" class="btn dropdown-toggle dropdown-settings" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </span>

        <div id="menu" class="navigation sidenav">
            <a href="#" class="close" id="sideNav-a" onclick="closeSlideMenu()">
                <i class="fas fa-times"></i>
            </a>
            <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="../Images/login2.png" id="ngcbdc-logo">
                </div>
                <ul class="list-unstyled components">
                    <li>
                        <a href="dashboard.php" id="sideNav-a">Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="#accountSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                            id="sideNav-a">Account</a>
                        <ul class="collapse list-unstyled" id="accountSubmenu">
                            <li>
                                <a href="accountcreation.php" id="sideNav-a">Create Account</a>
                            </li>
                            <li>
                                <a href="listofaccounts.php" id="sideNav-a">List of Accounts</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="passwordrequest.php" id="sideNav-a">Password Request</a>
                    </li>
                    <li>
                        <a href="projects.php" id="sideNav-a">Projects</a>
                    </li>
                    <li>
                        <a href="logs.php" id="sideNav-a">Logs</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <form id="createAccountForm" action="../server.php" method="POST" class="needs-validation" novalidate name="form">
        <div class="mx-auto mt-5 col-md-11 account-creation-container">
            <div class="card">
                <div class="card-header">
                    <h4>Create Account</h4>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="firstName" class="label-styles">First Name</label>
                        <input name="firstName" id="firstName" type="text" class="form-control" autocomplete="off"
                            placeholder="Enter first name" pattern="^[A-Za-z][A-Za-z0-9\s.,-]*$" required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="label-styles">Last Name</label>
                        <input name="lastName" id="lastName" type="text" class="form-control" autocomplete="off"
                            placeholder="Enter last name" pattern="^[A-Za-z][A-Za-z0-9\s.,-]*$" required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="label-styles">Username</label>
                        <input name="username" id="username" type="text" class="form-control" autocomplete="off"
                            placeholder="Enter username" pattern="^[0-9a-z]*" minlength="5" maxlength="18" required>
                        <div id="username_feedback" class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="label-styles">Email</label>
                        <input name="email" id="email" type="text" class="form-control" autocomplete="off" placeholder="Enter email"
                            pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$"
                            title="Follow the format. Example: email@email.com" required>
                        <div id="email_feedback" class="invalid-feedback">Please fill out this field.</div>
                    </div>

                    <h5 class="form-group" class="label-styles">Account Type:</h5>

                    <div class="custom-control custom-radio col-lg-4">
                        <input type="radio" class="custom-control-input" id="customControlValidation1"
                            name="accountType" value="View Only" required>
                        <label class="custom-control-label" for="customControlValidation1">View Only</label>
                    </div>
                    <div class="custom-control custom-radio mb-3 col-lg-4">
                        <input type="radio" class="custom-control-input" id="customControlValidation2"
                            name="accountType" value="Materials Engineer" required>
                        <label class="custom-control-label" for="customControlValidation2">Materials Engineer</label>
                        <div class="invalid-feedback">Please select one.</div>
                    </div>
                </div>
                <!-- </div> -->
                <div>
                    <button type="submit" class="btn btn-success add-acct" id="create-accnt-btn">Create Account</button>
                </div>
            </div>
        </div>
        </div>
        <!-- Start of confirmation modal -->
        <div class="modal fade" id="create-accnt-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to create this account?
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            &times;
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="createAccount" class="btn btn-success">Yes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

                    </div>
                </div>
            </div>
        </div>
        <!-- End of confirmation modal -->

    </form>

    <?php 
        if (isset($_SESSION['create_success'])) {
    ?>
    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">You have successfully created an account.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        &times;
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Okay</button>
                </div>
            </div>
        </div>
    </div>
    <?php
            unset($_SESSION['create_success']);
        }
    ?>
</body>

<script type="text/javascript">
    $(document).ready(function () {
        $('#username').keyup(function () {
            var v = form.username.value;
            $.post('checkAccountCreation.php', {
                    username: v
                },
                function (result) {
                    if (result == 1) {
                        $('#username').attr({
                            "pattern": "^(.*" + v + ").*$"
                        });
                        $('#username_feedback').html("Username is available.");
                    } else if (result == 2) {
                        $('#username').attr({
                            "pattern": "^(?!.*" + v + ").*$"
                        });
                        $('#username_feedback').html("Username is not available.");
                    } else if (result == 3) {
                        $('#username_feedback').html("Username is too short.");
                    } else if (result == 4) {
                        $('#username_feedback').html("Username is too long.");
                    } else {
                        $('#username_feedback').html(
                            "Username may only contain numbers and letters.");
                    }
                });
        });

        $('#email').keyup(function () {
            var v = form.email.value;
            $.post('checkAccountCreation.php', {
                    email: v
                },
                function (result) {
                    if(result == 1) {
                        $('#email').attr({
                            "pattern": "^(?!.*" + v + ").*$"
                        });                        
                        $('#email_feedback').html("Email address is not available.");
                    } else if(result == 0) {
                        $('#email').attr({
                            "pattern": "^(?.*" + v + ").*$"
                        }); 
                        $('#email_feedback').html(result);
                    } else {
                        $('#email').attr({
                            "pattern": "^(?!.*" + v + ").*$"
                        });    
                        $('#email_feedback').html("Invalid email.");
                    }
                });
        });
    });

    $(document).ready(function () {
        $("#success-modal").modal('show');
    });

    function openSlideMenu() {
        document.getElementById('menu').style.width = '15%';
    }

    function closeSlideMenu() {
        document.getElementById('menu').style.width = '0';
        document.getElementById('content').style.marginLeft = '0';
    }

    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

        $(".add-acct").click(function (e) {
            var fname = $("#firstName").val();
            var lname = $("#lastName").val();
            var uname = $("#username").val();
            var email = $("input[name=email]").val();
            var selectFrom = $("input:radio[name='accountType']");
            if ((fname != '') && (lname != '') && (uname != '') && (email != '') && (selectFrom.is(":checked"))) {
                e.preventDefault();
                $("#create-accnt-modal").modal('show');
            }
        });
    });

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

</html>