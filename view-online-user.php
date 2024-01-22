<?php
include 'session.php';
include "class/user.php";
$call = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ - ONLINE USER</title>
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
    <?php include"top-nav.php"; ?>
    <!-- #Top Bar -->
    <div>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <?php include"sidebar.php"; ?>
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
                                <a href="view-online-user.php">
                                    <i class="fas fa-home"></i> All Online User</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <?php
                    #START INCLUDE MODAL
                    //
                    #END INCLUDE MODAL


                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED
                    //
                    #END CALLING FUNCTION
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tableExport" class="table table-hover table-bordered">
                                    <thead>
                                        <th>Full Name</th>
                                        <th class='center'>Gender</th>
                                        <th class='center'>Role</th>
                                        <th class='center'>Username</th>
                                        <th class='center'>Temp_Role</th>
                                        <th class='center'>Status</th>
                                        <th class='center'>More</th>
                                    </thead>
                                    <tbody>
                                        <?php $call->fetchOnlineUser(); ?>
                                    </tbody>
                                    <tfoot>
                                        <th>Full Name</th>
                                        <th class='center'>Gender</th>
                                        <th class='center'>Role</th>
                                        <th class='center'>Username</th>
                                        <th class='center'>Temp_Role</th>
                                        <th class='center'>Status</th>
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
    document.getElementById("uname").innerHTML = value2;
}
</script>
</body>
</html>