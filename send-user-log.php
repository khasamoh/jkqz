<?php
include "session.php";
include "class/authentication.php";
include "class/audience.php";
$call = new Authentication();
$call1 = new Audience();

#update user logs
if (isset($_POST['log_id'])) {
	$userid = $_POST['userid'];
	$log_id = $_POST['log_id'];
	$call->updateUserLog($userid, $log_id);
}

#user auto refresh page on change privellege
if (isset($_POST['privellege'])) {
	$prv = $_POST['privellege'];
	$userid = $_POST['userid'];
	echo $call->checkTempPrivellege($userid, $prv);
}

#users(jaji) auto refresh page on changes happen
if (isset($_POST['code'])) {
	echo $call1->checkSelectedEnvelope();
}

#envelope auto refresh page on changes happen
if (isset($_POST['env'])) {
	echo $call1->checkActiveParticipant();
}

#audience auto refresh page on changes happen
if (isset($_POST['audience'])) {
	echo $call1->showAudience();
}
?>