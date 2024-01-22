<script src="assets/js/app.min.js"></script>
<!--<script src="assets/js/chart.min.js"></script>-->
<!-- Custom Js -->
<script src="assets/js/admin.js"></script>
<script src="assets/js/pages/sparkline/sparkline-data.js"></script>
<script src="assets/js/pages/medias/carousel.js"></script>
<script src="assets/js/pages/forms/basic-form-elements.js"></script>
<script src="assets/js/pages/forms/form-wizard.js"></script>
<script src="assets/js/pages/forms/advanced-form-elements.js"></script>
<script src="assets/js/form.min.js"></script>
<script src="assets/js/bundles/multiselect/js/jquery.multi-select.js"></script>
<script src="assets/js/pages/ui/dialogs.js"></script>
<script src="assets/js/pages/tables/jquery-datatable.js"></script>
<script src="assets/js/table.min.js"></script>
<script src="assets/js/bundles/export-tables/dataTables.buttons.min.js"></script>
<script src="assets/js/bundles/export-tables/buttons.flash.min.js"></script>
<script src="assets/js/bundles/export-tables/jszip.min.js"></script>
<script src="assets/js/bundles/export-tables/pdfmake.min.js"></script>
<script src="assets/js/bundles/export-tables/vfs_fonts.js"></script>
<script src="assets/js/bundles/export-tables/buttons.html5.min.js"></script>
<script src="assets/js/bundles/export-tables/buttons.print.min.js"></script>
<script src="assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script>
<!-- End Custom Js -->
<?php
$jkqz_id = $_SESSION['jkqz_id'];
$jkqz_log_id = $_SESSION['jkqz_log_id'];
$jkqz_privellege = $_SESSION['jkqz_privellege'];
?>
<script type="text/javascript">
var userid = "<?php echo $jkqz_id ?>";
var log_id = "<?php echo $jkqz_log_id ?>";

function updateJajiData(id){
  $.post('update-data.php',{
      setting_question_id: id,
      value: document.getElementById(id).value
    },function(data){});
}

$(document).ready(function() {
     $.post('send-user-log.php',{
      userid: userid,
      log_id: log_id
     },function(data){});

    setInterval(function(){
     $.post('send-user-log.php',{
      userid: userid,
      log_id: log_id
     },function(data){});
   },2000);
});

$(document).ready(function() {
    setInterval(function(){
      var privellege = "<?php echo $jkqz_privellege ?>";
     $.post('send-user-log.php',{
      userid: userid,
      privellege: privellege
     },function(data1){
       if (privellege != data1) {
        window.location.href = "home.php";
       }
     });
   },2000);
});

function printArea(area){
    var printContents = document.getElementById(area).innerHTML;
    var orginalContent = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = orginalContent;
  }
</script>