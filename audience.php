<?php
include 'session.php';
include 'class/audience.php';
$call = new Audience();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ | AUDIENCE</title>
    <?php include "head.php"; ?>
</head>

<style type="text/css">
.img-responsive{
    width: 100%;
    max-width: 1800px;
}
</style>

<body class="light">

    <!-- Page Loader -->
    <?php include "preloader.php"; 
    //include 'modal/ayah-ovalay-modal.php';
    ?>
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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <?php
                                $call->audienceDashboard();
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Plugins Js -->
<?php
    include"script/script.php";
    include"script/audience-script.php";
?>
</body>
</html>