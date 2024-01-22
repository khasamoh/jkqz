<?php
include 'session.php';
include "class/setting.php";
$call = new Setting();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOME</title>
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
                                <a href="envelope-question.php">
                                    <i class="fas fa-home"></i> Envelope Question</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
               <?php
                    #START INCLUDE MODAL
                    include"modal/add-envelope-question-modal.php";
                    #END INCLUDE MODAL


                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED
                    if (isset($_POST['addstoreiterm'])) {
                        $call->addStoreIterm($_SESSION['id']);
                    }

                    if (isset($_POST['delete'])) {
                        $call->deleteIterm($_SESSION['id']);
                    }

                    if (isset($_POST['addstore'])) {
                        $call->addStore($_SESSION['id']);
                    }
                    #END CALLING FUNCTION
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button class='btn btn-success open-modal' title='Add Setting' data-toggle='modal' data-target='#addEnvelopeQuestionModal'><i class="fa fa-cube"></i> Add Setting</button>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tableExport" class="table table-hover table-bordered">
                                    <thead>
                                        <th class='center'>Juzuu</th>
                                        <th class='center'>Type</th>
                                        <th class='center'>No_of_Question</th>
                                        <th class='center'>More</th>
                                    </thead>
                                    <tbody>
                                        <?php $call->fetchEnvelopeQuestion(); ?>
                                    </tbody>
                                    <tfoot>
                                        <th class='center'>Juzuu</th>
                                        <th class='center'>Type</th>
                                        <th class='center'>No_of_Question</th>
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
function eID(value1, value2, value3){
    document.getElementById("iId").value = value1;
    document.getElementById("name").value = value2;
    document.getElementById("location").value = value3;
}

function dID(value1, value2){
    document.getElementById("did").value = value1;
    document.getElementById("dname").innerHTML = value2;
}
</script>
</body>
</html>