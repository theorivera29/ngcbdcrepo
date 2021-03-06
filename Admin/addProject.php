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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
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
    <a href="#" class="open" onclick="window.location.href='projects.php'">
        <i class="fas fa-arrow-circle-left arrow-left"></i>
    </a>
    <div class="add-project-container">
        <form action="../server.php" method="POST" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="projectName" class="label-styles">PROJECT NAME:</label>
                <input name="projectName" id="projectName" type="text" class="form-control" autocomplete="off"
                    placeholder="Enter project name" title="Input letters"
                    pattern="^[A-Za-z-0-9][A-Za-z0-9\s.,-]*$" required>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="address" class="label-styles">ADDRESS:</label>
                <input name="address" id="address" type="text" class="form-control" placeholder="Enter project address" autocomplete="off"
                    title="Input letters and numbers only" pattern="^[#A-Za-z0-9]+[A-Za-z0-9\s.,_&()<>';:-]*$" required>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label for="startDate" class="label-styles">START DATE:</label>
                    <input name="startDate" id="startDate" type="date" class="form-control start-date"
                        onkeydown="return false" onchange="startDateEnable()" required>
                    <div class="invalid-feedback">Please choose a start date.</div>
                </div>
                <div class="col-lg-6">
                    <label for="endDate" class="label-styles">END DATE:</label>
                    <input name="endDate" id="endDate" type="date" class="form-control end-date"
                        min="$('#startDate').val()" onkeydown="return false" disabled required>
                    <div class="invalid-feedback">Please choose an end date.</div>
                </div>
            </div>
            <label class="label-styles">Materials Engineer Involved</label>
            <?php
                    $sqlmateng = "SELECT 
                    CONCAT(accounts_fname,' ', accounts_lname), accounts_id, accounts_username FROM accounts WHERE accounts_type = 'Materials Engineer' AND accounts_deletable = 'yes' AND accounts_status = 'active';";
                    $resultmateng = mysqli_query($conn, $sqlmateng);
                    while($rowmateng = mysqli_fetch_row($resultmateng)){
                ?>

             <div class="custom-control custom-checkbox mb-3 options">
                
                <input type="checkbox" class="custom-control-input" name="mateng[]" id="selectMatEng-<?php echo $rowmateng[1]?>" value="<?php echo $rowmateng[1]?>">
                <label class="custom-control-label" for="selectMatEng-<?php echo $rowmateng[1]?>"><?php echo $rowmateng[0]?> (<?php echo $rowmateng[2]?>)</label>            
            </div> 
            <div class="invalid-feedback">Please select atleast one Materials Engineer.</div>

           
            <?php
                }
            ?>
            <div class="add-project-btn">
                <button type="submit" class="btn btn-success add-proj">Save</button>
                <input type="reset" class="btn btn-danger" value="Clear">
            </div>

            <!-- Start of confirmation modal -->
            <div class="modal fade" id="create-proj-modal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to create this project?
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                &times;
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="create_project" class="btn btn-success">Yes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End of confirmation modal -->
        </form>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });

    function openSlideMenu() {
        document.getElementById('menu').style.width = '15%';
    }

    function closeSlideMenu() {
        document.getElementById('menu').style.width = '0';
        document.getElementById('content').style.marginLeft = '0';
    }

    function startDateEnable() {
        if (document.getElementById("startDate").value === "") {
            document.getElementById('endDate').disabled = true;
        } else {
            document.getElementById('endDate').disabled = false;
        }
        var date = $("#startDate").val();
        var dtToday = new Date(date);

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var start = year + '-' + month + '-' + day;
        $('#endDate').attr('min', start);
    }

    $(function () {
        var requiredCheckboxes = $('.options :checkbox[required]');
        requiredCheckboxes.change(function () {
            if (requiredCheckboxes.is(':checked')) {
                requiredCheckboxes.removeAttr('required');
            } else {
                requiredCheckboxes.attr('required', 'required');
            }
        });
    });

    $(document).ready(function () {
        $(".add-proj").click(function (e) {
            var projname = $("#projectName").val();
            var address = $("#address").val();
            var sdate = $("#startDate").val();
            var edate = $("#endDate").val();
            if ((projname != '') && (address != '') && (sdate != '') && (edate != '')) {
                e.preventDefault();
                $("#create-proj-modal").modal('show');
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