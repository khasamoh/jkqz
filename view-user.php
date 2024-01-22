<?php
include "session.php";
include "class/user.php";
$call = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ - ALL USER</title>
    <?php include "head.php"; ?>
</head>

<body class="light">

    <!-- Page Loader -->
    <?php include "preloader.php"; ?>
    <!-- #END# Page Loader -->

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Bar -->
    <?php include "top-nav.php"; ?>
    <!-- #Top Bar -->
    <div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <?php include "sidebar.php"; ?>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="breadcrumb breadcrumb-style ">
                            <li class="breadcrumb-item">
                                <h4 class="page-title"><?php echo $_SESSION['jkqz_privellege']; ?></h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="view-user.php">
                                    <i class="fas fa-home"></i> All System User</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <?php
                    #START INCLUDE MODAL
                    include"modal/change-temp-role-modal.php";
                    include"modal/add-user-modal.php";
                    //include"modal/edit-user-modal.php";
                    include"modal/delete-user-modal.php";
                    #END INCLUDE MODAL


                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED

                    if (isset($_POST['adduser'])) {
                        if ($_POST['compertition'] != 0) {
                            if ($_POST['privellege'] != 0) {
                                $call->addUser($_SESSION['jkqz_id']);
                            }else{
                                print " <div id=\"ifr\" class='ifr'>
                                <div class=\"col-md-12\">
                                    <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                            <span aria-hidden=\"true\">&times;</span>
                                        </button>
                                        <center><strong class=\"\"> Sorry! Please add privellege fist! <i class='fa fa-warning'></i></strong></center>
                                    </div>
                                </div>
                            </div>";
                            }
                        }else{
                            print " <div id=\"ifr\" class='ifr'>
                                <div class=\"col-md-12\">
                                    <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                            <span aria-hidden=\"true\">&times;</span>
                                        </button>
                                        <center><strong class=\"\"> Sorry! Please add compertition fist! <i class='fa fa-warning'></i></strong></center>
                                    </div>
                                </div>
                            </div>";
                        }
                    }

                    if (isset($_POST['delete'])) {
                        $call->deleteUser($_SESSION['jkqz_id']);
                    }


                    if (isset($_POST['save'])) {
                        $call->updateTempPrivellege($_SESSION['jkqz_id']);
                    }

                    #END CALLING FUNCTION
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button class='btn btn-success open-modal' title='Add user' data-toggle='modal' data-target='#addUserModal'><i class="fa fa-user"></i> Add user</button>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tableExport" class="table table-hover table-bordered">
                                    <thead>
                                        <th>Full Name</th>
                                        <th class='center'>Gender</th>
                                        <th class='center'>Phone Number</th>
                                        <th class='center'>Adress</th>
                                        <th class='center'>Email</th>
                                        <th class='center'>Nationality</th>
                                        <th class='center'>Role</th>
                                        <th class='center'>Username</th>
                                        <th class='center'>Temp_Role</th>
                                        <th class='center'>More</th>
                                    </thead>
                                    <tbody>
                                        <?php  $call->fetchAllUser(); ?>
                                    </tbody>
                                    <tfoot>
                                        <th>Full Name</th>
                                        <th class='center'>Gender</th>
                                        <th class='center'>Phone Number</th>
                                        <th class='center'>Adress</th>
                                        <th class='center'>Email</th>
                                        <th class='center'>Nationality</th>
                                        <th class='center'>Role</th>
                                        <th class='center'>Username</th>
                                        <th class='center'>Temp_Role</th>
                                        <th class='center'>More</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Plugins Js -->
    <?php include"script/script.php"; ?>
<script type="text/javascript">
function rID(value1, value2){
    document.getElementById("username").innerHTML = value2;
    document.getElementById("rid").value = value1;
}

function dID(value1, value2){
    document.getElementById("did").value = value1;
    document.getElementById("name").innerHTML = value2;
}

function tempID(value1, value2){
    document.getElementById("uid").value = value1;
    document.getElementById("uname").innerHTML = value2;
}

function chPrv(e){
    document.getElementById("pid").value = e.options[e.selectedIndex].text;
    
}
</script>
</body>
</html>