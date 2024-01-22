<?php
include 'session.php';
include "class/envelope.php";
$call = new Envelope();
$envelope_id = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRINT RESULT | <?php echo date('d-M-Y') ?></title>
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
                                <a href="">
                                    <i class="fas fa-home"></i> Print Results</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
               <?php
                    #START INCLUDE MODAL
                    
                    #END INCLUDE MODAL


                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED
                    if (isset($_POST['saveHifdhi'])) {
                        $call->editJajiHifdhiResult($_POST['count'], $_POST['envelope_id']);
                    }
                    if (isset($_POST['saveMakharij'])) {
                        $call->editJajiMakharijResult($_POST['count'], $_POST['envelope_id']);
                    }
                    if (isset($_POST['saveTajwid'])) {
                        $call->editJajiTajwidResult($_POST['count'], $_POST['envelope_id']);
                    }
                    if (isset($_POST['saveTashjii'])) {
                        $call->editJajiTashjiiResult($_POST['count'], $_POST['envelope_id']);
                    }
                    #END CALLING FUNCTION
                ?>          
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive2" id="content">
                            <?php
                                if (isset($_GET['eid']) && !empty($_GET['eid'])) {
                                    $envelope_id = $_GET['eid'];
                                    $marks = $_GET['mrk'];
                                    $call->fetchParticipantResultsToPrint($envelope_id,$marks);
                                }
                            ?>    
                            </div>
                            <center>
                                <button class='btn btn-info' onclick="printArea('content');"><i class='fa fa-print'></i> Print</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Plugins Js -->
    <?php include"script/script.php"; ?>
</body>
</html>