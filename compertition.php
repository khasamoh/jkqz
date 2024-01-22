<?php
include 'session.php';
include 'class/user.php';
$call = new User();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ | COMPERTITION</title>
    <?php include "head.php"; ?>
</head>
<style type="text/css">
    .test{
        box-shadow: inset 0px 10px 20px -10px;
        border-left: 3px solid #07071247;
        border-top: 3px solid #07071247;
        border-right: 3px solid #07071247;
        border-top-left-radius: 11px;
        border-top-right-radius: 11px;
        margin-bottom: 1.5px;
    }
    .theme-blue .nav-tabs>li>a:before{
        border-bottom: none;
    }

    .theme-blue .noborder .test{
        .border-bottom: none;
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
                                <a href="compertition.php">
                                    <i class="fas fa-home"></i> All Compertition</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <?php
                    #START INCLUDE MODAL
                    include"modal/add-compertition-wizard-modal.php";
                    include"modal/add-compertition-modal.php";
                    include"modal/import-setting-modal.php";
                    #END INCLUDE MODAL


                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED
                    if (isset($_POST['addCompertitionWizard'])) {
                        $call->addCompertitionWizard($_SESSION['jkqz_id']);
                    }
                    if (isset($_POST['addCompertition'])) {
                        $call->addCompertition($_SESSION['jkqz_id']);
                    }
                    if (isset($_POST['active'])) {
                        $call->makeActiveCompertition($_POST['id']);
                    }
                    if (isset($_POST['importSetting'])) {
                        $call->importSetting($_SESSION['jkqz_id']);
                    }
                    #END CALLING FUNCTION
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button class='btn btn-success open-modal m-b-5' title='Add Compertition' data-toggle='modal' data-target='#addCompertitionModal'><i class="fas fa-code-branch"></i> Compertition</button>
                            <button class='btn btn-success open-modal m-b-5' title='Add Compertition Wizard' data-toggle='modal' data-target='#addCompertitionWizard'><i class="fas fa-sitemap"></i> Compertition Wizard</button> 
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="tableExport" class="table table-hover table-bordered">
                                    <thead>
                                        <th>Compertition Name</th>
                                        <th class='center'>Address</th>
                                        <th class='center'>Date</th>
                                        <th class='center'>Status</th>
                                        <th class='center'>More</th>
                                    </thead>
                                    <tbody>
                                        <?php $call->fetchCompertition(); ?>
                                    </tbody>
                                    <tfoot>
                                        <th>Compertition Name</th>
                                        <th class='center'>Address</th>
                                        <th class='center'>Date</th>
                                        <th class='center'>Status</th>
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
function importSetting(value1, value2){
    document.getElementById("toId").value = value1;
    document.getElementById("name").value = value2;
}

$(function() {
    $('#tab1').click(function (e) {
        var tab1 = document.getElementById('tab1');
        tab1.classList.add('test');
        tab2.classList.remove('test');
        tab3.classList.remove('test');
      });

    $('#tab2').click(function (e) {
        var tab2 = document.getElementById('tab2');
        tab2.classList.add('test');
        tab1.classList.remove('test');
        tab3.classList.remove('test');
      });

    $('#tab3').click(function (e) {
        var tab3 = document.getElementById('tab3');
        tab3.classList.add('test');
        tab1.classList.remove('test');
        tab2.classList.remove('test');
      });
});

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



$(document).ready(function() {
    $(document).on('click', '.remove-column-row', function(){
            $(this).closest('.column-form').remove();
    });

    $(document).on('click', '.add-column-row', function(){
        
        $('.column-row').append('<div class="column-form"><hr/><div class="row clearfix">\
            <div class="col-sm-6 col-md-4 col-lg-2">\
                <div class="form-group form-float m-t-30">\
                    <div class="form-line focused">\
                        <input type="text" class="form-control" name="columnName[]" required />\
                        <label class="form-label active">Column Name *</label>\
                    </div>\
                </div>\
            </div>\
            <div class="col-sm-6 col-md-4 col-lg-2">\
                <div class="form-group form-float m-t-30">\
                    <div class="form-line focused">\
                        <input type="number" class="form-control" value="1" name="columnMark[]" required />\
                        <label class="form-label active">Column Mark *</label>\
                    </div>\
                </div>\
            </div>\
            <div class="col-sm-6 col-md-4 col-lg-3">\
                <div class="form-group form-float">\
                    <div class="form-line">\
                        <textarea class="form-control" name="columnTitle[]"></textarea>\
                        <label class="form-label">Column Title</label>\
                    </div>\
                </div>\
            </div>\
            <div class="col-sm-6 col-md-4 col-lg-2">\
                <div class="form-group form-float">\
                <label class="form-label">Sequence</label>\
                    <div class="form-line default-select select2Style">\
                        <select class="form-control mySelect" name="columnSequence[]" data-placeholder="Select">\
                           <?php for ($i=1; $i <= 15; $i++) { print"<option>".$i."</option>";} ?>\
                        </select>\
                    </div>\
                </div>\
            </div>\
            <div class="col-sm-6 col-md-4 col-lg-2">\
                <div class="form-group form-float">\
                <label class="form-label">Accessed</label>\
                    <div class="form-line default-select select2Style select-padding">\
                        <select class="form-control mySelect" name="columnPrivellege[]" data-placeholder="Select">\
                           <?php $call->fetchPrivellegeOption(); ?>\
                        </select>\
                    </div>\
                </div>\
            </div>\
            <div class="col-sm-6 col-md-4 col-lg-1">\
                <a href="javascript:void(0)" style="color:red" class="float-right m-t-30 remove-column-row">\
                    <i class="material-icons">remove_circle_outline</i>\
                </a>\
            </div>\
        </div>\
        </div>');
        $('.mySelect').select2();
       
    });

    $(document).on('click', '.add-column-row', function(){
    var options = '';
    for (var i = 1; i <= 15; i++) {
        options += '<option>' + i + '</option>';
    }
   
});
    
});
</script>
</body>
</html>