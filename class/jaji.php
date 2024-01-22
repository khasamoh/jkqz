<?php
require_once 'connection.php';

    #START CLASS
class Jaji{

    function jajiKiongoziDashboard(){
       if (($this->checkActiveParticipant()) == 0) {
            $this->fetchWaitingParticipant();
        }else{
            $this->showActiveParticipant();
        }
    }




	function fetchWaitingParticipant(){
        global $connect;

        $query1 =  $connect->prepare("SELECT * FROM tbl_setting WHERE setting_name = ? AND setting_status = ?");
        $query1->bind_param('ss', $name, $status1);
        $status1 = "active";
        $name = "active_type";
        $query1->execute();
        $result1 = $query1->get_result();
        $activetype = "hifdhi";

        if ($query1->affected_rows >= 1) {
            $row1 = mysqli_fetch_assoc($result1);
            if ($row1['setting_value1'] == 'hifdhi') {
                print"<center>
                    <form action='' method='post'>
                    <input type='hidden' value='tashjii' name='val'>
                    <button class='btn btn-info' name='show'>Show Tashjii Participant</button>
                    </form>
                </center>
                <h2>Hifdhi participant list</h2>";
            }else{
                $activetype = "tashjii";
                print"<center>
                    <form action='' method='post'>
                    <input type='hidden' value='hifdhi' name='val'>
                    <button class='btn btn-info' name='show'>Show Hifdhi Participant</button>
                    </form>
                </center>
                <h2>Tashjii participant list</h2>";
            }
        }else{
            print"<center>
                    <form action='' method='post'>
                    <input type='hidden' value='tashjii' name='val'>
                    <button class='btn btn-info' name='show'>Show Tashjii Participant</button>
                    </form>
                </center>
                <h2>Hifdhi participant list</h2>";
        }
        print"<div class='table-responsive'>
                <table id='tableExport' class='table table-hover table-bordered'>
                    <thead>
                        <th>Full Name</th>
                        <th class='center'>Age</th>
                        <th class='center'>Gender</th>
                        <th class='center'>Juzuu</th>
                        <th class='center'>Type</th>
                        <th class='center'>Country</th>
                        <th class='center'>Select</th>
                    </thead>
                    <tbody>";


        $query =  $connect->prepare("SELECT * FROM tbl_participant, tbl_compertition WHERE tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_participant.participant_status = ? AND tbl_compertition.compertition_status = ? AND tbl_participant.participant_type = ?");
        $query->bind_param('sss', $waiting, $status, $activetype);
        $status = "active";
        $waiting = "waiting";
        $query->execute();
        $result = $query->get_result();

        if ($query->affected_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $bday = new DateTime($row['participant_dob']); // Your date of birth
                $today = new Datetime(date('y-m-d'));
                $diff = $today->diff($bday);

                print"<tr>
                    <td>".$row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname']."</td>
                    <td class='center'>";
                    if (empty($row['participant_dob'])) {
                        print "---";
                    }else{
                        if ($diff->y > 1) {
                           print $diff->y." years";
                        }else{
                            print $diff->y." year";
                        }
                    }
                    print"</td>
                    <td class='center'>".$row['participant_gender']."</td>
                    <td class='center'>".$row['participant_juzuu']."</td> 
                    <td class='center'>".$row['participant_type']."</td> 
                    <td class='center'>".$row['participant_country']."</td>
                    <td class='center'>
                        <form action='' method='post'>
                            <input type='hidden' class='form-control' value='".$row['participant_id']."' name='participant_id'/>
                            <button type='submit' class='btn btn-info' name='selectParticipant'>select</button>
                        </form>
                    </td>
                </tr>";
            }
        }
        print"</tbody>
            <tfoot>
                <th>Full Name</th>
                <th class='center'>Age</th>
                <th class='center'>Gender</th>
                <th class='center'>Juzuu</th>
                <th class='center'>Type</th>
                <th class='center'>Country</th>
                <th class='center'>Select</th>
            </tfoot>
        </table>
        </div>";
        $query->close();
    }





    function selectParticipant(){
        global $connect;
        
        if ($this->checkActiveParticipant() == 0) {
            $query =  $connect->prepare("UPDATE tbl_participant SET participant_status = ? WHERE participant_id = ?");
            $query->bind_param('ss', $status, $participant_id);
            $status = "active";
            $participant_id = $_POST['participant_id'];
            $query->execute();
            $result = $query->get_result();

             if ($query->affected_rows >= 1) {
                    print "<div id=\"ifr\" class='ifr ifr-hide'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> Participant has been selected <i class='fa fa-check'></i></strong></center>
                                </div>
                            </div>
                        </div>";
                }else{
                    print " <div id=\"ifr\" class='ifr ifr-hide'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> Failed to select participant <i class='fas fa-exclamation-triangle'></i></strong></center>
                                </div>
                            </div>
                        </div>";
                }
            $query->close();
        }else{
            print " <div id=\"ifr\" class='ifr ifr-hide'>
                <div class=\"col-md-12\">
                    <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        <center><strong class=\"\"> Sorry! another participant is active <i class='fas fa-exclamation-triangle'></i></strong></center>
                    </div>
                </div>
            </div>";
        }
        
    }





    function checkActiveParticipant(){
        global $connect;
        $query =  $connect->prepare("SELECT * FROM tbl_participant, tbl_compertition WHERE tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_participant.participant_status = ? AND tbl_compertition.compertition_status = ?");
        $query->bind_param('ss', $status, $status);
        $status = "active";
        $query->execute();
        $result = $query->get_result();
        return mysqli_num_rows($result);
        $query->close();
    }






    function checkSelectedParticipant(){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_participant, tbl_compertition WHERE tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_participant.participant_status = ? AND tbl_compertition.compertition_status = ?");
        $query->bind_param('ss', $status, $status);
        $status = "active";
        $query->execute();
        $result = $query->get_result();

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['participant_id'];
        }else{
            return 0;
        }

        $query->close();
    }






    function checkSelectedEnvelope(){
        global $connect;
        
        if (($this->checkSelectedParticipant()) > 0) {
            $query =  $connect->prepare("SELECT * FROM tbl_envelope WHERE envelope_status = ?");
            $query->bind_param('s', $status);
            $status = "active";
            $query->execute();
            $result = $query->get_result();

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                return $row['envelope_id'];
            }else{
                return 0;
            }
            $query->close();
        }else{
            return 0;
        }
        
    }






    function showActiveParticipant(){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_participant, tbl_compertition WHERE tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_participant.participant_status = ? AND tbl_compertition.compertition_status = ?");
        $query->bind_param('ss', $status, $status);
        $status = "active";
        $query->execute();
        $result = $query->get_result();
        $row = mysqli_fetch_assoc($result);

        $envelope_id = 0;
        $participant_id = 0;

        $bday = new DateTime($row['participant_dob']); // Your date of birth
        $today = new Datetime(date('y-m-d'));
        $diff = $today->diff($bday);

        if (mysqli_num_rows($result) > 0) {
            $participant_id = $row['participant_id'];

            $query1 =  $connect->prepare("SELECT * FROM tbl_participant, tbl_envelope, tbl_participant_envelope WHERE tbl_participant.participant_id = tbl_participant_envelope.participant_id AND tbl_envelope.envelope_id = tbl_participant_envelope.envelope_id  AND tbl_envelope.envelope_status = ? AND tbl_participant.participant_id = ?");
            $query1->bind_param('si', $status, $participant_id);
            $status = "active";
            $query1->execute();
            $result1 = $query1->get_result();
            
            if (mysqli_num_rows($result1) > 0) {
                $row1 = mysqli_fetch_assoc($result1);
                $envelope_id = $row1['envelope_id'];
                $query1->close();
            }
            print"<div class='row'>
                <div class='col-md-3 center'>
                    <table class='table table-bordered'>
                        <thead>
                            <th class='center'>PICTURE</th>
                        </thead>
                        <tr>
                            <td class='center'>
                                <img class='img-responsive img' alt='img loading...' src='";
                                    if (empty($row['participant_image'])) {
                                        print "assets/images/system/male.jpg";
                                    }else{
                                        print $row['participant_image'];
                                    }
                                    print"'/>
                            </td>
                        </tr>
                    </table>";
                    if ($_SESSION['jkqz_privellege'] == "admin" || $_SESSION['jkqz_privellege'] == "jaji kiongozi") {
                        print"<button class='btn btn-danger col-md-12 open-modal' data-toggle='modal' data-target='#deactivateParticipantModal' onclick='dID(".$participant_id.", ".$envelope_id.")'>Deactivate <i class='fas fa-recycle'></i>
                    </button>";
                    }
                    
                print"</div>

                <div class='";
                if ($_SESSION['jkqz_privellege'] == "admin" || $_SESSION['jkqz_privellege'] == "jaji kiongozi") {
                    print"col-md-6";
                }else{
                     print"col-md-9";
                }
                print"'>
                    <table class='table table-bordered'>
                        <thead>
                            <th class='center'>PARTICIPANT INFORMATION</th>
                        </thead>
                            <tr>
                                <td>
                    <div class='row clearfix'>
                        <div class='col-xl-6 col-lg-6 col-md-12 animate m-t-40'>
                            <div class='form-group form-float'>
                                <div class='form-line'>
                                    <input type='text' class='form-control upper-audience' value='".$row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname']."' readonly/>
                                    <label class='form-label label-audience'>Full Name</label>
                                </div>
                            </div>
                        </div>
                        <div class='col-xl-6 col-lg-6 col-md-12 animate m-t-40'>
                            <div class='form-group form-float'>
                                <div class='form-line'>
                                    <input type='text' class='form-control upper-audience' value='".$row['participant_gender']."' readonly/>
                                    <label class='form-label label-audience'>Gender</label>
                                </div>
                            </div>
                        </div>
                        <div class='col-xl-6 col-lg-6 col-md-12 animate m-t-40'>
                            <div class='form-group form-float'>
                                <div class='form-line'>
                                    <input type='text' class='form-control upper-audience' value='".$row['participant_juzuu']."' readonly/>
                                    <label class='form-label label-audience'>Juzuu</label>
                                </div>
                            </div>
                        </div>
                        <div class='col-xl-6 col-lg-6 col-md-12 animate m-t-40'>
                            <div class='form-group form-float'>
                                <div class='form-line'>
                                    <input type='text' class='form-control upper-audience' value='".$row['participant_type']."' readonly/>
                                    <label class='form-label label-audience'>Type</label>
                                </div>
                            </div>
                        </div>
                        <div class='col-xl-6 col-lg-6 col-md-12 animate m-t-40'>
                            <div class='form-group form-float'>
                                <div class='form-line'>
                                    <input type='text' class='form-control upper-audience' value='";
                                    if (empty($row['participant_dob'])) {
                                        print "---";
                                    }else{
                                        if ($diff->y >= 2) {
                                           print $diff->y." years";
                                        }else{
                                            print $diff->y." year";
                                        }
                                    }
                                    print"' readonly/>
                                    <label class='form-label label-audience'>Age</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class='col-xl-6 col-lg-6 col-md-12 animate m-t-40'>
                            <div class='form-group form-float'>
                                <div class='form-line'>
                                    <input type='text' class='form-control upper-audience' value='";
                                    if (empty($row['participant_country'])) {
                                        print "---";
                                    }else{
                                        print $row['participant_country'];
                                    }
                                    print"' readonly/>
                                    <label class='form-label label-audience'>Country</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    </td>
                    </tr>
                    </table>
                </div>";
                if ($_SESSION['jkqz_privellege'] == "admin" || $_SESSION['jkqz_privellege'] == "jaji kiongozi") {
                    print"<div class='col-lg-3 col-md-4'>
                    <table class='table table-bordered'>
                        <thead>
                            <th class='center'>MORE OPTION</th>
                        </thead>
                        <tr>
                            <td>";
                            if ($envelope_id != 0) {
                                print"<button class='btn btn-success col-md-12 m-b-10 open-modal' name='ayah' data-toggle='modal' data-target='#viewAyah'>view Ayah <i class='fas fa-file-alt'></i></button>
                                <button class='btn btn-info col-md-12 m-b-10 open-modal' data-toggle='modal' data-target='#finishParticipantModal' onclick='fID(".$participant_id.", ".$envelope_id.")'>Finish <i class='fas fa-user-check'></i>
                                </button>";
                                }else{
                                    print"<center><h4><span class='label l-bg-purple shadow-style'>waiting <i class='fa fa-spinner fa-pulse'></i></span></h4></center>";
                            }
                    print"</td>
                        </tr>
                    </table>
                </div>";
                }
                
            print"</div>";
        }

        $query->close();
    }





    function updateJajiData(){
        global $connect;
        $value = $_POST['value'];
        $id = $_POST['setting_question_id'];
        $query = $connect->prepare("UPDATE tbl_setting_question SET value = ? WHERE setting_question_id = ?");
        $query->bind_param('ii', $value, $id);
        $query->execute();
        $query->close();
    }





    function finishParticipant(){
        global $connect;

        $participant_id = $_POST['participant_id'];
        $envelope_id = $_POST['envelope_id'];

        $query = $connect->prepare("UPDATE tbl_participant SET participant_status = ? WHERE participant_id = ?");
        $query->bind_param('si', $status, $participant_id);
        $status = "ready";
        $query->execute();

        if ($query->affected_rows > 0){
            $query1 = $connect->prepare("UPDATE tbl_envelope SET envelope_status = ? WHERE envelope_id = ?");
            $query1->bind_param('si', $status, $envelope_id);
            $status = "ready";
            $query1->execute();

            if ($query1->affected_rows >= 1) {
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Participant finished successul <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }else{
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Sorry! failed to finish envelope <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }
            $query1->close();
        }else{
            print "<div id=\"ifr\" class='ifr ifr-hide'>
                <div class=\"col-md-12\">
                    <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        <center><strong class=\"\"> Sorry! failed to finish participant <i class='fa fa-check'></i></strong></center>
                    </div>
                </div>
            </div>";
        }
        $query->close();
    }






    function deactivateParticipant(){
       global $connect;

        $participant_id = $_POST['participant_id'];
        $envelope_id = $_POST['envelope_id'];

        $query = $connect->prepare("UPDATE tbl_participant SET participant_status = ? WHERE participant_id = ?");
        $query->bind_param('si', $status, $participant_id);
        $status = "waiting";
        $query->execute();

        if ($query->affected_rows >= 1){
            if ($envelope_id != 0) {
                $query1 = $connect->prepare("UPDATE tbl_envelope SET envelope_status = ? WHERE envelope_id = ?");
                $query1->bind_param('si', $status, $envelope_id);
                $status = "waiting";
                $query1->execute();

                $query2 = $connect->prepare("SELECT tbl_question.question_id FROM tbl_question, tbl_envelope WHERE tbl_question.envelope_id = tbl_envelope.envelope_id AND tbl_envelope.envelope_id = ?");
                $query2->bind_param('i', $envelope_id);
                $query2->execute();
                $result2 = $query2->get_result();

                if (mysqli_num_rows($result2) >= 1) {
                    while($row = mysqli_fetch_assoc($result2)){
                        $query3 = $connect->prepare("DELETE FROM tbl_setting_question WHERE question_id = ?");
                        $query3->bind_param('i', $question_id);
                        $question_id = $row['question_id'];
                        $query3->execute();
                    }
                }                

                $query4 = $connect->prepare("DELETE FROM tbl_participant_envelope WHERE envelope_id = ? AND participant_id = ?");
                $query4->bind_param('ii', $envelope_id, $participant_id);
                $query4->execute();

                if ($query1->affected_rows >= 1) {
                    print "<div id=\"ifr\" class='ifr ifr-hide'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> Participant deactivated <i class='fa fa-check'></i></strong></center>
                                </div>
                            </div>
                        </div>";
                }else{
                    print "<div id=\"ifr\" class='ifr ifr-hide'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> Sorry! failed to deactivate participant <i class='fa fa-check'></i></strong></center>
                                </div>
                            </div>
                        </div>";
                }

            }else{
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                    <div class=\"col-md-12\">
                        <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                            <center><strong class=\"\"> Participant deactivated <i class='fa fa-check'></i></strong></center>
                        </div>
                    </div>
                </div>";
            }
        }
        
    }





    function settingActiveType($val){
        global $connect;
        
        $query3 =  $connect->prepare("SELECT * FROM tbl_compertition WHERE compertition_status = ?");
        $query3->bind_param('s', $status3);
        $status3 = "active";
        $query3->execute();
        $result3 = $query3->get_result();
        if (mysqli_num_rows($result3) > 0) {
            $row3 = mysqli_fetch_assoc($result3);
        }

        $query =  $connect->prepare("SELECT * FROM tbl_setting WHERE tbl_setting.setting_status = ? AND tbl_setting.setting_name = ?");
        $query->bind_param('ss', $status, $name);
        $status = "active";
        $name = "active_type";
        $query->execute();
        $result = $query->get_result();

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $query1 = $connect->prepare("UPDATE tbl_setting SET setting_value1 = ? WHERE  setting_id = ?");
            $query1->bind_param('si',$value, $id);
            $value = $val;
            $id = $row['setting_id'];
            $query1->execute();
        }else{
            $query2 = $connect->prepare("INSERT INTO tbl_setting (setting_name, setting_value1,setting_status, compertition_id) VALUES(?,?,?,?)");
            $query2->bind_param('sssi', $name1, $value, $status, $id);
            $status = "active";
            $name1 = "active_type";
            $value = $val;
            $id = $row3['compertition_id'];
            $query2->execute();
        }

        $query->close();
    }





    function generateJajiTableHead($questionId, $type, $userId = "all", $title = "", $participant_type = ""){
        global $connect;
        $query =  $connect->prepare("SELECT * FROM tbl_setting, tbl_compertition WHERE tbl_setting.compertition_id = tbl_compertition.compertition_id AND tbl_compertition.compertition_status = ? AND tbl_setting.setting_value5 = ? AND tbl_setting.setting_name = ? AND tbl_setting.setting_status = ? ORDER BY tbl_setting.setting_value3 ASC");
        $query->bind_param('ssss', $status, $type, $marking_column, $status);
        $status = "active";
        $marking_column = "marking_column";
        $query->execute();
        $result = $query->get_result();
        $column = mysqli_num_rows($result);
        $check = 1;
        print"<div class='table-responsive'>
            <table class='table table-bordered table-striped center'>
                <thead><tr><th class='upper center' colspan='20'>".$title."</th></tr>";
        if (mysqli_num_rows($result) > 0) {
            $ar_setting = $ar_userid = $ar_username = array();
            if ($userId == "all") {
                print"<td class='upper center' title='JAJI NAME' data-toggle='tooltip' data-original-title='JAJI NAME'>JAJI</td>";
            }
            if ($participant_type == "") {
                while($row = mysqli_fetch_assoc($result)){
                    array_push($ar_setting, $row['setting_id']);
                    print"<td class='upper center' title='".$row['setting_value4']." - alama (".$row['setting_value2'].")' data-toggle='tooltip' data-original-title='".$row['setting_value4']."'>".$row['setting_value1']."</td>";
                }
            }elseif ($participant_type == "tashjii") {
                if ($type == "jaji makharij") {
                    # no access to <thead>
                }elseif ($type == "jaji tajwid") {
                    # no access to <thead>
                }else{
                    while($row = mysqli_fetch_assoc($result)){
                        array_push($ar_setting, $row['setting_id']);
                        print"<td class='upper center' title='".$row['setting_value4']." - alama (".$row['setting_value2'].")' data-toggle='tooltip' data-original-title='".$row['setting_value4']."'>".$row['setting_value1']."</td>";
                    }
                }
            }else{
                if ($type == "jaji tashjii") {
                    # no access to <thead>
                }else{
                    while($row = mysqli_fetch_assoc($result)){
                        array_push($ar_setting, $row['setting_id']);
                        print"<td class='upper center' title='".$row['setting_value4']." - alama (".$row['setting_value2'].")' data-toggle='tooltip' data-original-title='".$row['setting_value4']."'>".$row['setting_value1']."</td>";
                    }
                }
            }
            print"</thead><tbody>";
          if ($userId == "all") {
                $query1 = $connect->prepare("SELECT tbl_user.user_id, tbl_user.username FROM tbl_privellege, tbl_user, tbl_setting_question, tbl_question WHERE tbl_privellege.privellege_id = tbl_user.privellege_id AND tbl_user.user_id = tbl_setting_question.user_id AND tbl_setting_question.question_id = tbl_question.question_id AND tbl_question.question_status <> ? AND tbl_privellege.privellege_option = ? AND tbl_question.question_id = ? ORDER BY tbl_user.user_id");
                $query1->bind_param('sss', $status1, $type, $questionId);
            }else{
                $query1 = $connect->prepare("SELECT tbl_user.user_id, tbl_user.username FROM tbl_privellege, tbl_user, tbl_setting_question, tbl_question WHERE tbl_privellege.privellege_id = tbl_user.privellege_id AND tbl_user.user_id = tbl_setting_question.user_id AND tbl_setting_question.question_id = tbl_question.question_id AND tbl_question.question_status <> ? AND tbl_privellege.privellege_option = ? AND tbl_question.question_id = ? AND tbl_setting_question.user_id = ? ORDER BY tbl_user.user_id");
                $query1->bind_param('ssss', $status1, $type, $questionId, $userId);
            }
            
            $status1 = "deleted";
            $status = "active";
            $query1->execute();
            $result1 = $query1->get_result();
            if (mysqli_num_rows($result1) > 0) {
                if ($participant_type == "") {
                    foreach ($result1 as $key => $value) {
                        $id = $value['user_id'];
                        if ($check != $id) {
                            array_push($ar_userid, $value['user_id']);
                            array_push($ar_username, $value['username']);
                            $check = $value['user_id'];
                        }
                    }
                    
                    if (count($ar_userid) > 0) {
                        for ($i=0; $i < count($ar_userid); $i++) {
                            $userid = $ar_userid[$i];
                            $username = $ar_username[$i];
                            print "<tr>";
                            if ($userId == "all") {
                                print "<td class='center upper'>".$username."</td>";
                            }
                            for($x=0; $x < $column; $x++){
                                $settingId = $ar_setting[$x];
                                $this->generateJajiTableData($settingId, $questionId, $userid);
                            }
                            Print "</tr>";
                        }
                    }

                }elseif ($participant_type == "tashjii") {
                    if ($type == "jaji makharij") {
                        # no access to <td>
                    }elseif ($type == "jaji tajwid") {
                        # no access to <td>
                    }else{
                        foreach ($result1 as $key => $value) {
                            $id = $value['user_id'];
                            if ($check != $id) {
                                array_push($ar_userid, $value['user_id']);
                                array_push($ar_username, $value['username']);
                                $check = $value['user_id'];
                            }
                        }
                        
                        if (count($ar_userid) > 0) {
                            for ($i=0; $i < count($ar_userid); $i++) {
                                $userid = $ar_userid[$i];
                                print "<tr>";
                                for($x=0; $x < $column; $x++){
                                    $settingId = $ar_setting[$x];
                                    $this->generateJajiTableData($settingId, $questionId, $userid);
                                }
                                Print "</tr>";
                            }
                        }
                    }
                }else{
                    if ($type == "jaji tashjii") {
                        # no access to <td>
                    }else{
                        foreach ($result1 as $key => $value) {
                            $id = $value['user_id'];
                            if ($check != $id) {
                                array_push($ar_userid, $value['user_id']);
                                array_push($ar_username, $value['username']);
                                $check = $value['user_id'];
                            }
                        }
                        
                        if (count($ar_userid) > 0) {
                            for ($i=0; $i < count($ar_userid); $i++) {
                                $userid = $ar_userid[$i];
                                print "<tr>";
                                for($x=0; $x < $column; $x++){
                                    $settingId = $ar_setting[$x];
                                    $this->generateJajiTableData($settingId, $questionId, $userid);
                                }
                                Print "</tr>";
                            }
                        }
                    }
                }   
            }else{
                if ($participant_type == "") {
                    //
                }elseif ($participant_type == "tashjii") {
                    if ($type == "jaji makharij") {
                        # no access to <thead>
                    }elseif ($type == "jaji tajwid") {
                        # no access to <thead>
                    }else{
                        for ($i=0; $i < $column; $i++) { 
                            $settingId = $ar_setting[$i];
                            $this->generateJajiTableData($settingId, $questionId, $userId);
                        }
                    }
                }else{
                    if ($type == "jaji tashjii") {
                        # no access to <thead>
                    }else{
                        for ($i=0; $i < $column; $i++) { 
                            $settingId = $ar_setting[$i];
                            $this->generateJajiTableData($settingId, $questionId, $userId);
                        }
                    }
                }
            }
        }
        print"</tbody></table></div>";  
        $query->close();
    }





    function generateJajiTableData($settingId, $questionId, $userId){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_setting_question WHERE setting_id = ? AND question_id = ? AND user_id = ?");
        $query->bind_param('iii', $settingId, $questionId, $userId);
        $query->execute();
        $result = $query->get_result();

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $setting_question_id = $row['setting_question_id'];
            print"<td>
                <input id='".$setting_question_id."' type='number' class='form-control mark center border' max='6' min='0' name='".$setting_question_id."' value='".$row['value']."' oninput='updateJajiData(\"".$setting_question_id."\")' required=''>
            </td>";
        }else{
            $query =  $connect->prepare("INSERT INTO `tbl_setting_question`(`setting_id`, `question_id`, `user_id`, `value`) VALUES(?,?,?,?)");
            $query->bind_param('iiii', $settingId, $questionId, $userId, $value);
            $value = 0;
            $query->execute();
            print"<script>window.location.href = 'home.php';</script>";
        }
        
        $query->close();
    }






    function fetchParticipantResults($envelope_id, $type){
        global $connect;
        
        $query =  $connect->prepare("SELECT tbl_participant.participant_fname, tbl_participant.participant_mname, tbl_participant.participant_lname, tbl_participant.participant_type, tbl_participant.participant_juzuu, tbl_envelope.envelope_number, tbl_envelope.envelope_juzuu, tbl_question.question_id, tbl_question.question_path  FROM tbl_participant, tbl_participant_envelope, tbl_envelope, tbl_question WHERE tbl_participant.participant_id = tbl_participant_envelope.participant_id AND tbl_participant_envelope.envelope_id = tbl_envelope.envelope_id AND tbl_envelope.envelope_id = tbl_question.envelope_id AND tbl_envelope.envelope_id = ? AND tbl_question.question_status <> ?");
        $query->bind_param('ss',$envelope_id, $status);
        $status = "deleted";
        $query->execute();
        $result = $query->get_result();
        
        if(mysqli_num_rows($result) > 0){
            $envelope_number = $envelope_juzuu = 0;
            $qsn  = 1;
            $count = mysqli_num_rows($result);
            if ($_SESSION['jkqz_privellege'] == 'audience') {
                print"<div id='overlay'></div>";
            }
            print "<ul class='nav nav-tabs' role='tablist'>";
            for($i=1; $i <= $count; $i++){
                print "<li role='presentation'>";
                if ($i == 1) {
                    print"<a href='#qs".$i."' data-toggle='tab' class='show active'>Qsn ".$i."</a>";
                }else{
                    print"<a href='#qs".$i."' data-toggle='tab' class=''>Qsn ".$i."</a>";
                }
                print "</li>";
            }

            print "</ul>
                <center><div class='tab-content'>";
                
            while($row = mysqli_fetch_assoc($result)){
                $title = $row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname']." (".$row['participant_type'].") - Envelope number ".$row['envelope_number'].", Juzuu ".$row['participant_juzuu'];
                if ($qsn == 1) {
                    print "<div role='tabpanel' class='tab-pane fade in active show' id='qs".$qsn."'>";
                }else{    
                    print "<div role='tabpanel' class='tab-pane fade in' id='qs".$qsn."'>";
                }
                print "<div class='sticky'>";
                    $this->generateJajiTableHead($row['question_id'], $type, "all", $title, null);
                    print"</div>
                        <img class='img-responsive max-width' src='".$row['question_path']."'/>
                    </div>";
                $qsn+=1;
            }
            print "</div>
            </center>";
        }
        $query->close();        
    }






    function countParticipant($type){
        global $connect;
        
        $query =  $connect->prepare("SELECT tbl_participant.participant_status FROM tbl_participant, tbl_compertition WHERE tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_participant.participant_status <> ? AND tbl_compertition.compertition_status = ? AND tbl_participant.participant_type = ?");
        $query->bind_param('sss', $status1, $status, $type);
        $status = "active";
        $status1 = "deleted";
        $query->execute();
        $result = $query->get_result();

        if (mysqli_num_rows($result) > 0) {
            $count = 0;
            foreach ($result as $key => $value) {
                if ($value['participant_status'] == 'ready') {
                    $count++;
                }
            }
            return $count."/".mysqli_num_rows($result);
        }else{
            return 0;
        }
        $query->close();
    }


    function countEnvelope($type){
        global $connect;
        
        $query =  $connect->prepare("SELECT tbl_envelope.envelope_status FROM tbl_envelope, tbl_compertition WHERE tbl_envelope.compertition_id = tbl_compertition.compertition_id AND tbl_envelope.envelope_status <> ? AND tbl_compertition.compertition_status = ? AND tbl_envelope.envelope_type = ?");
        $query->bind_param('sss', $status1, $status, $type);
        $status = "active";
        $status1 = "deleted";
        $query->execute();
        $result = $query->get_result();

        if (mysqli_num_rows($result) > 0) {
            $count = 0;
            foreach ($result as $key => $value) {
                if ($value['envelope_status'] == 'ready') {
                    $count++;
                }
            }
            return $count."/".mysqli_num_rows($result);
        }else{
            return 0;
        }
        $query->close();
    }



    function countUser(){
        global $connect;
        
        $query =  $connect->prepare("SELECT tbl_user.user_id FROM tbl_user, tbl_compertition WHERE tbl_user.compertition_id = tbl_compertition.compertition_id AND tbl_user.user_status = ? AND tbl_compertition.compertition_status = ?");
        $query->bind_param('ss', $status, $status);
        $status = "active";
        $query->execute();
        $result = $query->get_result();

        if (mysqli_num_rows($result) > 0) {
            return mysqli_num_rows($result);
        }else{
            return 0;
        }
        $query->close();
    }


    function judgedBy($envelope_id){
        global $connect;
        
        $query =  $connect->prepare("SELECT tbl_user.user_id, tbl_privellege.privellege_option FROM tbl_privellege, tbl_user, tbl_setting_question, tbl_question WHERE tbl_privellege.privellege_id = tbl_user.privellege_id AND tbl_user.user_id = tbl_setting_question.user_id AND tbl_setting_question.question_id = tbl_question.question_id AND tbl_question.question_status <> ? AND tbl_question.envelope_id = ? ORDER BY tbl_privellege.privellege_option");
        $query->bind_param('si', $deleted, $envelope_id);
        $deleted = "deleted";
        $query->execute();
        $result = $query->get_result();
        if (mysqli_num_rows($result) > 0) {
            $prv = array();
            $prv_list = array();
            # fetch all db privellege
            $query1 =  $connect->prepare("SELECT privellege_option FROM tbl_privellege WHERE privellege_status <> ? ORDER BY privellege_option");
            $query1->bind_param('s', $deleted);
            $deleted = "deleted";
            $query1->execute();
            $result1 = $query1->get_result();
            foreach ($result1 as $key => $value) {
                array_push($prv_list, $value['privellege_option']);
            }
            # end fetch
            # assign judged privellege to array $prv
            foreach ($result as $key => $value) {
                if (in_array($value['privellege_option'], $prv_list)) {
                    array_push($prv, $value['privellege_option']);
                    $prv_list = array_diff($prv_list, [$value['privellege_option']]);
                }
            }
            # end assign
            foreach ($prv as $key => $value) {
                print "<a href='?eid=".$envelope_id."&type=".$value."' class='btn-hover color-6 upper'>".$value."</a>";
            }
        }
        $query->close();
    }



    function countActiveUser(){
        global $connect;
        
       $query =  $connect->prepare("SELECT tbl_user.user_id FROM tbl_compertition, tbl_log, tbl_user WHERE tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_user.user_id =  tbl_log.user_id AND tbl_user.user_status <> ? AND tbl_compertition.compertition_status = ? AND tbl_log.logout > ?");
        $query->bind_param('sss',$deleted, $active, $nowtime);
        $deleted = "deleted";
        $active = "active";
        $nowtime = time();
        $query->execute();
        $result = $query->get_result();
        
        if (mysqli_num_rows($result) > 0) {
            return mysqli_num_rows($result);
        }else{
            return 1;
        }
        $query->close();
    }

    #END CLASS
}