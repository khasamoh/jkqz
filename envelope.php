<?php
include 'session.php';
include 'class/envelope.php';
$call = new Envelope();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ | ENVELOPE</title>
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
    
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <?php
                    if (isset($_POST['selectEnvelope'])) {
                        $call->selectEnvelope();
                    }
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Please choose Envelope</strong></h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <?php
                                    $call->fetchRequiredEnvelope();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Plugins Js -->
<?php
    include"script/script.php";
    include"script/envelope-script.php";
?>
</body>
</html>