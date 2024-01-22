<?php
include "session.php";
include "class/jaji.php";
$call = new Jaji();

if (isset($_POST['setting_question_id'])) {
	$call->updateJajiData();
}
?>