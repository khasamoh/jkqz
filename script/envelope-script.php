<script type="text/javascript">
$(document).ready(function() {
  var uid = 0;
     $.post('send-user-log.php',{
      env: uid
     },function(data){
      uid = data;
     });

    setInterval(function(){
     $.post('send-user-log.php',{
      env: uid
     },function(data){
      if (uid != data) {
          window.location = 'envelope.php';
        }
     });
   },2000);
});

</script>