<?php
include 'session.php';
include "class/user.php";
$call = new User();
if (isset($_GET['qsn_no'])) {
    $qsn_no = $_GET['qsn_no'];
}else{
    $qsn_no = 0;
}

if (isset($_GET['env_no'])) {
    $env_no = $_GET['env_no'];
}else{
    $env_no = 0;
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
                            <?php
                                print "<a href='add-envelope-question.php?qsn_no=".$qsn_no."&env_no=".$env_no."'>
                                    <i class='fas fa-home'></i> Envelope Question</a>";
                            ?>
                                
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

                   if ($qsn_no != 0 && $env_no != 0) {
                       print"<div id=\"ifr\" class='ifr'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Envelope Added successfull <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
                   }


                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED
                    if (isset($_POST['addenvelope'])) {
                        $call->addEnvelope($_SESSION['jkqz_id']);
                    }

                    if (isset($_POST['delete'])) {
                        $call->deleteEnvelope($_SESSION['jkqz_id']);
                    }

                    #END CALLING FUNCTION
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Upload Envelope Questions <i class="fas fa-folder-open"></i></strong>
                            </h2><br>
                        </div>
                        <div class="body">
                            <form action="view-envelope.php" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="row clearfix">
                                <?php
                                    if ($qsn_no != 0 && $env_no != 0) {
                                        $i = 1;
                                        while ($i <= $qsn_no) {
                                            print"<div class='col-lg-4 col-md-6 col-sm-6'>
                                                <div class='form-group form-float'>
                                                    <div class='form-line focused select-padding'>
                                                        <input type='file' class='form-control' name='picture".$i."' required/>
                                                        <label class='form-label active'>Question ".$i."</label>
                                                    </div>
                                                </div>
                                            </div>";
                                            $i+=1;
                                        }
                                    }

                                ?>
                                    
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <input type="hidden" class="form-control" name="addedDate" value="<?php echo time(); ?>" required/>
                                        <?php
                                        if ($qsn_no >= 1 && $env_no >= 1) {
                                           print "<input type='hidden' value='".$env_no."' name='envelope_id'>
                                           <input type='hidden' value='".$qsn_no."' name='count'>
                                           <input type='hidden' value='".time()."' name='addedDate'>
                                           <button type='submit' name='addquestion' class='btn btn-primary waves-effect btn-hover color-8'><i class='fa fa-save'></i> Save</button>";
                                        }
                                        ?>
                                    </div>
                                    <?php
                                        if ($qsn_no == 0) {
                                            print"<div id=\"ifr\" class='ifr'>
                                            <div class=\"col-md-12\">
                                                <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                                        <span aria-hidden=\"true\">&times;</span>
                                                    </button>
                                                    <center><strong class=\"\"> Sorry! There is no setting for this envelope <i class='fa fa-warning'></i></strong></center>
                                                </div>
                                            </div>
                                        </div>";
                                        }

                                        if ($env_no == 0) {
                                           print "<div id=\"ifr\" class='ifr'>
                                            <div class=\"col-md-12\">
                                                <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                                        <span aria-hidden=\"true\">&times;</span>
                                                    </button>
                                                    <center><strong class=\"\"> Sorry! There is no selected envelope <i class='fa fa-warning'></i></strong></center>
                                                </div>
                                            </div>
                                        </div>";
                                        }
                                        ?>
                                </div>
                            </form>
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