<?php
include 'session.php';
include "class/jaji.php";
$call = new Jaji();
if (isset($_GET['eid']) && !empty($_GET['eid'])) {
    $envelope_id = $_GET['eid'];
}else{
    $envelope_id = 0;
}

if (isset($_GET['type'])) {
    $jaji = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ | EDIT RESULT</title>
    <?php include "head.php"; ?>
</head>
<style type="text/css">
.btn-hover{
    padding: 10px 20px;
    margin-right: 5px;
}
.btn-hover:hover{
    color: white;
}
</style>
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
                                    <i class="fas fa-home"></i> More Results</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- @todo: change the block below to automate anyone who judged in this envelope -->
                    <?php if (!empty($_GET['eid'])) {?>
                    <center>
                        <?php $call->judgedBy($envelope_id); ?>
                    </center><br>
                <?php } ?>
                    <div class="card">
                        <div class="body">
                            <?php
                                if (isset($_GET['type'])) {
                                    if ($_GET['type'] == 'hifdhi') {
                                        $call->fetchParticipantResults($envelope_id, 'jaji hifdhi');
                                    }elseif ($_GET['type'] == 'tashjii') {
                                        $call->fetchParticipantResults($envelope_id, 'jaji tashjii');
                                    }else{
                                        $call->fetchParticipantResults($envelope_id, $_GET['type']);
                                    }
                                }else{
                                    $call->fetchParticipantResults($envelope_id, $jaji);
                                }
                            ?>    
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