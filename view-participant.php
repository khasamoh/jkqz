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
    <title>JKQZ - ALL PARTICIPANT</title>
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
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <?php include"sidebar.php"; ?>
            <!-- #Menu -->
        </aside>
        <!-- #END# Left Sidebar -->

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
                                <a href="">
                                    <i class="fas fa-home"></i> All Participant</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <?php
                    #START INCLUDE MODAL
                    include"modal/add-participant-modal.php";
                    //include"modal/edit-user-modal.php";
                    include"modal/delete-participant-modal.php";
                    include"modal/open-participant-image-modal.php";
                    #END INCLUDE MODAL


                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED

                    if (isset($_POST['addparticipant'])) {
                        if ($_POST['juzuu'] != 0) {
                            if ($_POST['compertition'] != 0) {
                                $call->addParticipant($_SESSION['jkqz_id'], $_POST['compertition']);
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
                        }else{
                            print " <div id=\"ifr\" class='ifr'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> Sorry! Please add juzuu fist! <i class='fa fa-warning'></i></strong></center>
                                </div>
                            </div>
                        </div>";
                        }
                    }

                    if (isset($_POST['delete'])) {
                        $call->deleteParticipant($_SESSION['jkqz_id']);
                    }

                    if (isset($_POST['updateStamp'])) {
                        $call->updateParticipantImage($_SESSION['jkqz_id']);
                    }
                    #END CALLING FUNCTION
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button class='btn btn-success open-modal' title='Add user' data-toggle='modal' data-target='#addParticipantModal'><i class="fa fa-users"></i> Add Participant</button>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tableExport" class="table table-hover table-bordered">
                                    <thead>
                                        <th>Full Name</th>
                                        <th class='center'>Stamp</th>
                                        <th class='center'>Gender</th>
                                        <th class='center'>Age</th>
                                        <th class='center'>Juzuu</th>
                                        <th class='center'>Type</th>
                                        <th class='center'>Country</th>
                                        <th class='center'>Compertition</th>
                                        <th class='center'>Status</th>
                                        <th class='center'>More</th>
                                    </thead>
                                    <tbody>
                                        <?php  $call->fetchAllParticipant($type); ?>
                                    </tbody>
                                    <tfoot>
                                        <th>Full Name</th>
                                        <th class='center'>Stamp</th>
                                        <th class='center'>Gender</th>
                                        <th class='center'>Age</th>
                                        <th class='center'>Juzuu</th>
                                        <th class='center'>Type</th>
                                        <th class='center'>Country</th>
                                        <th class='center'>Compertition</th>
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

function showImage(value1, value2){
    document.getElementById("image").src = value1;
    document.getElementById("participant_id").value = value2;
}
</script>
</body>
</html>