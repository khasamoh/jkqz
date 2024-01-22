<?php
include 'session.php';
include "class/user.php";
$call = new User();
$type = 'all';
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ - ALL ENVELOPE</title>
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
                                <a href="view-envelope.php">
                                    <i class="fas fa-home"></i> All Envelope</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <?php
                    #START INCLUDE MODAL
                    include"modal/add-envelope-modal.php";
                    //include"modal/edit-user-modal.php";
                    include"modal/delete-envelope-modal.php";
                    #END INCLUDE MODAL


                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED

                    if (isset($_POST['addenvelope'])) {
                        $call->addEnvelope($_SESSION['jkqz_id']);
                    }

                    if (isset($_POST['delete'])) {
                        $call->deleteEnvelope($_SESSION['jkqz_id']);
                    }

                    if (isset($_POST['addquestion'])) {
                        $call->uploadMultipleQuestion($_POST['envelope_id'], $_SESSION['jkqz_id']);
                    }

                    #END CALLING FUNCTION
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button class='btn btn-success open-modal' title='Add envelope' data-toggle='modal' data-target='#addEnvelopeModal'><i class="fas fa-envelope"></i> Add Envelope</button>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tableExport" class="table table-hover table-bordered">
                                    <thead>
                                        <th>Juzuu</th>
                                        <th class='center'>Envelope</th>
                                        <th class='center'>Type</th>
                                        <th class='center'>Status</th>
                                        <th class='center'>More</th>
                                    </thead>
                                    <tbody>
                                        <?php $call->fetchEnvelope($type); ?>
                                    </tbody>
                                    <tfoot>
                                        <th>Juzuu</th>
                                        <th class='center'>Envelope</th>
                                        <th class='center'>Type</th>
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