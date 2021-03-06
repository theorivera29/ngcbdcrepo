<?php
    session_start();
    $_SESSION['acc_type'] = "Materials Engineer";
    include "../session.php";
    if (isset($_SESSION['projects_id'])) {
        $proj_id = $_SESSION['projects_id'];
    } else {
        header("Location:http://inventory-system-ngbdc.000webhostapp.com/Materials%20Engineer/projects.php");  
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

<html>

<body>
    <div id="content">
        <span class="slide">
            <a href="#" class="open" onclick="window.location.href='projects.php'">
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

    <div class="adding-materials-container">
        <?php 
        $sql = "SELECT projects_name FROM projects WHERE projects_id = '$proj_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($result);
        ?>
        <h4 class="project-title">
            <?php echo $row[0]?>
        </h4>
        <h5 class=" card-header">List of All Materials Added</h5>
        <form action="../server.php" method="POST">
        <table class="table adding-materials-table table-striped table-bordered display" id="mydatatable">
        
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Material Name</th>
                    <th>Threshold</th>
                    <th>Unit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT 
                            categories.categories_name, 
                            materials.mat_name, 
                            unit.unit_name, 
                            matinfo.matinfo_matname,
                            matinfo.matinfo_id
                        FROM materials
                        INNER JOIN categories 
                        ON materials.mat_categ = categories.categories_id 
                        INNER JOIN unit 
                        ON materials.mat_unit = unit.unit_id
                        INNER JOIN matinfo 
                        ON matinfo.matinfo_matname = materials.mat_id
                        WHERE matinfo.matinfo_project = $proj_id;";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_row($result)) {
                ?>
                <tr>
                        <td>
                            <?php echo $row[0]; ?>
                        </td>
                        <td>
                            <?php echo $row[1]; ?>
                        </td>
                        <?php
                    $matname = $row[3];
                    $sql1 = "SELECT matinfo_notif FROM matinfo WHERE matinfo_matname = $matname AND matinfo_project = $proj_id;";
                    $result1 = mysqli_query($conn, $sql1);
                    $row1 = mysqli_fetch_row($result1);
                    $sql2 = "SELECT matinfo_id FROM matinfo WHERE matinfo_matname = $matname AND matinfo_project = $proj_id;";
                    $result2 = mysqli_query($conn, $sql2);
                    $row2 = mysqli_fetch_row($result2);
                ?>
                        <td>
                            <input type="hidden" name="matinfo_id[]" value="<?php echo $row2[0];?>">
                            <input type="number" class="form-control" name="threshold[]"
                                placeholder="Enter threshold" value="<?php echo $row1[0]?>">
                        </td>
                        <td>
                            <?php echo $row[2]; ?>
                        </td>
                </tr>
                <?php
                }   
             ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">

                        <div class="row form-group save-btn-container">
                            <div class="col-lg-12">
                                <button type="submit" name="edit_threshold" class="btn btn-success">Save</button>
                                <input type="reset" class="btn btn-danger" value="Cancel">
                            </div>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
        </form>
        <h5 class=" card-header list-of-material">List of All Materials</h5>
        <form action="../server.php" method="POST">
            <table class="table adding-materials-table table-striped table-bordered display" id="example">
                <thead>
                    <tr>

                        <th><input type="checkbox" id="checkall" label="check all" /> Select All</th>
                        <th>Category</th>
                        <th>Material Name</th>
                        <th>Unit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            $sql = "SELECT 
                categories.categories_name, 
                materials.mat_name, 
                unit.unit_name, 
                materials.mat_id 
                FROM materials 
                INNER JOIN categories 
                ON materials.mat_categ = categories.categories_id 
                INNER JOIN unit ON materials.mat_unit = unit.unit_id
                WHERE mat_id NOT IN (SELECT matinfo_matname FROM matinfo WHERE matinfo_project = $proj_id);";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_row($result)) {
            ?>
                    <tr>
                        <td>
                            <div class="checkbox">
                                <label><input type="checkbox" name="matName[]" class="checkbox1" value="<?php echo $row[3]?>"></label>
                            </div>
                        </td>
                        <td>
                            <?php echo $row[0]?>
                        </td>
                        <td><input type="hidden" class="form-control" value="<?php echo $row[3]?>" readonly>
                            <?php echo $row[1]; ?>
                        </td>
                        <td>
                            <?php echo $row[2]?>
                        </td>
                    </tr>
                    <?php
                }   
             ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">

                            <div class="row form-group save-btn-container">
                                <div class="col-lg-12">
                                    <input type="hidden" name="proj_id" value="<?php echo $proj_id?>">
                                    <input type="submit" name="adding_materials" class="btn btn-success"
                                        value="Save">
                                    <input type="reset" class="btn btn-danger" value="Cancel">
                                </div>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>

        </form>

    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="card ">
            <h5 class="card-header">Category Name</h5>
            <div class="card-body">
                <button type="button" class="btn btn-info" id="open-category-btn" type="button"
                    onclick="window.location.href='materialCategories.php'">View</button>
            </div>
        </div>
    </div>

    <!-- Start of confirmation modal -->
    <div class="modal fade" id="save-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to save changes?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        &times;
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

                </div>
            </div>
        </div>
    </div>

    <!-- End of confirmation modal -->
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#mydatatable').DataTable();
        $('table.display').DataTable();
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
    // $(function() {
    // $('.chk_boxes').click(function() {
    //     $('.chk_boxes1').prop('checked', this.checked);
    // });
    // });
    var table = $('#example').DataTable();
    $('#checkall').click(function(event) {  //on click 
    var checked = this.checked;
    table.column(0).nodes().to$().each(function(index) {    
        if (checked) {
            $(this).find('.checkbox1').prop("checked", true);
        } else {
             $(this).find('.checkbox1').prop("checked", false);            
        }
    });    
    table.draw();
 });
</script>

</html>