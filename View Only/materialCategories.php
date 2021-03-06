<?php
    session_start();
    $_SESSION['acc_type'] = "View Only";
    include "../session.php";
    if (isset($_SESSION['categories_id'])) {
        $projects_id = $_SESSION['projects_id'];
        $categories_id = $_SESSION['categories_id'];
        unset($_SESSION['mat_id']);
    } else {
        header("Location:http://inventory-system-ngbdc.000webhostapp.com/View%Only/viewInventory.php");  
    }
    
    $sql_name = "SELECT categories_name FROM categories WHERE categories_id = $categories_id";
    $result_name = mysqli_query($conn, $sql_name);
    $row_name = mysqli_fetch_row($result_name);
    $categ_name = $row_name[0];
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
            <a href="#" class="open" onclick="window.location.href='viewInventory.php'">
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
    
    <h4 class="category-title"><?php echo strtoupper($categ_name) ;?></h4>
    <div class="list-of-accounts-container">
        <table class="table list-of-accounts-table table-striped table-bordered display" id="mydatatable">
            <thead>
                <tr>
                    <th scope="col">Particulars</th>
                    <th scope="col">Previous Material Stock</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Delivered Material as of Month</th>
                    <th scope="col">Material Pulled out as of Month</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Accumulated Materials Delivered</th>
                    <th scope="col">Materials on site as of Month</th>
                    <th scope="col">Unit</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT 
                        materials.mat_id,
                        materials.mat_name,
                        categories.categories_name,
                        matinfo.matinfo_prevStock,
                        unit.unit_name,
                        matinfo.currentQuantity,
                        matinfo.matinfo_id
                    FROM
                        materials
                    INNER JOIN 
                        categories ON materials.mat_categ = categories.categories_id
                    INNER JOIN 
                        unit ON materials.mat_unit = unit.unit_id
                    INNER JOIN
                        matinfo ON materials.mat_id = matinfo.matinfo_matname
                    WHERE 
                        categories.categories_id = '$categories_id' 
                    AND 
                    matinfo.matinfo_project = '$projects_id'
                    ORDER BY 1;";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_row($result)){
                    $matinfo_id = $row[6];
                    $sql1 = "SELECT 
                                SUM(deliveredmat.deliveredmat_qty) 
                            FROM 
                                deliveredmat
                            WHERE 
                                deliveredmat.deliveredmat_materials = '$row[0]';";
                    $result1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_row($result1);
                    $sql_mat = "SELECT
                                    unit.unit_name,
                                    materials.mat_id
                                FROM
                                    materials
                                INNER JOIN
                                    unit ON unit.unit_id = materials.mat_unit
                                INNER JOIN
                                    matinfo ON matinfo.matinfo_matname = materials.mat_id
                                WHERE
                                    matinfo.matinfo_id = $matinfo_id;";
                    $result_mat = mysqli_query($conn, $sql_mat);
                    $mat_count_use = 0;
                    while ($row_mat = mysqli_fetch_row($result_mat)) {
                        $sql_use = "SELECT
                                        requisition.requisition_date,
                                        reqmaterial.reqmaterial_qty,
                                        requisition.requisition_reqBy,
                                        reqmaterial.reqmaterial_areaOfUsage,
                                        requisition.requisition_remarks
                                    FROM
                                        requisition
                                    INNER JOIN
                                        reqmaterial ON reqmaterial.reqmaterial_requisition = requisition.requisition_id
                                    WHERE
                                        reqmaterial.reqmaterial_material = $row_mat[1];";
                        $result_use = mysqli_query($conn, $sql_use);
                        while ($row_use = mysqli_fetch_row($result_use)) {
                            $mat_count_use = $mat_count_use + $row_use[1];
                        }
                        $sql_use = "SELECT
                                        hauling.hauling_date,
                                        haulingmat.haulingmat_qty,
                                        hauling.hauling_requestedBy,
                                        hauling.hauling_deliverTo,
                                        hauling.hauling_status
                                    FROM
                                        hauling
                                    INNER JOIN
                                        haulingmat ON hauling.hauling_id = haulingmat.haulingmat_haulingid
                                    WHERE
                                        haulingmat.haulingmat_matname = $row_mat[1];";
                        $result_use = mysqli_query($conn, $sql_use);
                        while ($row_use = mysqli_fetch_row($result_use)) {
                            $mat_count_use = $mat_count_use + $row_use[1];
                        }
                    }
                ?>
                    <tr>
                        <td><?php echo $row[1] ;?></td>
                        <td><?php echo $row[3] ;?></td>
                        <td><?php echo $row[4] ;?></td>
                        <td><?php echo $row1[0] ;?></td>
                        <td><?php echo $mat_count_use ;?></td>
                        <td><?php echo $row[4] ;?></td>
                        <td><?php echo $row1[0] ;?></td>
                        <td><?php echo $row[5] ;?></td>
                        <td><?php echo $row[4] ;?></td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#mydatatable').DataTable();
    });
</script>

</html>