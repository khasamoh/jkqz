<?php
include 'session.php';
include "class/setting.php";
$call = new Setting();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>JKQZ - MARKING COLUMN</title>
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
                                <a href="view-column.php">
                                    <i class="fas fa-home"></i> Marking Column</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <?php
                    #START INCLUDE MODAL
                    include"modal/add-column-modal.php";
                    #END INCLUDE MODAL


                    #START CALLING FUNCTION ON SUBMIT BUTTON CLICKED
                    if (isset($_POST['addColumn'])) {
                        $call->addColumn($_SESSION['jkqz_id']);
                    }
                    #END CALLING FUNCTION
                ?>                
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <button class='btn btn-success open-modal m-b-5' title='Add New Compertition' data-toggle='modal' data-target='#addColumnModal'><i class="fas fa-grip-horizontal"></i> Add Column</button>
                        </div>
                        <div class="body">
                            <?php $call->markingColumn(); ?>
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


function tempID(value1, value2){
    document.getElementById("uid").value = value1;
    document.getElementById("uname").innerHTML = value2;
}



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
                           <option>jaji hifdhi</option>\
                           <option>jaji makharij</option>\
                           <option>jaji tajwid</option>\
                           <option>jaji tashjii</option>\
                           <option>jaji kiongozi</option>\
                           <option>mudiru</option>\
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
});
</script>
</body>
</html>