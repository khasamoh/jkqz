<?php
include 'session.php';
include "class/authentication.php";
$call = new Authentication();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ | PRIVELLEGE</title>
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
                                <a href="view-privellege.php">
                                    <i class="fas fa-home"></i> All Privellege</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <?php
                    #START INCLUDE MODAL
                    //include"modal/add-privellege-modal.php";
                    #END INCLUDE MODAL


                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED
                    if (isset($_POST['addprivellege'])) {
                        $call->addPrivellege($_SESSION['jkqz_id']);
                    }
                    #END CALLING FUNCTION
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button class='btn btn-success open-modal disabled' title='Add Privellege' data-toggle='modal' data-target='#addPrivellegeModal'><i class="fas fa-table"></i> Add Privellege</button>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tableExport" class="table table-hover table-bordered">
                                    <thead>
                                        <th>Privellege Name</th>
                                        <th class='center'>Privellege Prefix</th>
                                    </thead>
                                    <tbody>
                                        <?php  $call->fetchPrivellege(); ?>
                                    </tbody>
                                    <tfoot>
                                        <th>Privellege Name</th>
                                        <th class='center'>Privellege Prefix</th>
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
function eID(value1, value2, value3){
    document.getElementById("id").value = value1;
    document.getElementById("name").value = value2;
    document.getElementById("prefix").value = value3;
}

function dID(value1, value2){
    document.getElementById("did").value = value1;
    document.getElementById("dname").innerHTML = value2;
}
</script>
</body>
</html>