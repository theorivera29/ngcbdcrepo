<?php
    session_start();
    $_SESSION['acc_type'] = "Materials Engineer";
    include "../session.php";
     $accounts_id =$_SESSION['account_id'];
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
     <script src="../js/jquery/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
                    <button type="button" class="btn dropdown-toggle dropdown-settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a href="dashboard.php" id="sideNav-a">Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="#siteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="sideNav-a">Site</a>
                        <ul class="collapse list-unstyled" id="siteSubmenu">
                            <li>
                                <a href="projects.php" id="sideNav-a">Projects</a>
                            </li>
                            <li>
                                <a href="sitematerials.php" id="sideNav-a">Site Materials</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#haulingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="sideNav-a">Hauling</a>
                        <ul class="collapse list-unstyled" id="haulingSubmenu">
                            <li>
                                <a href="fillouthauling.php" id="sideNav-a">Fill out Hauling Receipt</a>
                            </li>
                            <li>
                                <a href="hauleditems.php" id="sideNav-a">View Hauled Materials</a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#transactionSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="sideNav-a">Transactions</a>
                        <ul class="collapse list-unstyled" id="transactionSubmenu">
                            <li>
                                <a href="requisitionslip.php" id="sideNav-a">Material Requisition Slip</a>
                            </li>
                            <li>
                                <a href="deliveredin.php" id="sideNav-a">Delivered In Form</a>
                            </li>
                            <li>
                                <a href="viewTransactions.php" id="sideNav-a">View Transactions</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="returns.php" id="sideNav-a">Returns</a>
                    </li>
                    <li>
                        <a href="addingOfNewMaterials.php" id="sideNav-a">Adding of Materials</a>
                    </li>
                    <li class="active">
                        <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" id="sideNav-a">Reports</a>
                        <ul class="collapse list-unstyled" id="reportSubmenu">
                            <li>
                                <a href="currentReport.php" id="sideNav-a">Monthly Report</a>
                            </li>
                            <li>
                                <a href="previousReports.php" id="sideNav-a">Previous Reports</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </div>

    </div>

    <div class="mx-auto mt-5 col-md-10">
        <div class="card">
            <div class="card-header">
                <h4>Material Requisition Slip</h4>
            </div>
            <div class="card-body">
                <form action="../server.php" method="POST" class="needs-validation" novalidate>
                    <div class="form-group row date-container">
                        <div class="col-lg-12">
                            <label class="col-lg-12 col-form-label">Date:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="date" name="date" required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row formnum-container">
                        <div class="col-lg-12">
                            <label class="col-lg-12 col-form-label">Material Requisition No.:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="reqNo" required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row col-lg-12">
                        <label class="col-lg-2 col-form-label">Project:</label>
                        <div class="col-lg-9">
                            <select class="form-control" id="projects" name="projectName" required>
                                <option value="" selected disabled>Choose a project</option>
                                <?php
                                                $sql = "SELECT 
                                                    projects_name, projects_id 
                                                FROM projmateng 
                                                INNER JOIN projects 
                                                ON projmateng_project = projects.projects_id 
                                                INNER JOIN accounts 
                                                ON  projmateng_mateng = accounts.accounts_id 
                                                WHERE accounts.accounts_id 
                                                IN (SELECT projmateng_mateng FROM projmateng WHERE projmateng_mateng = $accounts_id);";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_row($result)) {
                                            ?>

                                <option value="<?php echo $row[1]; ?>">
                                    <?php echo $row[0]; ?>
                                </option>
                                <?php
                                        }
                                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row col-lg-12">
                        <label class="col-lg-2 col-form-label">Location:</label>
                        <div class="col-lg-9">
                            <input id="location" class="form-control" type="text" name="location" required readonly>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-group row col-lg-12">

                        <label class="col-lg-2 col-form-label">Remarks:</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" name="remarks" required>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="card">
                        <table class="table requisition-form-table" id="table1">
                            <thead>
                                <tr>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Particulars</th>
                                    <th scope="col">Units</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="requisitionTable">
                            <tr>
                                    <td colspan="5">
                                        <button type="button" class="btn btn-success add-row-btn"><i class="fas fa-plus"
                                                id="plus-icon"></i> Add Row</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group row col-lg-12">
                        <div class="form-group col-lg-6">
                            <label class="col-lg-12 col-form-label">Requested by:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="requestedBy" required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="col-lg-12 col-form-label">Approved by:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="approvedBy" required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group save-btn-container">
                        <div class="col-lg-12">
                            <input type="button" class="btn btn-primary" data-toggle="modal" data-target="#save-modal" value="Save Changes">
                            <input type="reset" class="btn btn-danger" value="Cancel">
                        </div>
                    </div>
                    <!-- Start of confirmation modal -->
                    <div class="modal fade" id="save-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to save
                                        changes?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        &times;
                                    </button>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="create_requisitionSlip" class="btn btn-success">Yes</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of confirmation modal -->
                </form>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript">
    var i = 1;
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });

        $('#particulars').on('change', function() {
            console.log($(this).children('option:selected').val())
            $.get('http://localhost/ngcbdcrepo/Materials%20Engineer/../server.php?mat_name=' + $(this).children(
                'option:selected').val(), function(data) {
                var d = JSON.parse(data);
                console.log(d);
                $('#units').val(d[0][1])
                $('#unit').val(d[0][0])
            })
        })

        $('#projects').on('change', function() {
            $.get('http://localhost/ngcbdcrepo/Materials%20Engineer/../server.php?project_id=' + $(this).children(
                'option:selected').val(), function(data) {
                var d = JSON.parse(data)
                var print_options = '';
                print_options = print_options + `<option disabled selected>Choose your option</option>`
                d.forEach(function(da) {
                    print_options = print_options + `<option value="${da[0]}">${da[1]}</option>`
                })
                $('#particulars').html(print_options)
            })
        })

        $('#projects').on('change', function() {
            console.log($(this).children('option:selected').val())
            $.get('http://localhost/ngcbdcrepo/Materials%20Engineer/../server.php?projects_id=' + $(this).children(
                'option:selected').val(), function(data) {
                var d = JSON.parse(data);
                console.log(d);
                $('#location').val(d)
            })
        })
	
	$('#particulars').on('change', function() {
            var projects_id = $("#projects").val();
            $.get('http://localhost/ngcbdcrepo/Materials%20Engineer/../server.php?matinfo_id=' + $(this).children(
                'option:selected').val() + '&matinfo_project=' + projects_id, function(data) {
                var d = JSON.parse(data)
                var print_options = '';
                $('#quantity').attr({
                    "max": d[0][0],
                    "min": 0
                });
            })
        });

        $(document).on('click', '.add-row-btn', function () {
            var html = '';
            html += '<tr>';
            html +=
                '<td><input class="form-control" name="quantity[]" min="0" type="number" id="quantity" placeholder="Quantity" required><div class="invalid-feedback">Invalid quantity.</div></td>';
            html +=
                '<td><div class="form-group"><select class="form-control" name="particulars[]" id="particulars" required></select><div class="invalid-feedback">Please select one particular.</div></div></td>';
            html +=
                '<td><input type="text" class="form-control" type="text" id="units" disabled><input type="hidden" class="form-control" name="unit[]" id="unit"></td>'
            html +=
                '<td><input class="form-control" name="location[]" type="text" id="location1" placeholder="Location" required><div class="invalid-feedback">Please fill out this field.</div></td>';
            html +=
                '<td><input type="button" class="btn btn-sm btn-outline-secondary delete-row" value="Delete"/></td>'
            html += '</tr>';
            $('#table1 tbody').append(html);
        });

        $("#requisitionTable").on('click', '.delete-row', function() {
            $(this).closest('tr').remove();
        });
    });





    function openSlideMenu() {
        document.getElementById('menu').style.width = '15%';
    }

    function closeSlideMenu() {
        document.getElementById('menu').style.width = '0';
        document.getElementById('content').style.marginLeft = '0';
    }

    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
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
