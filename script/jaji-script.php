<script type="text/javascript">
$(document).ready(function() {
	var eid = 0;
     $.post('send-user-log.php',{
      code: eid
     },function(data){
     	eid = data;
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