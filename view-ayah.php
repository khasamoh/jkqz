<?php
include 'session.php';
include "class/user.php";
$call = new User();

if (isset($_GET['eid'])) {
    $envelopeId = $_GET['eid'];
}else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ - VIEW AYAH</title>
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
                                <?php print "<a href='view-ayah.php?eid=".$envelopeId."'>"?>
                                    <i class="fas fa-home"></i> View Ayah</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <?php
                    #START INCLUDE MODAL
                    include"modal/add-question-modal.php";
                    #END INCLUDE MODAL

                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED
                    if (isset($_POST['addquestion'])) {
                       $call->uploadSingleQuestion($envelopeId, $_SESSION['jkqz_id']);
                    }
                    #END CALLING FUNCTION
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <button class='btn btn-success open-modal' title='Add new Question' data-toggle='modal' data-target='#addQuestionModal'><i class="fa fa-users"></i> Add New Question</button>
                        </div>
                        <div class="body">
                            <?php $call->viewAyah($envelopeId); ?>
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