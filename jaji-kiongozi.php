<?php
include 'session.php';
include "class/audience.php";
$call = new Audience();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ | JAJI KIONGOZI</title>
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
            <div class="row clearfix">
                <?php
                    #START INCLUDE MODAL
                    include"modal/finish-participant-modal.php";
                    include"modal/deactivate-participant-modal.php";
                    include"modal/view-ayah-modal.php";
                    #END INCLUDE MODAL


                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED
                        if (isset($_POST['selectParticipant'])) {
                            $call->selectParticipant();
                        }
                        if (isset($_POST['finishParticipant'])) {
                            $call->finishParticipant();
                        }
                        if (isset($_POST['deactivateParticipant'])) {
                            $call->deactivateParticipant();
                        }
                        if (isset($_POST['show'])) {
                            $call->settingActiveType($_POST['val']);
                        }
                    #END CALLING FUNCTION
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Active</strong> Participant</h2>
                        </div>
                        <div class="body">
                            <?php $call->jajiKiongoziDashboard(); ?>
                        </div>
                    </div>
                </div>

            </div>
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