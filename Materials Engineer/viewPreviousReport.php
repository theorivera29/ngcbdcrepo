<?php
    session_start();
    $_SESSION['acc_type'] = "Materials Engineer";
    include "../session.php";
    if (isset($_SESSION['lastmatinfo_month'])) {
        $projects_id = $_SESSION['projects_id'];
        $lastmatinfo_month = $_SESSION['lastmatinfo_month'];
        $lastmatinfo_year = $_SESSION['lastmatinfo_year'];
    } else {
        header("Location:http://inventory-system-ngbdc.000webhostapp.com/Materials%20Engineer/currentReport.php");  
    }
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
            <a href="#" class="open" onclick="window.location.href='previousReportsPage.php'">
                <i class="fas fa-arrow-circle-left"></i>
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
    </div>
    <button class="btn btn-warning" id="generate-report" type="button" onclick="window.location.href = 'prevGenerateReport.php'">Generate Report</button>
    <table class="table reportpage-table table-striped table-bordered">
        <thead>
            <tr>
                <th class="align-middle">Particulars</th>
                <th class="align-middle">Previous Material Stock</th>
                <th class="align-middle">Unit</th>
                <th class="align-middle">Delivered Material as of <?php echo date("F", mktime(0, 0, 0, $lastmatinfo_month, 10))." ".$lastmatinfo_year ;?></th>
                <th class="align-middle">Material Pulled Out as of <?php echo date("F", mktime(0, 0, 0, $lastmatinfo_month, 10))." ".$lastmatinfo_year ;?></th>
                <th class="align-middle">Unit</th>
                <th class="align-middle">Accumulated Materials Delivered</th>
                <th class="align-middle">Material on Site as of <?php echo date("F", mktime(0, 0, 0, $lastmatinfo_month, 10))." ".$lastmatinfo_year ;?></th>
                <th class="align-middle">Unit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_categ = "SELECT DISTINCT
                            categories_name
                        FROM
                            lastmatinfo
                        INNER JOIN
                            categories ON categories.categories_id = lastmatinfo.lastmatinfo_categ
                        WHERE
                            lastmatinfo.lastmatinfo_project = $projects_id
                            AND
                                lastmatinfo.lastmatinfo_year = $lastmatinfo_year
                            AND
                                lastmatinfo.lastmatinfo_month = $lastmatinfo_month;";
            $result = mysqli_query($conn, $sql_categ);
            $categories = array();
            while($row_categ = mysqli_fetch_assoc($result)){
                $categories[] = $row_categ;
            }
            foreach($categories as $data) {
                $categ = $data['categories_name'];
            ?>
            <tr>
                <td><b> <?php echo $categ ;?> </b> </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php
                $sql = "SELECT
                            materials.mat_name,
                            lastmatinfo.lastmatinfo_prevStock,
                            unit.unit_name,
                            lastmatinfo.lastmatinfo_deliveredMat,
                            lastmatinfo.lastmatinfo_matPulledOut,
                            lastmatinfo.lastmatinfo_accumulatedMat,
                            lastmatinfo.lastmatinfo_matOnSite
                        FROM
                            lastmatinfo
                        INNER JOIN
                            materials ON lastmatinfo.lastmatinfo_matname = materials.mat_id
                        INNER JOIN
                            categories ON lastmatinfo.lastmatinfo_categ = categories.categories_id
                        INNER JOIN
                            unit ON lastmatinfo.lastmatinfo_unit = unit.unit_id
                        WHERE 
                            lastmatinfo.lastmatinfo_project = $projects_id 
                            AND
                                lastmatinfo.lastmatinfo_year = $lastmatinfo_year
                            AND
                                lastmatinfo.lastmatinfo_month = $lastmatinfo_month
                            AND
                                categories.categories_name = '$categ' 
                        ORDER BY 1;";

                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_row($result)) {
            ?>
            <tr>
                <td><?php echo $row[0];?></td>
                <td><?php echo $row[1];?></td>
                <td><?php echo $row[2];?></td>
                <td><?php echo $row[3];?></td>
                <td><?php echo $row[4];?></td>
                <td><?php echo $row[2];?></td>
                <td><?php echo $row[5];?></td>
                <td><?php echo $row[6];?></td>
                <td><?php echo $row[2];?></td>
            </tr>

            <?php
                }
            }
            ?>
        </tbody>
    </table>
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

    });
</script>

</html>