<?php
include 'fetch-option.php';

    #START CLASS
class User extends Option{

    function addUser($id){
        global $connect;
        
        $query =  $connect->prepare("INSERT INTO `tbl_user`(`user_fname`, `user_mname`, `user_lname`, `user_gender`, `user_phone`, `user_address`, `user_nationality`, `user_email`, `username`, `user_password`, `user_added_by`, `user_added_date`, `user_status`, `compertition_id`, `privellege_id`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $query->bind_param('sssssssssssssii',$user_fname, $user_mname, $user_lname, $user_gender, $user_phone, $user_address, $user_nationality, $user_email, $user_name, $user_password, $user_added_by, $user_added_date, $user_status, $compertition_id, $privellege_id);

        $user_fname = $_POST['fname'];
        $user_mname = $_POST['mname'];
        $user_lname = $_POST['lname'];
        $user_gender = $_POST['gender'];
        $user_email = $_POST['email'];
        $user_address = $_POST['address'];
        $user_nationality = $_POST['nationality'];
        $user_phone = $_POST['phone'];
        $user_name = $_POST['username'];
        $user_password = md5($_POST['password']);
        $user_added_by = $id;
        $user_added_date = $_POST['addedDate'];
        $user_status = "active";
        $compertition_id = $_POST['compertition'];
        $privellege_id = $_POST['privellege'];
        $query->execute();

        if ($query->affected_rows >= 1) {
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> User Added successfull <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }else{
            print " <div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Failed to Add user (User data exist in database) <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }


        $query->close();
    }






    function updateTempPrivellege($id){
        global $connect;
        
        $query =  $connect->prepare("UPDATE tbl_user SET user_temp_privellege = ? WHERE user_id = ?");

        $query->bind_param('si',$prv, $user_id);
        if ($_POST['prv'] == '---') {
            $_POST['prv'] = '';
        }
        $prv = $_POST['prv'];
        $user_id = $_POST['user_id'];
        $query->execute();

        if ($query->affected_rows >= 1) {
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Data saved successfull <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }else{
            print " <div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Sorry! No changes occur in the database <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }


        $query->close();
    }







    function fetchAllUser(){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_compertition, tbl_user, tbl_privellege WHERE tbl_user.privellege_id = tbl_privellege.privellege_id AND tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_user.user_status <> ? AND tbl_compertition.compertition_status = ?");
        $query->bind_param('ss',$status, $active);
        $status = "deleted";
        $active = "active";
        $query->execute();

        $result = $query->get_result();
        
        if(mysqli_num_rows($result) >= 1){


            while($row = mysqli_fetch_assoc($result)){

                
                print "<tr>
                        <td>".$row['user_fname']." ".$row['user_mname']." ".$row['user_lname']."</td>
                        <td class='center'>".$row['user_gender']."</td>
                        <td class='center'>";
                            if (empty($row['user_phone'])) {
                                print('---');
                            }else{
                                print($row['user_phone']);
                            }
                        print"</td>
                        <td class='center'>";
                            if (empty($row['user_address'])) {
                                print('---');
                            }else{
                                print($row['user_address']);
                            }
                        print"</td>
                        <td class='center'>";
                            if (empty($row['user_email'])) {
                                print('---');
                            }else{
                                print($row['user_email']);
                            }
                        print"</td>
                        <td class='center'>";
                            if (empty($row['user_nationality'])) {
                                print('---');
                            }else{
                                print($row['user_nationality']);
                            }
                        print"</td>
                        <td class='center'>
                            <span class='label l-bg-purple shadow-style'>".$row['privellege_option']."</span>
                        </td>
                        <td class='center'>";
                            if (empty($row['username'])) {
                                print('---');
                            }else{
                                print($row['username']);
                            }
                        print"</td>
                        <td class='center'>";
                            if (empty($row['user_temp_privellege'])) {
                                print('---');
                            }else{
                                print($row['user_temp_privellege']);
                            }
                        print"</td>
                        <td class='center'>
                            <span data-toggle='tooltip' data-original-title='Change Role Temporary'>
                                <a href='' class='badge col-green open-modal' data-toggle='modal' onclick='tempID(\"".$row['user_id']."\",\"".$row['user_fname']." ".$row['user_mname']." ".$row['user_lname']."\")' data-target='#chRoleModal'><i class='fa fa-user'></i>
                                </a>
                            </span>
                            <span data-toggle='tooltip' data-original-title='Account Logs'>
                                <a href='user-log.php?uid=".$row['user_id']."' class='badge col-blue'><i class='fa fa-eye'></i>
                                </a>
                            </span>
                            <span data-toggle='tooltip' data-original-title='Edit User Detail'>
                                <a href='' class='badge col-cyan open-modal' data-toggle='modal' data-target='#editUserModal'><i class='fa fa-edit'></i>
                                </a>
                            </span>
                            <span data-toggle='tooltip' data-original-title='Delete user'>
                                <a href='' class='badge col-red open-modal' onclick='dID(\"".$row['user_id']."\",\"".$row['user_fname']." ".$row['user_mname']." ".$row['user_lname']."\")' data-toggle='modal' data-target='#deleteModal'><i class='fa fa-trash'></i>
                                </a>
                            </span>
                        </td>
                    </tr>";
            }
            $query->close();
        }

    }







    function deleteUser($id){
        global $connect;
        
        if ($id == $_POST['user_id']) {
            print "<div id=\"ifr\" class='ifr ifr-hide'>
                <div class=\"col-md-12\">
                    <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        <center><strong class=\"\"> Sorry! You can't delete your self <i class='fa fa-exclamation-triangle'></i></strong></center>
                    </div>
                </div>
            </div>";
        }else{
            
            $query =  $connect->prepare("UPDATE tbl_user SET user_status = ?, user_deleted_by = ?, user_deleted_date = ? WHERE user_id = ?");
            $query->bind_param('sisi',$status, $id, $time, $user_id);
            $user_id = $_POST['user_id'];
            $time = time();
            $status = "deleted";
            $query->execute();
            
           if ($query->affected_rows >= 1) {

                print "<div id=\"ifr\" class='ifr ifr-hide'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> User delete successfull <i class='fa fa-check'></i></strong></center>
                                </div>
                            </div>
                        </div>";
            }else{
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> Sorry! Failed to delete user <i class='fa fa-warning'></i></strong></center>
                                </div>
                            </div>
                        </div>";
            }
            $query->close();
        }
        
    }





    function deleteEnvelope($id){
        global $connect;
        
        $query =  $connect->prepare("UPDATE tbl_envelope SET envelope_status = ?, envelope_deleted_by = ?, envelope_deleted_date = ? WHERE envelope_id = ?");
        $query->bind_param('sisi',$status, $id, $time, $envelope_id);
        $envelope_id = $_POST['envelope_id'];
        $time = time();
        $status = "deleted";
        $query->execute();
        
       if ($query->affected_rows > 0) {

            print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Envelope delete successfull <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
        }else{
            print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Sorry! Failed to delete envelope <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
        }
        $query->close();
        
    }








    function fetchOnlineUser(){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_compertition, tbl_log, tbl_user, tbl_privellege WHERE tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_user.user_id =  tbl_log.user_id AND tbl_user.privellege_id = tbl_privellege.privellege_id AND tbl_user.user_status <> ? AND tbl_compertition.compertition_status = ? AND tbl_log.logout > ?");
        $query->bind_param('sss',$deleted, $active, $nowtime);
        $deleted = "deleted";
        $active = "active";
        $nowtime = time();
        $query->execute();

        $result = $query->get_result();
        
        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){

                print "<tr>
                        <td>".$row['user_fname']." ".$row['user_mname']." ".$row['user_lname']."</td>
                        <td class='center'>".$row['user_gender']."</td>
                        <td class='center'>
                            <span class='label l-bg-purple shadow-style'>".$row['privellege_option']."</span>
                        </td>
                        <td class='center'>";
                            if (empty($row['username'])) {
                                print('---');
                            }else{
                                print($row['username']);
                            }
                        print"</td>
                        <td class='center'>";
                            if (empty($row['user_temp_privellege'])) {
                                print('---');
                            }else{
                                print($row['user_temp_privellege']);
                            }
                        print"</td>
                        <td class='center'>
                            <a style='font-size: 14px; margin: 0 3px; margin: 5px; border-radius: 50%; min-width: 30px; padding: .5rem .75rem; line-height: 1.25; background-color:green; color:#fff;' data-toggle='tooltip' data-widget='chat-pane-toggle' data-original-title='Online'>
                                <i class='fa fa-power-off'></i>
                            </a>
                        </td>
                        <td class='center'>
                            <span data-toggle='tooltip' data-original-title='Account Logs'>
                                <a href='user-log.php?uid=".$row['user_id']."' class='badge col-blue'><i class='fa fa-eye'></i>
                                </a>
                            </span>
                        </td>
                    </tr>";
            }
            $query->close();
        }

    }






    function fetchUserLogs($userid){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_compertition, tbl_log, tbl_user, tbl_privellege WHERE tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_user.user_id =  tbl_log.user_id AND tbl_user.privellege_id = tbl_privellege.privellege_id AND tbl_user.user_status <> ? AND tbl_compertition.compertition_status = ? AND tbl_log.logout < ? AND tbl_user.user_id = ? ORDER BY tbl_log.log_id DESC");
        $query->bind_param('sssi',$deleted, $active, $nowtime, $userid);
        $deleted = "deleted";
        $active = "active";
        $nowtime = time();
        $query->execute();

        $result = $query->get_result();
        
        if(mysqli_num_rows($result) >= 1){

            while($row = mysqli_fetch_assoc($result)){

                print "<tr>
                        <td>".$row['user_fname']." ".$row['user_mname']." ".$row['user_lname']."</td>
                        <td class='center'>".$row['user_gender']."</td>
                        <td class='center'>
                            <span class='label l-bg-purple shadow-style'>".$row['privellege_option']."</span>
                        </td>
                        <td class='center'>";
                            if (empty($row['username'])) {
                                print('---');
                            }else{
                                print($row['username']);
                            }
                        print"</td>
                        <td class='center'>";
                            if (empty($row['login'])) {
                                print('---');
                            }else{
                                if (date('d-m-Y', $row['login']) == date('d-m-Y')) {
                                    print "Today ".date('h:i:s a', $row['login']);
                                }elseif (date('d-m-Y', $row['login']) == date('d-m-Y', strtotime('-1 day'))) {
                                    print "Yesterday ".date('h:i:s a', $row['login']);
                                }else{
                                    print date('d/m/Y h:i:s a', $row['login']);
                                }
                            }
                        print"<td class='center'>";
                            if (empty($row['logout'])) {
                                print('---');
                            }else{
                                if (date('d-m-Y', $row['logout']) == date('d-m-Y')) {
                                    print "Today ".date('h:i:s a', $row['logout']);
                                }elseif (date('d-m-Y', $row['logout']) == date('d-m-Y', strtotime('-1 day'))) {
                                    print "Yesterday ".date('h:i:s a', $row['logout']);
                                }else{
                                    print date('d/m/Y h:i:s a', $row['logout']);
                                }
                            }
                        print"</td>
                    </tr>";
            }
            $query->close();
        }

    }








    function fetchAllParticipant($type = 'all'){
        global $connect;
        
        if ($type == 'all') {
            $query =  $connect->prepare("SELECT * FROM tbl_participant, tbl_compertition WHERE tbl_participant.compertition_id =  tbl_compertition.compertition_id AND tbl_compertition.compertition_status = ? AND tbl_participant.participant_status <> ?");
            $query->bind_param('ss',$status, $p_status);
        }else{
            $query =  $connect->prepare("SELECT * FROM tbl_participant, tbl_compertition WHERE tbl_participant.compertition_id =  tbl_compertition.compertition_id AND tbl_compertition.compertition_status = ? AND tbl_participant.participant_status <> ? AND tbl_participant.participant_type = ?");
            $query->bind_param('sss',$status, $p_status, $type);
        }
        $status = "active";
        $p_status = "deleted";
        $query->execute();

        $result = $query->get_result();

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){

                $bday = new DateTime($row['participant_dob']); // Your date of birth
                $today = new Datetime(date('y-m-d'));
                $diff = $today->diff($bday);

                print "<tr>
                        <td>".$row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname']."</td>
                        <td class='center'>";
                            if (empty($row['participant_image'])) {
                                $img = 'assets/images/system/male.jpg';
                                print "<span data-toggle='tooltip' data-original-title='open image'>
                                    <a href='' data-toggle='modal' data-target='#imageModal' onclick='showImage(\"".$img."\",\"".$row['participant_id']."\")'>
                                        <img style='border-radius: 50%; height: 30px; width: 30px;' src='assets/images/system/male.jpg' alt='User'>
                                    </a>
                                    </span>";
                            }else{
                                print "<span data-toggle='tooltip' data-original-title='open image'>
                                    <a href='' data-toggle='modal' data-target='#imageModal' onclick='showImage(\"".$row['participant_image']."\",\"".$row['participant_id']."\")'>
                                        <img style='border-radius: 50%; border: 1px solid gray; height: 30px; width: 30px;' src='".$row['participant_image']."' alt='User'>
                                    </a>
                                    </span>";
                            }
                        print"</td>
                        <td class='center'>".$row['participant_gender']."</td>
                        <td class='center'>";
                            if (empty($row['participant_dob'])) {
                                print('---');
                            }else{
                                if (($diff->y) <= 1) {
                                    print($diff->y)." year";
                                }else{
                                    print($diff->y)." years";
                                }
                            }
                        print"</td>
                        <td class='center'>";
                            if (empty($row['participant_juzuu'])) {
                                print('---');
                            }else{
                                print($row['participant_juzuu']);
                            }
                        print"</td>
                        <td class='center'>";
                            if (empty($row['participant_type'])) {
                                print('---');
                            }else{
                                print($row['participant_type']);
                            }
                        print"</td>
                        <td class='center'>";
                            if (empty($row['participant_country'])) {
                                print('---');
                            }else{
                                print($row['participant_country']);
                            }
                            
                        print"</td>
                        <td class='center'>
                            ".$row['compertition_name']." [".$row['compertition_date']."]
                        </td>
                        <td class='center'>";
                            if ($row['participant_status'] == "waiting") {
                                print($row['participant_status'])." <i class='fa fa-spinner fa-pulse'></i>";
                            }elseif ($row['participant_status'] == "active") {
                                print($row['participant_status'])." <i class='fa fa-hourglass-half'></i>";
                            }elseif ($row['participant_status'] == "ready") {
                                print($row['participant_status'])." <i class='fa fa-check'></i>";
                            }else{
                                print($row['participant_status']);
                            }
                        print"</td>
                        <td class='center'>
                            <span data-toggle='tooltip' data-original-title='Edit User Detail'>
                                <a href='' class='badge col-cyan open-modal' data-toggle='modal' data-target='#editUserModal'><i class='fa fa-edit'></i>
                                </a>
                            </span>
                            <span data-toggle='tooltip' data-original-title='Delete user'>
                                <a href='' class='badge col-red open-modal' onclick='dID(\"".$row['participant_id']."\",\"".$row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname']."\")' data-toggle='modal' data-target='#deleteModal'><i class='fa fa-trash'></i>
                                </a>
                            </span>
                        </td>
                    </tr>";
            }
            $query->close();
        }

    }





    function addParticipant($id, $compertition_id){
        global $connect;
        
        if (($_FILES['picture']['tmp_name']) != "") {
            $participant_picture = "assets/images/participant/".time()."_".$_FILES['picture']['name'];
            move_uploaded_file($_FILES['picture']['tmp_name'], $participant_picture);
        }else{
            $participant_picture = "";
        }

        $query =  $connect->prepare("INSERT INTO tbl_participant(participant_fname, participant_mname, participant_lname, participant_gender, participant_dob, participant_image, participant_address, participant_juzuu, participant_type, participant_school, participant_education_level, participant_madrasa, participant_country, participant_added_by, participant_added_date, participant_status, compertition_id) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $query->bind_param('ssssssssssssssssi',$participant_fname, $participant_mname, $participant_lname, $participant_gender, $participant_dob, $participant_picture, $participant_address, $participant_juzuu, $participant_type, $participant_school, $participant_eduLevel, $participant_madrasa, $participant_country, $id, $participant_added_date, $participant_status, $compertition_id);

        $participant_fname = $_POST['fname'];
        $participant_mname = $_POST['mname'];
        $participant_lname = $_POST['lname'];
        $participant_gender = $_POST['gender'];
        $participant_dob = $_POST['dob'];
        $participant_address = $_POST['address'];
        $participant_juzuu = $_POST['juzuu'];
        $participant_type = $_POST['type'];
        $participant_added_by = $id;
        $participant_school = $_POST['school'];
        $participant_eduLevel = $_POST['eduLevel'];
        $participant_madrasa = $_POST['madrasa'];
        $participant_country = $_POST['country'];
        $participant_added_date = $_POST['addedDate'];
        $participant_status = "waiting";

        $query->execute();

        if ($query->affected_rows >= 1) {
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Participant Added successfull <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }else{
            print " <div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Failed to Add Participant (participant data exist in database) <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }

        $query->close();
    }








    function updateParticipantImage($id){
        global $connect;

        $participant_picture = "assets/images/participant/".time()."_".$_FILES['picture']['name'];

        if (move_uploaded_file($_FILES['picture']['tmp_name'], $participant_picture)) {
            $query =  $connect->prepare("UPDATE tbl_participant SET participant_image = ?, participant_modified_by = ? WHERE participant_id = ?");
            $query->bind_param('ssi', $participant_picture, $id, $participant_id);
            $participant_id = $_POST['participant_id'];
            $query->execute();

            if ($query->affected_rows > 0) {
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                <div class=\"col-md-12\">
                    <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        <center><strong class=\"\"> Participant Image saved successfull <i class='fa fa-check'></i></strong>
                        </center>
                    </div>
                </div>
            </div>";
            }else{
            print "<div id=\"ifr\" class='ifr ifr-hide'>
                <div class=\"col-md-12\">
                    <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        <center><strong class=\"\"> Failed to update picture <i class='fa fa-warning'></i></strong></center>
                    </div>
                </div>
            </div>";
            }
            $query->close();
        }else{
            print "<div id=\"ifr\" class='ifr ifr-hide'>
                <div class=\"col-md-12\">
                    <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        <center><strong class=\"\"> Failed to upload picture <i class='fa fa-warning'></i></strong></center>
                    </div>
                </div>
            </div>";
        }
    }





    function deleteParticipant($id){
        global $connect;
            
        $query =  $connect->prepare("UPDATE tbl_participant SET participant_status = ?, participant_deleted_by = ?, participant_deleted_date = ? WHERE participant_id = ?");
        $query->bind_param('sisi',$status, $id, $time, $participant_id);
        $participant_id = $_POST['participant_id'];
        $time = time();
        $status = "deleted";
        $query->execute();
        
       if ($query->affected_rows >= 1) {

            print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Participant delete successfull <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
        }else{
            print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Sorry! Failed to delete Participant <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
        }

        $query->close();
        
    }



    function fetchEnvelope($type = 'all'){
        global $connect;
        
        if ($type == 'all') {
            $query =  $connect->prepare("SELECT * FROM tbl_compertition,tbl_envelope WHERE tbl_envelope.envelope_status <> ? AND tbl_compertition.compertition_id = tbl_envelope.compertition_id AND tbl_compertition.compertition_status = ?");
            $query->bind_param('ss',$status, $active);
        }else{
            $query =  $connect->prepare("SELECT * FROM tbl_compertition,tbl_envelope WHERE tbl_envelope.envelope_status <> ? AND tbl_compertition.compertition_id = tbl_envelope.compertition_id AND tbl_compertition.compertition_status = ? AND tbl_envelope.envelope_type = ?");
            $query->bind_param('sss',$status, $active, $type);
        }
        $status = "deleted";
        $active = "active";
        $query->execute();

        $result = $query->get_result();
        
        if(mysqli_num_rows($result) >= 1){


            while($row = mysqli_fetch_assoc($result)){

                
                print "<tr>
                        <td class='center'>";
                            if (empty($row['envelope_juzuu'])) {
                                print('---');
                            }else{
                                print($row['envelope_juzuu']);
                            }
                        print"</td>
                        <td class='center'>";
                            if (empty($row['envelope_number'])) {
                                print('---');
                            }else{
                                print($row['envelope_number']);
                            }
                            print"</td>
                        <td class='center upper'>";
                            if (empty($row['envelope_type'])) {
                                print('---');
                            }else{
                                print($row['envelope_type']);
                            }
                        print"</td>
                        <td class='center'>";
                            if (empty($row['envelope_status'])) {
                                print('---');
                            }else{
                                if ($row['envelope_status'] == "waiting") {
                                    print($row['envelope_status'])." <i class='fa fa-spinner fa-pulse'></i>";
                                }elseif ($row['envelope_status'] == "active") {
                                    print($row['envelope_status'])." <i class='fa fa-hourglass-half'></i>";
                                }elseif ($row['envelope_status'] == "ready") {
                                    print($row['envelope_status'])." <i class='fa fa-check'></i>";
                                }else{
                                    print($row['envelope_status']);
                                }
                            }
                        print"</td>
                        <td class='center'>
                            <span data-toggle='tooltip' data-original-title='View Ayah'>
                                <a href='view-ayah.php?eid=".$row['envelope_id']."' class='badge col-blue'><i class='fa fa-eye'></i>
                                </a>
                            </span>
                            <!--<span data-toggle='tooltip' data-original-title='Edit'>
                                <a href='' class='badge col-cyan open-modal' data-toggle='modal' data-target='#editUserModal'><i class='fa fa-edit'></i>
                                </a>
                            </span>-->
                            <span data-toggle='tooltip' data-original-title='Delete envelope'>
                                <a href='' class='badge col-red open-modal' onclick='dID(\"".$row['envelope_id']."\",\"".$row['envelope_number']." Juzuu ".$row['envelope_juzuu']."\")' data-toggle='modal' data-target='#deleteModal'><i class='fa fa-trash'></i>
                                </a>
                            </span>
                        </td>
                    </tr>";
            }
            $query->close();
        }

    }





    function addEnvelope($id){
        global $connect;

        $qsn_no = $this->settingEnvelopeQuestion($_POST['juzuu'], $_POST['type']);

        $query =  $connect->prepare("INSERT INTO tbl_envelope(envelope_juzuu, envelope_number, envelope_type, envelope_added_by, envelope_added_date, compertition_id, envelope_status) VALUES(?,?,?,?,?,?,?)");

        $query->bind_param('issssis',$juzuu, $envelope_number, $envelope_type, $id, $envelope_added_date, $compertition_id, $envelope_status);

        $envelope_number = $_POST['envelopeno'];
        $envelope_type = $_POST['type'];
        $envelope_added_date = $_POST['addedDate'];
        $juzuu = $_POST['juzuu'];
        $compertition_id = $_POST['compertition'];
        $envelope_status = "waiting";

        $query->execute();

        if ($query->affected_rows >= 1) {
            $env_no = $query->insert_id;
            print"<script>
                    window.location.href = 'add-envelope-question.php?qsn_no='+$qsn_no+'&env_no='+$env_no;
                </script>";
            }else{
            print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Failed to Add Envelope (participant data exist in database) <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }

        $query->close();
    }




    function viewAyah($envelopeId){
        global $connect;

        $query =  $connect->prepare("SELECT * FROM tbl_envelope, tbl_question WHERE tbl_envelope.envelope_id = tbl_question.envelope_id AND tbl_envelope.envelope_status <> ? AND tbl_question.question_status <> ? AND tbl_envelope.envelope_id = ?");
        $query->bind_param('ssi',$status, $status, $envelopeId);
        $status = "deleted";
        $query->execute();

        $result = $query->get_result();
        
        if(mysqli_num_rows($result) >= 1){
            $qsn  = 1;
            $count = mysqli_num_rows($result);
            print "<ul class='nav nav-tabs' role='tablist'>";
            for($i=1; $i <= $count; $i++){
                if ($i == 1) {
                    print "<li role='presentation'>
                        <a href='#qs".$i."' data-toggle='tab' class='show active'>
                            Qsn ".$i."
                        </a>
                    </li>";
                }else{
                    print "<li role='presentation'>
                        <a href='#qs".$i."' data-toggle='tab' class=''>
                            Qsn ".$i."
                        </a>
                    </li>";
                }
            }

            print "</ul>
                <center>
                <div class='tab-content'>";

            while($row = mysqli_fetch_assoc($result)){
                if ($qsn == 1) {
                    print "<div role='tabpanel' class='tab-pane fade in active show' id='qs".$qsn."'><br>
                            <button type='submit' class='btn btn-danger waves-effect' name='delete'><i class='fa fa-trash'></i> Delete</button><br>
                            <img class='img-responsive max-width' src='".$row['question_path']."'/>
                        </div>";
                }else{
                    print "<div role='tabpanel' class='tab-pane fade in' id='qs".$qsn."'><br>
                            <button type='submit' class='btn btn-danger waves-effect' name='delete'><i class='fa fa-trash'></i> Delete</button><br>
                            <img class='img-responsive max-width' src='".$row['question_path']."'/>
                        </div>";
                }
                $qsn+=1;
            }
            print "</div>
                </center>";

        }else{
            print "<div id=\"ifr\" class='ifr'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                <center><strong class=\"\"> Sorry! There is no questions in the Envelope <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
        }
        $query->close();

    }







    function uploadSingleQuestion($envelopeId, $user_id){
        global $connect;

        $picture = "assets/images/envelope/".time()."_".$_FILES['picture']['name'];

        if ((move_uploaded_file($_FILES['picture']['tmp_name'], $picture) == true)) {

            $query =  $connect->prepare("INSERT INTO tbl_question(question_path, question_added_date, question_added_by, question_status, envelope_id) VALUES (?,?,?,?,?)");
            $query->bind_param('ssisi', $picture, $time, $user_id, $question_status, $envelopeId);
            $time = $_POST['addedDate'];
            $question_status = "active";
            $query->execute();

            if ($query->affected_rows >= 1) {
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> New Question uploaded successfull <i class='fa fa-check'></i></strong></center>
                                </div>
                            </div>
                        </div>";
            }else{
                print " <div id=\"ifr\" class='ifr ifr-hide'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> Sorry! Failed to upload Question in Database <i class='fa fa-warning'></i></strong></center>
                                </div>
                            </div>
                        </div>";
            }

        }else{
            print " <div id=\"ifr\" class='ifr ifr-hide'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> Sorry! Failed to upload Question <i class='fa fa-warning'></i></strong></center>
                                </div>
                            </div>
                        </div>";
        }
        $query->close();
        
    }






    function uploadMultipleQuestion($envelopeId, $user_id){
        global $connect;

        $count = $_POST['count'];

        for ($i=1; $i <= $count; $i++) {
            $picture = "assets/images/envelope/".time()."_".$i."_".$_FILES['picture'.$i]['name'];

            if ((move_uploaded_file($_FILES['picture'.$i]['tmp_name'], $picture) == true)) {

                $query =  $connect->prepare("INSERT INTO tbl_question(question_path, question_added_date, question_added_by, question_status, envelope_id) VALUES (?,?,?,?,?)");
                $query->bind_param('ssisi', $picture, $time, $user_id, $question_status, $envelopeId);
                $time = $_POST['addedDate']."_".$i;
                $question_status = "active";
                $query->execute();
                $check = false;
                if ($query->affected_rows >= 1) {
                    $check = true;
                }
                $query->close();
            }else{
                print " <div id=\"ifr\" class='ifr ifr-hide'>
                    <div class=\"col-md-12\">
                        <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                            <center><strong class=\"\"> Sorry! Failed to upload Question <i class='fa fa-warning'></i></strong></center>
                        </div>
                    </div>
                </div>";
            }
        }

        if ($check == true) {
            print"<div id=\"ifr\" class='ifr ifr-hide'>
                    <div class=\"col-md-12\">
                        <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                            <center><strong class=\"\"> New Question uploaded successfull <i class='fa fa-check'></i></strong></center>
                        </div>
                    </div>
                </div>";
        }else{
            print"<div id=\"ifr\" class='ifr ifr-hide'>
                    <div class=\"col-md-12\">
                        <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                            <center><strong class=\"\"> Sorry! Failed to upload Question in Database <i class='fa fa-warning'></i></strong></center>
                        </div>
                    </div>
                </div>";
        }
        
    }




    function calculateParticipantMarks($envelope_id, $type){
        global $connect;
        $query = $connect->prepare("SELECT privellege_option FROM tbl_privellege WHERE privellege_status <> ?");
        $query->bind_param('s', $status);
        $status = 'deleted';
        $query->execute();
        $result = $query->get_result();

        if(mysqli_num_rows($result) > 0){
            $total = $count_saka = $count_jaji = 0;
            foreach ($result as $key => $value1) {
                $phase = 0;
                $check = 1;
                $query1 = $connect->prepare("SELECT * FROM tbl_setting, tbl_setting_question, tbl_question WHERE tbl_setting.setting_id = tbl_setting_question.setting_id AND tbl_setting_question.question_id = tbl_question.question_id AND tbl_setting.setting_value5 = ? AND tbl_question.envelope_id = ? ORDER BY user_id ASC");
                $query1->bind_param('ss', $prv, $envelope_id);
                $prv = $value1['privellege_option'];
                $val = 0;
                $query1->execute();
                $result1 = $query1->get_result();
                if(mysqli_num_rows($result1) > 0){
                    $count_jaji = 0;
                    foreach ($result1 as $key => $value) {
                        $id = $value['user_id'];
                        if ($check != $id) {
                            $count_jaji+=1;
                            $check = $value['user_id'];
                        }

                        if (($value['setting_value1'] == 'saka') && ($value['value'] > 0)) {
                            $count_saka+=$value['value'];
                        }
                        $phase = $phase + $value['setting_value2'] * $value['value'];
                    }
                    $x = $phase/$count_jaji;
                    $total+=$x;
                }
            }
            $total = 100 - $total;
        }
        #@todo: check for $type == 'hifdhi' maybe we can remove it...
        if ($count_saka > 0) {
            #if ((($count_saka/$count_jaji_saka) >= 4)) {
            if (($count_saka/$count_jaji) >= 4 && ($type == 'hifdhi')) {
                $total = '<code>Hakumaliza maswali</code>';
                return $total;
            }else{
                return number_format($total,2)."%";
            }
        }else{
            return number_format($total,2)."%";
        }
        
    }




    function participantResult($type){
        print"<table id='tableExport' class='table table-hover table-bordered'>
            <thead>
                <th>Full_Name</th>
                <th class='center'>Juzuu</th>
                <th class='center'>Type</th>
                <th class='center'>Anapotoka</th>
                <th class='center'>Alama</th>
                <th class='center'>";
                if ($type == 'all') {
                    print 'More';
                }else{
                    print 'Nafasi';
                }
                print"</th>
            </thead>
            <tbody>";
        global $connect;
        
        if ($type == 'all') {
           $query =  $connect->prepare("SELECT tbl_participant.participant_id, tbl_participant.participant_fname, tbl_participant.participant_mname, tbl_participant.participant_lname, tbl_participant.participant_country, tbl_participant.participant_juzuu, tbl_participant.participant_type, tbl_envelope.envelope_id, tbl_envelope.envelope_type FROM tbl_compertition, tbl_participant, tbl_participant_envelope, tbl_envelope WHERE tbl_compertition.compertition_id = tbl_participant.compertition_id AND tbl_participant.participant_id = tbl_participant_envelope.participant_id AND tbl_participant_envelope.envelope_id = tbl_envelope.envelope_id AND tbl_compertition.compertition_status = ? AND tbl_participant.participant_status = ?");
            $query->bind_param('ss', $status1, $status2);
        }else{
            $query =  $connect->prepare("SELECT tbl_participant.participant_id, tbl_participant.participant_fname, tbl_participant.participant_mname, tbl_participant.participant_lname, tbl_participant.participant_country, tbl_participant.participant_juzuu, tbl_participant.participant_type, tbl_envelope.envelope_id, tbl_envelope.envelope_type FROM tbl_compertition, tbl_participant, tbl_participant_envelope, tbl_envelope WHERE tbl_compertition.compertition_id = tbl_participant.compertition_id AND tbl_participant.participant_id = tbl_participant_envelope.participant_id AND tbl_participant_envelope.envelope_id = tbl_envelope.envelope_id AND tbl_participant.participant_type = ? AND tbl_compertition.compertition_status = ? AND tbl_participant.participant_status = ?");
            $query->bind_param('sss', $type, $status1, $status2);
        }

        $status1 = "active";
        $status2 = "ready";
        $query->execute();
        $result = $query->get_result();
        
        if(mysqli_num_rows($result) >= 1){
            $envelope_id = 0;
            $totalMarks = 0;

            while($row = mysqli_fetch_assoc($result)){
                print"<tr>
                <td>".$row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname']."</td>
                <td class='center'>".$row['participant_juzuu']."</td>
                <td class='center'>".$row['participant_type']."</td>
                <td class='center'>";
                if (empty($row['participant_country'])) {
                    print "---";
                }else{
                    print $row['participant_country'];
                }
                print"</td>
                <td class='center'>";
                print $this->calculateParticipantMarks($row['envelope_id'], $row['envelope_type']);
                print "</td>
                <td class='center'>";
                if ($type == 'all') {
                    print "<span data-toggle=\"tooltip\" data-original-title=\"view detail results\">
                            <a href=\"edit-results.php?eid=".$row['envelope_id']."&type=".$row['envelope_type']."\" class=\"badge col-cyan\">
                                <i class=\"fa fa-edit\"></i>
                            </a>
                        </span>
                        <span data-toggle=\"tooltip\" data-original-title=\"print result\">
                            <a href=\"print-result.php?eid=3&amp;mrk=97.0 %\" class=\"badge col-green\">
                                <i class=\"fa fa-print\"></i>
                            </a>
                        </span>";
                }
                print "</td>
            </tr>";
            }
        }
                      
        print"</tbody>
            <tfoot>
                <th>Full_Name</th>
                <th class='center'>Juzuu</th>
                <th class='center'>Type</th>
                <th class='center'>Anapotoka</th>
                <th class='center'>Alama</th>
                <th class='center'>";
                if ($type == 'all') {
                    print 'More';
                }else{
                    print 'Nafasi';
                }
                print"</th>
            </tfoot>
        </table>";
    }




    function fetchCompertition(){
         global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_compertition WHERE compertition_status <> ?");
        $query->bind_param('s',$status);
        $status = 'deleted';
        $query->execute();
        $result = $query->get_result();

        if ($query->affected_rows >= 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                print"<tr>
                    <td><span data-toggle='tooltip' data-original-title='Import Setting'><a onclick='importSetting(\"".$row['compertition_id']."\",\"".$row['compertition_name']."\")' href='#' class='col-green open-modal' data-toggle='modal' data-target='#importSetting'>".$row['compertition_name']." <i class='fa fa-clipboard'></i></a></span></td>
                    <td class='center'>";
                    if (empty($row['compertition_address'])) {
                        print"---";
                    }else{
                        print $row['compertition_address'];
                    }
                    print"</td>
                    <td class='center'>";
                    if (empty($row['compertition_date'])) {
                        print"---";
                    }else{
                        print $row['compertition_date'];
                    }
                    print"</td>
                    <td class='center'>";
                        if ($row['compertition_status'] == 'waiting') {
                            print $row['compertition_status']." <i class='fa fa-spinner fa-pulse'>";
                        }else{
                            print $row['compertition_status']." <i class='fa fa-check'>";
                        }
                    print"</td>
                    <td class='center'>
                        <form action='' method='post'>";
                        if ($row['compertition_status'] == 'waiting') {
                            print"<input type='hidden' value='".$row['compertition_id']."' name='id'/>
                            <button class='btn btn-success' name='active'>activate</button>";
                        }else{
                            print"<button class='btn btn-success disabled'>active</button>";
                        }
                            
                        print"</form>
                    </td>
                </tr>";
            }
        }

        $query->close();
    }



    #END OF CLASS
}