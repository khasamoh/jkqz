<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ - HOME</title>
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
                                <a href="home.php">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php
            if ($_SESSION['jkqz_privellege'] == "admin") {
                include 'dashboard/admin.php';
            }
        ?>
        </div>
    </section>
    <!-- Plugins Js -->
    <?php
        include"script/script.php";
        include"script/jaji-script.php";
    ?>
<script type="text/javascript">
function fID(value1, value2){
    document.getElementById("participant_id").value = value1;
    document.getElementById("envelope_id").value = value2;
}

function dID(value1, value2){
    document.getElementById("pid").value = value1;
    document.getElementById("eid").value = value2;
}
</script>
</body>
</html>