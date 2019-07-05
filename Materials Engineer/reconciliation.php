<?php
    session_start();
    $_SESSION['acc_type'] = "Materials Engineer";
    include "../session.php";
    if (isset($_SESSION['projects_id'])) {
        $projects_id = $_SESSION['projects_id'];
    } else {
        header("Location:http://inventory-system-ngbdc.000webhostapp.com/Materials%20Engineer/projects.php");  
    }
    $sql_name = "SELECT 
                    projects_name
                FROM
                    projects
                WHERE
                    projects_id = $projects_id;";
    $result_name = mysqli_query($conn, $sql_name);
    $row_name = mysqli_fetch_row($result_name);
    $projects_name = $row_name[0];
?>

<!DOCTYPE html>

<html>

<head>
    <title>NGCBDC</title>
    <link rel="icon" type="image/png" href="../Images/login2.png">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="../js/jquery/jquery-3.4.1.min.js"></script>
    <script src="../js/popper/popper.min.js"></script>
    <script src="../bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>    
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
                        <?php
                        if ($accounts_id >= 4) {
                    ?>
                        <a class="dropdown-item" href="account.php">Account Settings</a>
                        <?php 
                        }
                    ?>
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
                        <a href="#siteSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                            id="sideNav-a">Site</a>
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
                        <a href="#haulingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                            id="sideNav-a">Hauling</a>
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
                        <a href="#transactionSubmenu" data-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle" id="sideNav-a">Transactions</a>
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
                        <a href="addingOfNewMaterials.php" id="sideNav-a">Adding of Materials</a>
                    </li>
                    <li class="active">
                        <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                            id="sideNav-a">Reports</a>
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
    <a href="#" class="open" onclick="window.location.href='projects.php'">
        <i class="fas fa-arrow-circle-left arrow-left"></i>
    </a>
    
    <form action="../server.php" method="POST">
    <div class="card low-in-quantity-container">
        <h5 class="card-header">Reconcilliation of <?php echo $projects_name ;?></h5>
        <div class="recon-btn">
        <?php
            $projects_id = $_SESSION['projects_id'];
            $sql_ctr = "SELECT
                            COUNT(matinfo_matname)
                        FROM
                            matinfo
                        WHERE
                            matinfo_project = $projects_id;";
            $result_ctr = mysqli_query($conn, $sql_ctr);
            $row_ctr = mysqli_fetch_row($result_ctr);
            $mat_ctr = $row_ctr[0];

            $sql = "SELECT
                        matinfo.matinfo_id
                    FROM
                        materials
                    INNER JOIN
                        matinfo ON materials.mat_id = matinfo.matinfo_matname
                    WHERE
                        matinfo_project = $projects_id;";
            $result = mysqli_query($conn, $sql);
            $ctr_phys = 0;
            while ($row = mysqli_fetch_row($result)) {
                $sql_phys = "SELECT 
                                COUNT(reconciliation_matinfo)
                            FROM
                                reconciliation
                            WHERE
                                reconciliation_matinfo = $row[0];";
                $result_phys = mysqli_query($conn, $sql_phys);
                while ($row_phys = mysqli_fetch_row($result_phys)) {
                    if ($row_phys[0] == 1) {
                        $ctr_phys++;
                    } 
                }
            }
            
            if ($ctr_phys == $mat_ctr) {
            ?>
            <button class="btn btn-warning" id="generate-recon-btn" data-target="#" type="submit" name="reconciliation_reconcile">Reconcile</button>
            <?php
                }
            ?>
            <button class="btn btn-danger" id="cancel-recon-btn" data-target="#" type="button">Cancel</button>
            <button class="btn btn-success" id="save-recon-btn" data-target="#" type="submit" name="reconciliation_save">Save</button>
            <button class="btn btn-info" id="edit-recon-btn" data-target="#" type="submit" name="reconciliation_edit">Edit</button>
        </div>
        <table class="table reconcilliation-table table-striped table-bordered" id="mydatatable">
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Material Name</th>
                    <th scope="col">System Count</th>
                    <th scope="col">Physical Count</th>
                    <th scope="col">Difference</th>
                    <th scope="col">Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $sql = "SELECT
                                materials.mat_name,
                                matinfo.currentQuantity,
                                materials.mat_id,
                                matinfo.matinfo_id
                            FROM
                                materials
                            INNER JOIN
                                matinfo ON materials.mat_id = matinfo.matinfo_matname
                            WHERE
                                matinfo_project = $projects_id;";
                    $result = mysqli_query($conn, $sql);
                    $ctr = 1;
                    while ($row = mysqli_fetch_row($result)) {
                        ?>
                            <tr>
                                <?php
                                    $sql_recon = "SELECT * FROM reconciliation WHERE reconciliation_matinfo = $row[3];";
                                    $result_recon = mysqli_query($conn, $sql_recon);
                                    $row_recon = mysqli_fetch_row($result_recon);
                                ?>
                                <td><?php echo $ctr ;?></td>
                                <td><?php echo $row[0] ;?></td>
                                <td>
                                    <?php echo $row[1] ;?>
                                    <form name="systemCount<?php echo $row[2] ;?>" method="POST">
                                        <input type="hidden" name="systemCount" id="systemCount<?php echo $row[2] ;?>" class="form-control" disable value="<?php echo $row[1] ;?>">
                                    </form>
                                </td>
                                <td>
                                    <?php
                                        if (!isset($_SESSION['edit_clicked']) && $row_recon[1] != null) {
                                            echo $row_recon[1];
                                        }
                                        if (isset($_SESSION['edit_clicked'])) {
                                            if ($row_recon[1] != null) {
                                                ?>
                                                <form name="difference_column<?php echo $row[2] ;?>" method="POST">
                                                    <input type="number" class="form-control" autocomplete="off" pattern="[0-9]*" min="0" id="nameValidation<?php echo $row[2] ;?>"  onchange="difference<?php echo $row[2] ;?>()" value="<?php echo $row_recon[1] ;?>">
                                                </form>
                                                <?php
                                            } else {
                                                ?>
                                                <form name="difference_column<?php echo $row[2] ;?>" method="POST">
                                                    <input type="number" class="form-control" autocomplete="off" pattern="[0-9]*" min="0" id="nameValidation<?php echo $row[2] ;?>"  onchange="difference<?php echo $row[2] ;?>()">
                                                </form>
                                                <?php
                                            }
                                        }
                                    ?>
                                </td>
                                <td id="difference_cell<?php echo $row[2] ;?>">
                                    <?php
                                        if ($row_recon[2] != null) {
                                            $diff = $row[1] - $row_recon[1];
                                            echo $diff;
                                            ?>
                                            <input type="hidden" name="difference[]" value="<?php echo $diff ;?>">
                                            <input type="hidden" name="matinfo_id[]" value="<?php echo $row[3] ;?>">
                                            <input type="hidden" name="system_Count[]" value="<?php echo $row[1] ;?>">
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td id="remarks_cell<?php echo $row[2] ;?>">
                                    <?php 
                                        if ($row_recon[3] != null) {
                                            echo $row_recon[3];
                                        }
                                    ?>
                                </td>
                            </tr>
                            <script type="text/javascript">
                                function difference<?php echo $row[2] ;?>() {
                                    var NameValue = document.forms["difference_column<?php echo $row[2] ;?>"]["nameValidation<?php echo $row[2] ;?>"].value;
                                    var SystemCount = $("#systemCount<?php echo $row[2] ;?>").val();
                                    var diff = parseInt(SystemCount) - parseInt(NameValue);
                                    $("#difference_cell<?php echo $row[2] ;?>").html(diff + 
                                    '<input type="hidden" name="difference[]" value="'+diff+'">' +
                                    '<input type="hidden" name="matinfo_id[]" value="<?php echo $row[3] ;?>">' +
                                    '<input type="hidden" name="system_Count[]" value="<?php echo $row[1] ;?>">');
                                    if (diff != 0) {
                                        $("#remarks_cell<?php echo $row[2] ;?>").html('<input type="text" name="remarks[]" class="form-control" required>');
                                    } else {
                                        $("#remarks_cell<?php echo $row[2] ;?>").html('');
                                    }
                                }
                            </script>
                        <?php
                        $ctr++;
                    }
                    unset($_SESSION['edit_clicked']);
                ?>
                
                <?php

                ?>
            </tbody>
        </table>
    </div>
    </form>
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
        $('#mydatatable').DataTable();

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

        //Display Only Date till today // 
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var today = year + '-' + month + '-' + day;
        $('#dateID').attr('min', today);

        var maxLength = 45;
        $('textarea').keyup(function () {
            var length = $(this).val().length;
            var length = maxLength - length;
            $('#characters').text(length);
        });

        $('#task-textarea').keypress(function (event) {
            if (event.which == 13) {
                event.preventDefault();
            }
        });

        $('#task-textarea').keyup(function () {
            var txt = $('#comment').val();
            $('#comment').val(txt.replace(/[\n\r]+/g, " "));

        });
    });
</script>

</html>