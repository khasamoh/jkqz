<script type="text/javascript">

function showOverlay() {
  div = document.getElementById('overlay');
  div.style.display = "none";
}

$(document).ready(function() {
  var uid = 0;
     $.post('send-user-log.php',{
      audience: uid
     },function(data){
      uid = data;
     });

    setInterval(function(){
     $.post('send-user-log.php',{
      audience: uid
     },function(data){
      if (uid != data) {
          window.location = 'home.php';
        }
     });
   },2000);


  var eid = 0;
     $.post('send-user-log.php',{
      code: eid
     },function(data){
      eid = data;
      $("#button").modal("show"); /*#hide ayah to audience by opening envelope no modal*/
     });

    setInterval(function(){
     $.post('send-user-log.php',{
      code: eid
     },function(data){
      if (eid != data) {
          window.location = 'home.php';
        }
     });
   },2000);
});
</script>   