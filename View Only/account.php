<?php
    include "../session.php";
?>

<!DOCTYPE html>

<html>

<head>
    <title>NGCBDC</title>
    <link rel="icon" type="image/png" href="../Images/login2.png">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
                    <a class="dropdown-item" href="account.php">Account Settings</a>
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
                        <a href="projects.php" id="sideNav-a">Projects</a>
                    </li>
                    <li>
                        <a href="hauleditems.php" id="sideNav-a">Hauled Materials</a>
                    </li>
                    <li>
                        <a href="sitematerials.php" id="sideNav-a">Site Materials</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="mx-auto mt-5 col-md-11">
        <div class="card">
            <div class="card-header">
                <h4>User Information</h4>
            </div>
            <div class="card-body">
                <?php 
                    $sql = "SELECT 
                    accounts_fname, accounts_lname, accounts_username, accounts_email, accounts_password FROM accounts
                    WHERE accounts_id = $accounts_id;";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_row($result);
                ?>
                <form class="form " action="../server.php" method="POST">
                    <div class="row form-group">
                        <label class="col-lg-2 col-form-label ">First name</label>
                        <div class="col-lg-4">
                            <input class="form-control" type="text" value="<?php echo $row[0]?>" name="firstName">
                        </div>
                        <label class="col-lg-2 col-form-label">Last name</label>
                        <div class="col-lg-4">
                            <input class="form-control" type="text" value="<?php echo $row[1]?>" name="lastName">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-2 col-form-label">Username</label>
                        <div class="col-lg-4">
                            <input class="form-control" type="text" value="<?php echo $row[2]?>" name="username">
                        </div>
                        <label class="col-lg-2 col-form-label ">Email Address</label>
                        <div class="col-lg-4">
                            <input class="form-control" type="email" value="<?php echo $row[3]?>" name="email">
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-lg-2 col-form-label">New Password</label>
                        <div class="col-lg-4">
                            <input class="form-control" type="password" name="pass" id="pass">
                        </div>
                        <label class="col-lg-2 col-form-label">Confirm Password</label>
                        <div class="col-lg-4">
                            <input class="form-control" type="password" name="confpass" id="confpass">
                        </div>
                        <div class="col">
                            <input type="checkbox" id="checkbox-new-password" onclick="showNewPassword()" />
                            <label for="checkbox-new-password" >Show new password</label>
                        </div>
                        <div class="col">
                            <span class="error" style="color:red"></span><br />
                        </div>
                    </div>
                    <div class="row form-group accnt-btn">

                        <input type="submit" class="btn btn-success save-accnt-btn" name="update_account"
                            value="Save Changes">
                        <input type="reset" class="btn btn-danger cancel-accnt-btn" value="Cancel">

                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
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

        var allowsubmit = false;
        $(function () {
            $('#confpass').keyup(function (e) {
                var pass = $('#pass').val();
                var confpass = $(this).val();
                if (pass == confpass) {
                    $('.error').text('');
                    allowsubmit = true;
                } else {
                    $('.error').text('Password not matching');
                    allowsubmit = false;
                }
            });

            $('#form').submit(function () {

                var pass = $('#pass').val();
                var confpass = $('#confpass').val();

                if (pass == confpass) {
                    allowsubmit = true;
                }
                if (allowsubmit) {
                    return true;
                } else {
                    return false;
                }
            });
        });

    });

    function showNewPassword() {
        var show = document.getElementById("pass");
        if (show.type === "password") {
            show.type = "text";
        } else {
            show.type = "password";
        }
        var showconfirm = document.getElementById("confpass");
        if (showconfirm.type === "password") {
            showconfirm.type = "text";
        } else {
            showconfirm.type = "password";
        }
    }
</script>

</html>