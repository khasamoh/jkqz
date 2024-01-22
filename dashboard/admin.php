<?php
include 'class/audience.php';
$call = new Audience();
?>

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

<div class="row">
    <div class="col-lg-3 col-sm-6 m-b-30">
        <a href="view-participant.php?type=hifdhi">
            <div class="support-box text-center color-6 btn-hover">
                <div class="text m-b-30">
                    <h5>Hifdhi Participant</h5>
                </div>
                <h3 class="m-b-0"><?php print $call->countParticipant('hifdhi'); ?>
                    <i class="material-icons">assignment_ind</i>
                </h3>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-sm-6 m-b-30">
        <a href="view-participant.php?type=tashjii">
            <div class="support-box text-center color-6 btn-hover">
                <div class="text m-b-30">
                    <h5>Tashjii Participant</h5>
                </div>
                <h3 class="m-b-0"><?php print $call->countParticipant('tashjii'); ?>
                    <i class="material-icons">assignment_ind</i>
                </h3>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-sm-6 m-b-30">
        <a href="view-envelope.php?type=hifdhi">
            <div class="support-box text-center color-6 btn-hover">
                <div class="text m-b-30">
                    <h5>Hifdhi Envelope</h5>
                </div>
                <h3 class="m-b-0"><?php print $call->countEnvelope('hifdhi'); ?>
                    <i class="material-icons">perm_media</i>
                </h3>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-sm-6 m-b-30">
        <a href="view-envelope.php?type=tashjii">
            <div class="support-box text-center color-6 btn-hover">
                <div class="text m-b-30">
                    <h5>Tashjii Envelope</h5>
                </div>
                <h3 class="m-b-0"><?php print $call->countEnvelope('tashjii'); ?>
                    <i class="material-icons">perm_media</i>
                </h3>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-sm-6 m-b-30">
        <a href="view-user.php">
            <div class="support-box text-center color-6 btn-hover">
                <div class="text m-b-30">
                    <h5>Total User</h5>
                </div>
                <h3 class="m-b-0"><?php print $call->countUser(); ?>
                    <i class="material-icons">face</i>
                </h3>
            </div>
        </a>
    </div>
    
    <div class="col-lg-3 col-sm-6 m-b-30">
        <a href="view-online-user.php">
            <div class="support-box text-center color-6 btn-hover">
                <div class="text m-b-30">
                    <h5>Active User</h5>
                </div>
                 <h3 class="m-b-0"><?php print $call->countActiveUser(); ?>
                    <i class="material-icons">power_settings_new</i>
                </h3>
            </div>
        </a>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="header">
                <h2><strong>Active</strong> Participant</h2>
            </div>
            <div class="tableBody">
                <div class="">
                    <?php $call->jajiKiongoziDashboard(); ?>
                </div>
            </div>
        </div>
    </div>


</div>