<?php
include 'session.php';
include "class/setting.php";
$call = new Setting();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ | ENVELOPE QUESTION</title>
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
                                <a href="envelope-question.php">
                                    <i class="fas fa-home"></i> Envelope Question</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
               <?php
                    #START INCLUDE MODAL
                    include"modal/add-questions-modal.php";
                    #END INCLUDE MODAL


                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED
                    if (isset($_POST['addEnvelopeQuestion'])) {
                        $call->addEnvelopeQuestion($_SESSION['jkqz_id']);
                    }
                    #END CALLING FUNCTION
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button class='btn btn-success open-modal' title='Add Setting' data-toggle='modal' data-target='#addQuestionsModal'><i class="fa fa-cube"></i> Add Envelope Question</button>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tableExport" class="table table-hover table-bordered">
                                    <thead>
                                        <th class='center'>Juzuu</th>
                                        <th class='center'>Type</th>
                                        <th class='center'>No_of_Question</th>
                                        <th class='center'>More</th>
                                    </thead>
                                    <tbody>
                                        <?php $call->fetchEnvelopeQuestion(); ?>
                                    </tbody>
                                    <tfoot>
                                        <th class='center'>Juzuu</th>
                                        <th class='center'>Type</th>
                                        <th class='center'>No_of_Question</th>
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
function eID(value1, value2, value3){
    document.getElementById("iId").value = value1;
    document.getElementById("name").value = value2;
    document.getElementById("location").value = value3;
}

function dID(value1, value2){
    document.getElementById("did").value = value1;
    document.getElementById("dname").innerHTML = value2;
}

$(document).ready(function() {
    $(document).on('click', '.remove-question-row', function(){
            $(this).closest('.question-form').remove();
    });

    $(document).on('click', '.add-question-row', function(){
        $('.question-row').append('<div class="question-form"><hr/><div class="row clearfix">\
             <div class="col-sm-4">\
                <div class="form-group form-float">\
                <label class="form-label">Hifdhi Type</label>\
                    <div class="form-line default-select select2Style select-padding">\
                        <select class="form-control mySelect" name="type[]" data-placeholder="Select">\
                           <option value="hifdhi">Hifdhi</option>\
                           <option value="tashjii">Tashjii</option>\
                        </select>\
                    </div>\
                </div>\
            </div>\
            <div class="col-sm-3">\
                <div class="form-group form-float">\
                <label class="form-label">Juzuu</label>\
                    <div class="form-line default-select select2Style select-padding">\
                        <select class="form-control mySelect" name="juzuu[]" data-placeholder="Select">\
                            <?php for ($i=1; $i <= 30; $i++) { print"<option>".$i."</option>";} ?>\
                        </select>\
                    </div>\
                </div>\
            </div>\
            <div class="col-sm-4 col-xs-8">\
                <div class="form-group form-float">\
                <label class="form-label">No_of_Questions</label>\
                    <div class="form-line default-select select2Style">\
                        <select class="form-control mySelect" name="question[]" data-placeholder="Select">\
                           <?php for ($i=1; $i <= 30; $i++) { print"<option>".$i."</option>";} ?>\
                        </select>\
                    </div>\
                </div>\
            </div>\
            <div class="col-sm-1 col-xs-4">\
                <a href="javascript:void(0)" style="color:red" class="float-right m-t-30 remove-question-row">\
                    <i class="material-icons">remove_circle_outline</i>\
                </a>\
            </div>\
        </div>');
        $('.mySelect').select2();
    });
});
</script>
</body>
</html>