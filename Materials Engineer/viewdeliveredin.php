<?php
    session_start();
    $_SESSION['acc_type'] = "Materials Engineer";
    include "../session.php";
    
    if (isset($_SESSION['delivered_id']) && isset($_SESSION['receipt_no'])) {
        $delivered_id = $_SESSION['delivered_id'];
        $receipt_no = $_SESSION['receipt_no'];
    } else {
        header("Location:http://inventory-system-ngbdc.000webhostapp.com/Materials%20Engineer/viewTransactions.php");  
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
            <a href="#" class="open" onclick="window.location.href='viewTransactions.php'">
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
                        <a class="dropdown-item" href="account.php">Account Settings</a>
                        <a class="dropdown-item" href="../logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </span>
    </div>

    <div class="mx-auto mt-5 col-md-10">
        <div class="card">
            <div class="card-header">
                <h4>Delivered Materials</h4>
            </div>

            <?php
            $sql = "SELECT 
            deliveredin.deliveredin_date,
            deliveredin.deliveredin_receiptno, 
            deliveredin.deliveredin_remarks, 
            projects.projects_name, 
            projects.projects_address
            FROM deliveredin 
            INNER JOIN projects 
            ON deliveredin.deliveredin_project = projects.projects_id 
            WHERE deliveredin.deliveredin_receiptno = '$receipt_no';";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_row($result)){
            ?>
            <div class="card-body">
                <form class="form" action="../server.php" method="POST">
                    <div class="form-group row date-container">
                        <div class="col-lg-12">
                            <label class="col-lg-12 col-form-label">Date:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="date" value="<?php echo $row[0]?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row formnum-container">
                        <div class="col-lg-12">
                            <label class="col-lg-12 col-form-label">Receipt No.:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" value="<?php echo $row[1]?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row formnum-container">
                        <div class="col-lg-12">
                            <label class="col-lg-12 col-form-label">Remarks</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" value="<?php echo $row[2]?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row col-lg-12">
                        <label class="col-lg-2 col-form-label">Project:</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" value="<?php echo $row[3]?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row col-lg-12">
                        <label class="col-lg-2 col-form-label">Location:</label>
                        <div class="col-lg-9">
                            <input class="form-control" type="text" value="<?php echo $row[4]?>" readonly>
                        </div>
                    </div>
                    <div class="card">
                        <table class="table deliveredin-form-table">
                            <thead>
                                <tr>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Articles</th>
                                    <th scope="col">Unit</th>
                                    <th scope="col">Supplied By</th>
                                </tr>
                            </thead>
                            <tbody id="deliveredTable">
                            </tbody>
                            <?php
                        $sql1 = "SELECT 
                        deliveredmat.deliveredmat_qty, 
                        materials.mat_name, unit.unit_name, 
                        deliveredmat.suppliedBy 
                        FROM deliveredmat 
                        INNER JOIN materials
                        ON deliveredmat.deliveredmat_materials = materials.mat_id 
                        INNER JOIN unit 
                        ON materials.mat_unit = unit.unit_id 
                        WHERE deliveredmat.deliveredmat_deliveredin = '$delivered_id';";
                        $result1 = mysqli_query($conn, $sql1);
                        while($row1 = mysqli_fetch_row($result1)){
                        ?>
                            <tfoot>
                                <tr id="deliveredRow">
                                    <td><input class="form-control" value="<?php echo $row1[0]?>" type="text" id="quantity" readonly>
                                    </td>
                                    <td>
                                        <input class="form-control" value="<?php echo $row1[1]?>" type="text" id="unit" readonly>
                                    </td>
                                    <td>
                                        <input class="form-control" value="<?php echo $row1[2]?>" type="text" id="unit" readonly>
                                    </td>
                                    <td>
                                        <input class="form-control" value="<?php echo $row1[3]?>" type="text" id="suppliedBy" readonly>
                                    </td>
                                </tr>
                            </tfoot>
                            <?php
                            }
                        ?>
                        </table>
                    </div>
                    
                </form>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
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
</script>

</html>