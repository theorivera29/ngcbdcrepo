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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
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
                <h4>Delivered Materials</h4>
            </div>
            <div class="card-body">
                <form class="form needs-validation" action="../server.php" method="POST" novalidate>
                    <div class="form-group row date-container">
                        <div class="col-lg-12">
                            <label class="col-lg-12 col-form-label">Date:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="date" name="deliveredDate" required>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row formnum-container">
                        <div class="col-lg-12">
                            <label class="col-lg-12 col-form-label">Receipt No.:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="resibo" id="resibo" onkeyup="resibovalidation()" pattern="[A-Za-z0-9\s]*" required>
                                <div id="res" class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row formnum-container">
                        <div class="col-lg-12">
                            <label class="col-lg-12 col-form-label">Remarks:</label>
                            <div class="form-group col-lg-12">
                                <select class="form-control" name="remarks" id="remarks" required>
                                    <option value="" selected disabled>Select remarks:</option>
                                    <option value="Delivered from Main Office">Delivered from Main Office</option>
                                    <option value="Delivered using Petty Cash">Delivered using Petty Cash</option>
                                    <option value="Replacement from Main Office">Replacement from Main Office</option>
                                    <option value="Replacement using Petty Cash">Replacement using Petty Cash</option>
                                </select>
                                <div class="invalid-feedback">Please select one.</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row col-lg-12">
                        <label class="col-lg-2 col-form-label">Project:</label>
                        <div class="form-group col-lg-9">
                            <select class="form-control" name="projectName" id="projects" required>
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
                                                IN (SELECT projmateng_mateng FROM projmateng WHERE projmateng_mateng = $accounts_id) AND projects_status = 'open';";
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
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="form-group row col-lg-12">
                        <label class="col-lg-2 col-form-label">Location:</label>
                        <div class="col-lg-9">
                            <input id="location" class="form-control" type="text" name="location" required readonly>
                            <div class="invalid-feedback">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="card">
                        <table class="table deliveredin-form-table" id="table1">
                            <thead>
                                <tr>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Articles</th>
                                    <th scope="col">Units</th>
                                    <th scope="col">Supplied By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="deliveredTable">

                                <tr>
                                    <td><input class="form-control" name="quantity[]" type="number" min="0" id="quantity" placeholder="Quantity" required>
                                        <div class="invalid-feedback">Invalid qunatity.</div>
                                    </td>
                                    <td>
                                        <select class="form-control art3" onfocusin="revSel(this);return true;" onchange="remSel(this, articles, hiddenarticles);return true;" id="articles" required></select>
                                        <div class="invalid-feedback">Please select one.</div>
                                        <input type="hidden" name="articles[]" id="hiddenarticles">
                                    </td>
                                    <td><input type="text" class="form-control" type="text" id="units" disabled><input type="hidden" class="form-control" name="unit[]" id="unit"></td>
                                    <td><input class="form-control" name="suppliedBy[]" type="text" id="suppliedBy" placeholder="Supplied By" required>
                                        <div class="invalid-feedback">Please fill out this field.</div>
                                    </td>
                                    <td><input type="button" class="btn btn-sm btn-outline-secondary delete-row" value="Delete" /></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <button type="button" class="btn btn-success add-row-btn"><i class="fas fa-plus" id="plus-icon"></i> Add Row</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row form-group save-btn-container">
                        <div class="col-lg-12">
                            <input type="button" class="btn btn-primary deliveredin-btn" value="Save Changes" data-toggle="modal" data-target="#save-modal">
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
                                    <button type="submit" name="create_deliveredin" class="btn btn-success">Yes</button>
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
    <?php 
        $sql = "SELECT deliveredin_receiptno FROM deliveredin";
        $result = mysqli_query($conn, $sql);
    ?>
    let listNames = [
        <?php  
        while ($rows = mysqli_fetch_row($result)) {
            echo '"'.$rows[0].'"'.',';
        } 
    ?>
        ""
    ];
    let selectedList = [];
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
        $('#articles').on('change', function() {
            var articles = $("#articles option:selected").val();
            $.get('http://localhost/ngcbdcrepo/Materials%20Engineer/../server.php?mat_name=' + $(this)
                .children(
                    'option:selected').val(),
                function(data) {
                    var d = JSON.parse(data);
                    $('#units').val(d[0][1])
                    $('#unit').val(d[0][0])
                    $('#hiddenarticles').val(articles)
                    this.className = "form-control";
                })
        })
        $('#projects').on('change', function() {
            console.log($(this).children('option:selected').val())
            $.get('http://localhost/ngcbdcrepo/Materials%20Engineer/../server.php?projects_id=' + $(
                this).children(
                'option:selected').val(), function(data) {
                var d = JSON.parse(data);

                $('#location').val(d)
            })
        })
        $('#projects').on('change', function() {
            $.get('http://localhost/ngcbdcrepo/Materials%20Engineer/../server.php?project_id=' + $(this)
                .children(
                    'option:selected').val(),
                function(data) {
                    var d = JSON.parse(data)
                    var print_options = '';
                    print_options = print_options +
                        `<option disabled selected>Choose your option</option>`
                    d.forEach(function(da) {
                        if (!selectedList.includes(da[0])) {
                            print_options = print_options + `<option value="${da[0]}">${da[1]}</option>`;
                        } else {
                            print_options = print_options + `<option value="${da[0]}" disabled>${da[1]}</option>`;
                        }
                    })
                    $('.art').html(print_options);
                    $('#articles').html(print_options);
                })
        })
        var i = 0;
        $(document).on('click', '.add-row-btn', function() {
            $.get('http://localhost/ngcbdcrepo/Materials%20Engineer/../server.php?project_id=' + $('#projects')
                .children(
                    'option:selected').val(),
                function(data) {
                    var d = JSON.parse(data)
                    var print_options = '';
                    print_options = print_options + `<option disabled selected>Choose your option</option>`;
                    d.forEach(function(da) {
                        if (!selectedList.includes(da[0])) {
                            print_options = print_options + `<option value="${da[0]}">${da[1]}</option>`;
                        } else {
                            print_options = print_options + `<option value="${da[0]}" disabled>${da[1]}</option>`;
                        }
                    })
                    $('.art').html(print_options);
                });

            var html = '';
            html += '<tr>';
            html +=
                '<td><input class="form-control" name="quantity[]" type="number" min="0" id="quantity" placeholder="Quantity" required><div class="invalid-feedback">Invalid qunatity.</div></td>';
            html +=
                '<td><div class="form-group"><select class="form-control art art2 art3" onfocusin="revSel(this, \'#articles' + i + '\');return true;" onchange="remSel(this, \'articles' + i + '\', \'hiddenarticles' + i + '\');return true;" id="articles' + i + '" required></select><div class="invalid-feedback">Please select one.</div></div></td><input type="hidden" name="articles[]" id="hiddenarticles' + i + '">';
            html +=
                '<td><input type="text" class="form-control" type="text" id="units' + i + '" disabled><input type="hidden" class="form-control" name="unit[]" id="unit' + i + '"></td>'
            html +=
                '<td><input class="form-control" name="suppliedBy[]" type="text" id="suppliedBy" placeholder="Supplied By" required><div class="invalid-feedback">Please fill out this field.</div></td>';
            html +=
                '<td><input type="button" class="btn btn-sm btn-outline-secondary delete-row" value="Delete"/></td>'
            html += '</tr>';
            $('#table1 tbody').append(html);
            i++;

            for (j = 0; j < i; j++) {
                var id = "articles" + j;
                var unitId = "unit" + j;
                var unitsId = "units" + j;
                var articles = $("#articles option:selected");

                $("#" + id).on('change', function() {
                    console.log($(this).children('option:selected').val());
                    $.get('http://localhost/ngcbdcrepo/Materials%20Engineer/../server.php?mat_name=' + $("#" + id).children(
                        'option:selected').val(), function(data) {
                        var d = JSON.parse(data);
                        if ($("#" + id).val() == null) {
                            $("#" + unitsId).val(d[0][1])
                            $("#" + unitId).val(d[0][0])
                        }
                    })
                })
            }
        });
        $("#deliveredTable").on('click', '.delete-row', function() {
            $(this).closest('tr').remove();
        });

        // $(".").click(function(e) {

        // $(".art3").each(function() {
        //         var element = $(this);
        //         if (element.val() == "") {
        //             this.setCustomValidity("Please fill out this field.");
        //         } else {
        //             this.setCustomValidity("");
        //         }
        //     });
        //     if ((formNo != '') && (date != '') && (status != '') && (deliverTo != '') && (projects!='') && (requestedBy != '') && (hauledBy != '') && (warehouseman != '') && (approvedBy != '') && (type != '') && (PORS != '') && (haulerID != '')) {
        //         e.preventDefault();
        //         $("#save-modal").modal('show');
        //     }
        // });
    });




    function remSel(inp1, classId, article) {
        inp1.className = "form-control art2";
        console.log("#" + classId + " option[value='" + inp1.value + "']");
        $("#" + classId + " option[value='" + inp1.value + "']").prop("disabled", true);
        $("#" + article).val(inp1.value);
        $(".art2 option[value='" + inp1.value + "']").prop("disabled", true);
        $('#articles option[value="' + inp1.value + '"]').prop("disabled", true);
        selectedList.push(inp1.value);
        // $(".part option[value='" + inp1.value + "']").remove();
        if (inp1.value == "disabled") {
            inp1.setCustomValidity("Please fill out this field.");
                } else {
                    inp1.setCustomValidity("");
                }
    }

    function revSel(inp1, id) {
        var oldValue = inp1.value;

        $(id).on('change', function() {
            removeItem(selectedList, oldValue);
            $(".art2 option[value='" + oldValue + "']").prop("disabled", false);
            $("#articles option[value='" + oldValue + "']").prop("disabled", false);
        });
        $('#articles').on('change', function() {
            removeItem(selectedList, oldValue);
            $(".art2 option[value='" + oldValue + "']").prop("disabled", false);
            $("#articles option[value='" + oldValue + "']").prop("disabled", false);
        });
        // $(".part option[value='" + inp1.value + "']").remove();
    }

    function removeItem(array, item) {
        for (var i in array) {
            if (array[i] == item) {
                array.splice(i, 1);
                break;
            }
        }
    }

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


    function resibovalidation() {
        var startList = document.getElementById("resibo").value;
        if (startList == null) {
            document.getElementById("res").innerHTML = "Please fill out this field.";
        } else if (listNames.includes(startList)) {
            document.getElementById("resibo").setCustomValidity('Duplicate receipt number detected!');
            document.getElementById("res").innerHTML = "Duplicate receipt number detected!";
        } else {
            document.getElementById("resibo").setCustomValidity("");
        }
    }

</script>

</html>
