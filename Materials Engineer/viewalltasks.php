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
    <a href="#" class="open" onclick="window.location.href='dashboard.php'">
        <i class="fas fa-arrow-circle-left arrow-left"></i>
    </a>
    <div class="card-body todo-task-header">

                    <?php
                        $date_today = date("Y-m-d");
                        $sql = "SELECT 
                                    todo_id,
                                    todo_date,
                                    todo_task,
                                    todo_status,
                                    todoOf 
                                FROM 
                                    todo 
                                WHERE 
                                    todoOf = $accounts_id ORDER BY todo_task;";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                    ?>
                    <table class="table view-all-task-table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Task</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php 
                            while($row = mysqli_fetch_row($result)) {
                        ?>
                        <form action="../server.php" method="POST">
                            <tbody>
                                <tr>
                                    <td><?php echo $row[1] ;?></td>
                                    <td><?php echo $row[2] ;?></td>
                                    <td><?php echo $row[3] ;?></td>
                                    <input type="hidden" name="todo_id" value="<?php echo $row[0];?>">
                                    <input type="hidden" name="todo_task" value="<?php echo $row[2];?>">
                                    <input type="hidden" name="todo_status" value="<?php echo $row[3];?>">
                                    <?php
                                    if(strcmp($row[3], "in progress") == 0) {
                                ?>
                                    <td><button type="button" class="btn btn-success" data-toggle="modal"
                                            data-target="#done-task-modal-<?php echo $row[0] ;?>">Done
                                        </button></td>
                                    <?php
                                    } else {
                                ?>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#clear-task-modal-<?php echo $row[0] ;?>">Clear
                                        </button></td>
                                    </td>
                                    <?php
                                    }
                                ?>
                                </tr>
                            </tbody>
                            <!-- START DONE MODAL -->
                            <div class="modal fade" id="done-task-modal-<?php echo $row[0] ;?>" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you are done
                                                with this task?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                &times;
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $row[2] ;?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name="update_todo_all">Yes</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">No</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END DONE MODAL -->
                            <!-- START CLEAR MODAL -->
                            <div class="modal fade" id="clear-task-modal-<?php echo $row[0] ;?>" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to
                                                clear this task?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                &times;
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php echo $row[2] ;?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name="update_todo_all">Yes</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">No</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END CLEAR MODAL -->
                        </form>
                        <?php
                            }
                        ?>
                    </table>
                    <?php
                        } else {
                    ?>
                    <div>
                        <p id="no-task-text">NO TASK TO SHOW</p>
                    </div>
                    <?php
                        }
                    ?>
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

    });
</script>

</html>
