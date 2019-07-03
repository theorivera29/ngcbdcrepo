<?php
    session_start();
    $_SESSION['acc_type'] = "Materials Engineer";
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

    <section id="tabs">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 project-tabs">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-category-tab" data-toggle="tab"
                                href="#nav-category" role="tab" aria-controls="nav-category" aria-selected="true">ADD
                                NEW CATEGORY</a>
                            <a class="nav-item nav-link" id="nav-unit-tab" data-toggle="tab" href="#nav-unit" role="tab"
                                aria-controls="nav-unit" aria-selected="false">ADD NEW UNIT</a>
                            <a class="nav-item nav-link" id="nav-brand-tab" data-toggle="tab" href="#nav-brand"
                                role="tab" aria-controls="nav-brand" aria-selected="false">ADD MATERIAL BRAND</a>
                            <a class="nav-item nav-link" id="nav-material-tab" data-toggle="tab" href="#nav-material"
                                role="tab" aria-controls="nav-material" aria-selected="false">ADD NEW MATERIAL</a>
                            
                        </div>
                    </nav>
                </div>

                <div class="adding-of-materials-content">
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <!-- Start of Category -->
                        <div class="tab-pane fade show active adding-of-materials-container" id="nav-category"
                            role="tabpanel" aria-labelledby="nav-category-tab">
                            <form action="../server.php" method="POST" class="needs-validation" novalidate>
                                <table class="table new-category-table table-striped table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th scope="col">Category</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add-categ-table">
                                        <td><input class="form-control category" name="category[]" onkeyup="brandVal(this)" type="text" id="category"
                                                placeholder="Category Name" required>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                        </td>
                                        <td><input type="button" class="btn btn-sm btn-outline-secondary delete-row"
                                                value="Remove" /></td>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" class="btn btn-success add-row-btn1"><i
                                                        class="fas fa-plus" id="plus-icon"></i> Add Row</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="row form-group save-btn-container">
                                    <div class="col-lg-12">
                                        <button type="submit" id="categButton" class="btn btn-primary add-categ" >Save</button>
                                        <input type="reset" class="btn btn-danger" value="Cancel">
                                    </div>
                                </div>
                                <!-- Start of confirmation modal -->
                                <div class="modal fade" id="add-categ-modal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to
                                                    add the following categories?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    &times;
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="create_category"
                                                    class="btn btn-success">Yes</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">No</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of confirmation modal -->
                            </form>
                            <table class="table view-inventory-tabs-table table-striped table-bordered display"
                                id="mydatatable">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            $sql = "SELECT
                                                        categories_id,
                                                        categories_name
                                                    FROM
                                                        categories
                                                    ORDER BY 1;";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_row($result)){
                                        ?>
                                    <tr>
                                        <td>
                                            <?php echo $row[1];?>
                                        </td>
                                        <td><button type="button" class="btn btn-outline-secondary" data-toggle="modal"
                                                data-target="#edit-categ-modal-<?php echo $row[0]?>">Edit</button>
                                        </td>
                                    </tr>
                                    <!-- Start of edit category modal -->
                                    <div class="modal fade" id="edit-categ-modal-<?php echo $row[0]?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="../server.php" method="POST">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category:
                                                            <?php echo $row[1];?>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            &times;
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="editcategory"
                                                                class="label-styles">Category</label>
                                                            <input type="text" class="form-control"
                                                                value="<?php echo $row[1]?>" name="newCategName"
                                                                placeholder="Enter new category name">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" value="<?php echo $row[0]?>"
                                                            name="categ_id" />
                                                        <button type="submit" name="edit_category"
                                                            class="btn btn-success">Save</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End of edit category modal -->
                                    <?php
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End of Category -->

                        <!-- Start of Unit-->
                        <div class="tab-pane fade show adding-of-materials-container" id="nav-unit" role="tabpanel"
                            aria-labelledby="nav-unit-tab">
                            <form action="../server.php" method="POST" class="needs-validation" novalidate>
                                <table class="table new-category-table table-striped table-bordered" id="table2">
                                    <thead>
                                        <tr>
                                            <th scope="col">Unit</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add-unit-table">
                                        <tr>
                                            <td><input class="form-control unitName" name="units[]" onkeyup="brandVal(this)" type="text" id="units"
                                                    placeholder="Unit" required> <div class="invalid-feedback">Please fill out this field.</div></td>
                                            <td><input type="button" class="btn btn-sm btn-outline-secondary delete-row"
                                                    value="Remove" /></td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" class="btn btn-success add-row-btn2"><i
                                                        class="fas fa-plus" id="plus-icon"></i> Add Row</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="row form-group save-btn-container">
                                    <div class="col-lg-12">
                                        <button type="submit" id="unitButton" class="btn btn-primary" >Save</button>
                                        <input type="reset" class="btn btn-danger" value="Cancel">
                                    </div>
                                </div>
                                <!-- Start of confirmation modal -->
                                <div class="modal fade" id="add-unit-modal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to
                                                    add the following units?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    &times;
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="create_unit"
                                                    class="btn btn-success">Yes</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">No</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of confirmation modal -->
                            </form>

                            <table class="table view-inventory-tabs-table table-striped table-bordered display"
                                id="mydatatable">
                                <thead>
                                    <tr>
                                        <th>Unit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            $sql = "SELECT
                                                        unit_id,
                                                        unit_name
                                                    FROM
                                                        unit
                                                    ORDER BY 1;";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_row($result)){
                                        ?>


                                    <tr>
                                        <td>
                                            <?php echo $row[1]?>
                                        </td>
                                        <td><button type="button" class="btn btn-outline-secondary" data-toggle="modal"
                                                data-target="#edit-unit-modal-<?php echo $row[0]?>">Edit</button>
                                        </td>
                                    </tr>

                                    <!-- Start of edit unit modal -->
                                    <div class="modal fade" id="edit-unit-modal-<?php echo $row[0]?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="../server.php" method="POST">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit
                                                            Unit:
                                                            <?php echo $row[1];?>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="editcategory" class="label-styles">Unit</label>
                                                            <input type="text" class="form-control"
                                                                value="<?php echo $row[1]?>" name="unit_name"
                                                                placeholder="Enter new unit name">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" value="<?php echo $row[0]?>"
                                                            name="unit_id" />
                                                        <button type="submit" name="edit_unit"
                                                            class="btn btn-success">Save</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End of edit unit modal -->

                                    <?php
                                            }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End of Unit -->

                        <!-- Start of Brand-->
                        <div class="tab-pane fade show adding-of-materials-container" id="nav-brand" role="tabpanel"
                            aria-labelledby="nav-brand-tab">
                            <form action="../server.php" method="POST" class="needs-validation" novalidate>
                                <table class="table new-category-table table-striped table-bordered" id="table3">
                                    <thead>
                                        <tr>
                                            <th scope="col">Brand</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add-brand-table">
                                        <tr>
                                            <td><input class="form-control brand" onkeyup="brandVal(this)" name="brand[]" type="text" id="brand"
                                                    placeholder="Brand" required><div class="invalid-feedback">Please fill out this field.</div> </td>
                                            <td><input type="button" class="btn btn-sm btn-outline-secondary delete-row"
                                                    value="Remove" /></td>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <button type="button" class="btn btn-success add-row-btn3"><i
                                                        class="fas fa-plus" id="plus-icon"></i> Add Row</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="row form-group save-btn-container">
                                    <div class="col-lg-12">
                                        <button type="submit" id="brandButton" class="btn btn-primary" >Save</button>
                                        <input type="reset" class="btn btn-danger" value="Cancel">
                                    </div>
                                </div>
                                <!-- Start of confirmation modal -->
                                <div class="modal fade" id="add-brand-modal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to
                                                    add the following brands?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    &times;
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="create_brand"
                                                    class="btn btn-success">Yes</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">No</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of confirmation modal -->
                            </form>

                            <table class="table view-inventory-tabs-table table-striped table-bordered display"
                                id="mydatatable">
                                <thead>
                                    <tr>
                                        <th>Brand</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                            $sql = "SELECT
                                                        brands_id,
                                                        brands_name
                                                    FROM
                                                        brands
                                                    ORDER BY 1;";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_row($result)){
                                        ?>


                                    <tr>
                                        <td>
                                            <?php echo $row[1]?>
                                        </td>
                                        <td><button type="button" class="btn btn-outline-secondary" data-toggle="modal"
                                                data-target="#edit-brand-modal-<?php echo $row[0]?>">Edit</button>
                                        </td>
                                    </tr>

                                    <!-- Start of edit unit modal -->
                                    <div class="modal fade" id="edit-brand-modal-<?php echo $row[0]?>" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="../server.php" method="POST">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit
                                                            Brand:
                                                            <?php echo $row[1];?>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="editcategory" class="label-styles">Brand</label>
                                                            <input type="text" class="form-control"
                                                                value="<?php echo $row[1]?>" name="brands_name"
                                                                placeholder="Enter new brand name">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" value="<?php echo $row[0]?>"
                                                            name="brands_id" />
                                                        <button type="submit" name="edit_brands"
                                                            class="btn btn-success">Save</button>
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End of edit unit modal -->

                                    <?php
                                            }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- End of Unit -->

                        <!-- Start of Materials -->
                        <div class="tab-pane fade show" id="nav-material" role="tabpanel"
                            aria-labelledby="nav-material-tab">
                            <form action="../server.php" method="POST" class="needs-validation" novalidate>
                                <table class="table new-category-table" id="table4">
                                    <thead>
                                        <tr>
                                            <th scope="col">Category</th>
                                            <th scope="col">Material</th>
                                            <th scope="col">Unit</th>
                                            <th scope="col">Brand</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="add-material-table">
                                        <tr>
                                            <td><select name="categ[]" class="custom-select matName" id="category1" onchange="selectionVal(this)" required>
                                                    <option value="disabled" selected disabled>Choose Category</option>
                                                    <?php 
                                                            $sql = "SELECT
                                                                categories_name
                                                            FROM
                                                                    categories
                                                            ORDER BY 1;";
                                                        $result = mysqli_query($conn, $sql);
                                                        while($row = mysqli_fetch_row($result)){
                                                    ?>
                                                    <option value="<?php echo $row[0]?>">
                                                        <?php echo $row[0]?>
                                                    </option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                <div class="invalid-feedback">Please select one.</div>
                                            </td>
                                            <td><input class="form-control matName" name="material[]" onkeyup="brandVal(this)" type="text" id="material"
                                                    placeholder="Material Name" required></td>
                                            <td><select name="unit[]" class="custom-select matName" id="unit" onchange="selectionVal(this)" required>
                                                    <option value="disabled" selected disabled>Choose unit</option>
                                                    <?php 
                                                            $sql = "SELECT
                                                                unit_name
                                                            FROM
                                                                unit
                                                            ORDER BY 1;";
                                                        $result = mysqli_query($conn, $sql);
                                                        while($row = mysqli_fetch_row($result)){
                                                    ?>
                                                    <option value="<?php echo $row[0]?>">
                                                        <?php echo $row[0]?>
                                                    </option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                <div class="invalid-feedback">Please select one.</div>
                                            </td>
                                            <td><select name="brands[]" class="custom-select matName" id="brands" onchange="selectionVal(this)" required>
                                                    <option value="disabled" selected disabled>Choose brand</option>
                                                    <?php 
                                                            $sql = "SELECT
                                                                brands_name
                                                            FROM
                                                                brands
                                                            ORDER BY 1;";
                                                        $result = mysqli_query($conn, $sql);
                                                        while($row = mysqli_fetch_row($result)){
                                                    ?>
                                                    <option value="<?php echo $row[0]?>">
                                                        <?php echo $row[0]?>
                                                    </option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                <div class="invalid-feedback">Please select one.</div>
                                            </td>
                                            <td><input type="button" class="btn btn-sm btn-outline-secondary delete-row"
                                                    value="Remove" />
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5">
                                                <button type="button" class="btn btn-success add-row-btn4"><i
                                                        class="fas fa-plus" id="plus-icon"></i> Add Row</button>
                                            </td>
                                        </tr>
                                    </tfoot>

                                </table>
                                <div class="row form-group save-btn-container">
                                    <div class="col-lg-12">
                                        <input type="submit" id="matButton" class="btn btn-primary" value="Save Material">
                                        <input type="reset" class="btn btn-danger" value="Cancel">
                                    </div>
                                </div>

                                <!-- Start of confirmation modal -->
                                <div class="modal fade" id="add-mat-modal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to
                                                    add the following materials?</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    &times;
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="create_materials"
                                                    class="btn btn-success">Yes</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">No</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End of confirmation modal -->
                            </form>
                            <form action="../server.php" method="POST">
                                <table class="table view-inventory-tabs-table table-striped table-bordered display"
                                    id="mydatatable">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Material Name</th>
                                            <th>Unit</th>
                                            <th>Brand</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            $sql = "SELECT
                                                        categories.categories_name,
                                                        materials.mat_name,
                                                        unit.unit_name,
                                                        materials.mat_id,
                                                        unit.unit_id,
                                                        brands.brands_name,
                                                        brands.brands_id
                                                    FROM
                                                        materials
                                                    INNER JOIN
                                                        categories ON materials.mat_categ = categories.categories_id
                                                    INNER JOIN
                                                        unit ON materials.mat_unit = unit.unit_id
                                                    INNER JOIN
                                                        brands ON brands.brands_id = mat_brand";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_row($result)){
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $row[0];?>
                                            </td>
                                            <td>
                                                <?php echo $row[1];?>
                                            </td>
                                            <td>
                                                <?php echo $row[2];?>
                                            </td>
                                            <td>
                                                <?php echo $row[5];?>
                                            </td>
                                            <td><input type="button" class="btn btn-md btn-outline-secondary"
                                                    value="Edit" data-toggle="modal"
                                                    data-target="#edit-material-modal-<?php echo $row[3]?>" /></td>
                                        </tr>

                                        <!-- Start of edit material modal -->
                                        <div class="modal fade" id="edit-material-modal-<?php echo $row[3]?>"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <form action="../server.php" method="POST">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                Material:
                                                                <?php echo $row[1];?>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                &times;
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="editcategory"
                                                                    class="label-styles">Category</label>
                                                                <select name="newCategory" class="custom-select">
                                                                    <option value="<?php echo $row[4]?>" selected
                                                                        disabled>
                                                                        <?php echo $row[0]?>
                                                                    </option>
                                                                    <?php 
                                                                    $sqlcateg = "SELECT
                                                                                categories_name,
                                                                                categories_id
                                                                            FROM
                                                                                categories
                                                                            ORDER BY 1;";
                                                                    $resultcateg = mysqli_query($conn, $sqlcateg);
                                                                    while($rowcateg = mysqli_fetch_row($resultcateg)){
                                                                ?>
                                                                    <option value="<?php echo $rowcateg[1]?>">
                                                                        <?php echo $rowcateg[0]?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editmaterialname"
                                                                    class="label-styles">Material Name</label>
                                                                <input class="form-control" name="newMatName" value="<?php echo $row[1];?>" type="text"
                                                                    placeholder="Material Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="editunit" class="label-styles">Unit</label>
                                                                <select name="newUnit" class="custom-select">
                                                                    <option value="<?php echo $row[4]?>" selected
                                                                        disabled>
                                                                        <?php echo $row[2]?>
                                                                    </option>
                                                                    <?php 
                                                                            $sqlunit = "SELECT
                                                                                unit_id,
                                                                                unit_name
                                                                            FROM
                                                                                unit
                                                                            ORDER BY 1;";
                                                                    $resultunit = mysqli_query($conn, $sqlunit);
                                                                    while($rowunit = mysqli_fetch_row($resultunit)){
                                                                ?>
                                                                    <option value="<?php echo $rowunit[0]?>">
                                                                        <?php echo $rowunit[1]?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="mat_id"
                                                                    value="<?php echo $row[3]; ?>" />
                                                                <button type="submit" name="edit_material"
                                                                    class="btn btn-success">Save</button>
                                                                <button type="button" class="btn btn-danger"
                                                                    data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- End of edit materials modal -->
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <!-- end of Materials -->

                        
                    </div>
                </div>
            </div>
        </div>
    </section>
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

    $(document).ready(function () {
        $(document).on('click', '.add-row-btn1', function () {
            var html = '';
            html += '<tr>';
            html +=
                '<td><input class="form-control category" name="category[]" onkeyup="brandVal(this)" type="text" id="category" placeholder="Category Name" required><div class="invalid-feedback">Please fill out this field.</div></td>';
            html +=
                '<td><input type="button" class="btn btn-sm btn-outline-secondary delete-row" value="Remove"/></td>'
            html += '</tr>';
            $('#table1 tbody').append(html);
        });

        $("#add-categ-table").on('click', '.delete-row', function () {
            $(this).closest('tr').remove();
        });

        $(document).on('click', '.add-row-btn2', function () {
            var html = '';
            html += '<tr>';
            html +=
                '<td><input class="form-control unitName" name="units[]" onkeyup="brandVal(this)" type="text" id="units" placeholder="Unit" required> <div class="invalid-feedback">Please fill out this field.</div></td>';
            html +=
                '<td><input type="button" class="btn btn-sm btn-outline-secondary delete-row" value="Remove"/></td>'
            html += '</tr>';
            $('#table2 tbody').append(html);
        });
        $("#add-unit-table").on('click', '.delete-row', function () {
            $(this).closest('tr').remove();
        });

        $(document).on('click', '.add-row-btn3', function () {
            var html = '';
            html += '<tr>';
            html +=
                '<td><input class="form-control brand" onkeyup="brandVal(this)" name="brand[]" type="text" id="brand" placeholder="Brand" required><div class="invalid-feedback">Please fill out this field.</div> </td>';
            html +=
                '<td><input type="button" class="btn btn-sm btn-outline-secondary delete-row" value="Remove"/></td>'
            html += '</tr>';
            $('#table3 tbody').append(html);
        });
        $("#add-brand-table").on('click', '.delete-row', function () {
            $(this).closest('tr').remove();
        });
        

        $(document).on('click', '.add-row-btn4', function () {
            var html = '';
            html += '<tr>';
            html +=
                '<td><select name="categ[]" class="custom-select matCateg" id="category1" onchange="selectionVal(this)" required> <option value="disabled" selected disabled>Choose Category</option>'; 
            <?php
            $sql = "SELECT
            categories_name
            FROM
            categories
            ORDER BY 1;";
            $result = mysqli_query($conn, $sql);
            echo "html +='";
            while ($row = mysqli_fetch_row($result)) {
                echo ' <option value="'.$row[0].
                '">';
                echo $row[0];
                echo '</option>';
            }
            echo "';";
            ?>
            html += '</select><div class="invalid-feedback">Please select one.</div></td>';
            html +=
                '<td><input class="form-control matName" name="material[]" onkeyup="brandVal(this)" type="text" id="material" placeholder="Material Name" required><div class="invalid-feedback">Please fill out this field.</div></td>';
            html +=
                '<td><select name="unit[]" class="custom-select unitMat" id="unit" onchange="selectionVal(this)" required> <option value="disabled" selected disabled>Choose unit</option>'; 
            <?php
            $sql = "SELECT
            unit_name
            FROM
            unit
            ORDER BY 1;
            ";
            $result = mysqli_query($conn, $sql);
            echo "html +='";
            while ($row = mysqli_fetch_row($result)) {
                echo '<option value="'.$row[0].
                '">';
                echo $row[0];
                echo '</option>';
            }
            echo "';"; 
            ?>


            html += '</select><div class="invalid-feedback">Please select one.</div></td>';
            html += '<td><select name="brands[]" class="custom-select brandMat" id="brands" onchange="selectionVal(this)" required><option value="disabled" selected disabled>Choose brand</option>';
            <?php 
                    $sql = "SELECT
                        brands_name
                    FROM
                        brands
                    ORDER BY 1;";
                $result = mysqli_query($conn, $sql);
                echo "html +='";
                while($row = mysqli_fetch_row($result)){
                    echo '<option value="'.$row[0].'">';
                    echo $row[0];
                    echo '</option>';
                }
           echo "';";
           
            ?>
            html += '</select><div class="invalid-feedback">Please select one.</div></td>';
            html +=
                '<td><input type="button" class="btn btn-sm btn-outline-secondary delete-row" value="Remove"/></td>'
            html += '</tr>';
            $('#table4 tbody').append(html);
        });

        $("#add-material-table").on('click', '.delete-row', function () {
            $(this).closest('tr').remove();
        });

        $('#categButton').click(function (e) {
            var isValid;
            $(".category").each(function() {
            var element = $(this);
            if (element.val() == "") {
                isValid = false;
                this.setCustomValidity("Please fill out this field.");
            } else {
                isValid = true;
                this.setCustomValidity("");
            }
            });
            if (isValid==true) {
                e.preventDefault();
                $("#add-categ-modal").modal('show');   
            } 
        });

        
        $('#unitButton').click(function (e) {
            var isValid;
            $(".unitName").each(function() {
            var element = $(this);
            if (element.val() == "") {
                isValid = false;
                this.setCustomValidity("Please fill out this field.");
            } else {
                isValid = true;
                this.setCustomValidity("");
            }
            });
            if (isValid==true) {
                e.preventDefault();
                $("#add-unit-modal").modal('show');   
            } 
        });

    
        $('#brandButton').click(function (e) {
            var isValid2;
            $(".brand").each(function() {
            var element2 = $(this);
            if (element2.val() == "") {
                isValid2 = false;
                this.setCustomValidity("Please fill out this field.");
            } else {
                isValid2 = true;
                this.setCustomValidity("");
            }
            });
            if (isValid2==true) {
                e.preventDefault();
                $("#add-brand-modal").modal('show');   
            } 
        });

        $('#matButton').click(function (e) {
            var isValid3;
            $(".matName").each(function() {
            var element2 = $(this);
            if (element2.children('option:selected').val() == "disabled") {
                isValid3 = false;
                this.setCustomValidity("Please fill out this field.");
            } else {
                isValid3 = true;
                this.setCustomValidity("");
            }
            });
            if (isValid3==true) {
                e.preventDefault();
           
                $("#add-brand-modal").modal('show');   
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

    function brandVal(brand){
            if (brand.value == "") {
                  brand.setCustomValidity("Please fill out this field.");
                } else {
                  brand.setCustomValidity("");
                }
        }
    
        function selectionVal(brand){
            if (brand.children('option:selected').val() == "disabled") {
                  brand.setCustomValidity("Please fill out this field.");
                } else {
                  brand.setCustomValidity("");
                }
        }
</script>


</html>