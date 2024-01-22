<?php
include "session.php";
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Online Capital Mobilization</title>
  <?php include "favicon.php"; ?>
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="components/font-awesome/css/font-awesome.min.css">
  <!-- custom -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/AdminLTE.min.css">
</head>
<body class="skin-act sidebar-mini fixed">
<div id="loader"></div>
<div class="wrapper">
  <!-- top navigation -->
  <header class="main-header">
    <?php include "top-nav.php"; ?>
  </header>
  <!-- /.top navigation -->

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <?php include "sidebar.php"; ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
     <div class="panel panel-default">
        <div class="panel-heading align-right">
          <div class="text-size">
            <i class="fa fa-warning"></i> Access Denied
          </div>
        </div>
        <div class="panel-body">
          <div class="row">
            <?php
                    print " <div id=\"ifr\">
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Sorry! You don't have permission to access this page <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";


?>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

   <!-- footer-->
  <?php include "footer.php"; ?>
  <!-- end footer -->
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="components/jquery/dist/jquery.min.js"></script>
<script src="components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="js/adminlte.min.js"></script>
<!-- page script -->
<script>
 $(function () {
    $('#data').DataTable();
  });

  $(document).ready(function() {
    var userid = "<?php echo $_SESSION['id'] ?>";
     $.post('update-content.php',{
      userid: userid
     },function(data){
     
     });
    setInterval(function(){
      var userid = "<?php echo $_SESSION['id'] ?>";
     $.post('update-content.php',{
      userid: userid
     },function(data){
     
     });
   },10000);
});
</script>
</body>
</html>