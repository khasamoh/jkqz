<?php
require_once 'connection.php';

    #START CLASS
class Authentication{

	function login(){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_compertition, tbl_user, tbl_privellege WHERE tbl_user.privellege_id = tbl_privellege.privellege_id AND tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_compertition.compertition_status = ? AND tbl_privellege.privellege_status = ? AND tbl_user.username = ? AND tbl_user.user_password = ?");
        $query->bind_param('ssss', $status, $status, $username, $password);

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $status = "active";
        $query->execute();
        $result = $query->get_result();
        
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            if($row['user_status'] == "active"){
                #function that create userlogs
                $logid = $this->addUserLog($row['user_id']);
                #end function
                $_SESSION['jkqz_name'] = $row['username'];
                $_SESSION['jkqz_id'] = $row['user_id'];
                $_SESSION['jkqz_log_id'] = $logid;
                if (empty($row['user_temp_privellege'])) {
                    $_SESSION['jkqz_privellege'] = $row['privellege_option'];
                }else{
                    $_SESSION['jkqz_privellege'] = $row['user_temp_privellege'];
                }

                if ($row['user_gender'] == "male") {
                    $_SESSION['picture'] = "system/male.jpg";
                }else{
                    $_SESSION['picture'] = "system/female.jpg";
                }
                
                print"<script>window.location.href = 'home.php';</script>";
                
            }else{
                return " <div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Sorry! your account has been suspended <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }
        }else{
            return " <div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Incorrect username or password <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }
            $query->close();
    }





    function addUserLog($userid){
        global $connect;

        $query =  $connect->prepare("SELECT * FROM tbl_log WHERE user_id = ? AND logout > ? ORDER BY log_id DESC LIMIT 1");
        $query->bind_param('ii',$userid, $time);
        $time = time();
        $query->execute();
        $result = $query->get_result();
        
        if(mysqli_num_rows($result) >= 1){
            $row = mysqli_fetch_assoc($result);
            return $row['log_id'];
        }else{
            $query = $connect->prepare("INSERT INTO tbl_log(login, user_id) VALUES(?,?)");
            $query->bind_param('si',$logtime, $userid);
            $logtime = (time()+3);
            $query->execute();
            return $query->insert_id;
        }

    }






function updateUserLog($userid, $log_id){
        global $connect;

        $logtime = (time()+3);
        $query = $connect->prepare("UPDATE tbl_log SET logout = ? WHERE user_id = ? AND log_id = ?");
        $query->bind_param('sii', $logtime, $userid, $log_id);
        $query->execute();

    }




    function fetchPrivellege(){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_privellege WHERE privellege_status = ?");
        $query->bind_param('s',$status);
        $status = "active";
        $query->execute();

        $result = $query->get_result();
        
        if(mysqli_num_rows($result) > 0){
            while ($row = mysqli_fetch_assoc($result)) {
                print"<tr>
                    <td>".$row['privellege_name']."</td>
                    <td class='center'>".$row['privellege_option']."</td>
                </tr>";
            }
        }

        $query->close();
    }






    function checkTempPrivellege($user_id, $prv){
        //@todo: need updation. minimize line of codes
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_privellege, tbl_user WHERE tbl_privellege.privellege_id = tbl_user.privellege_id AND user_id = ?");
        $query->bind_param('s',$user_id);
        $status = "active";
        $query->execute();

        $result = $query->get_result();
        
        if(mysqli_num_rows($result) > 0){
           $row = mysqli_fetch_assoc($result);
           /*
           if (($row['user_temp_privellege'] == '') AND ($prv == $row['privellege_option']) OR ($row['user_temp_privellege'] <> '') AND ($prv == $row['user_temp_privellege'])) {
                return $_SESSION['jkqz_privellege'];
           }elseif (($row['user_temp_privellege'] == '') AND ($prv <> $row['privellege_option'])) {
                $_SESSION['jkqz_privellege'] = $row['privellege_option'];
                return $_SESSION['jkqz_privellege'];
           }else{
                $_SESSION['jkqz_privellege'] = $row['user_temp_privellege'];
                return $_SESSION['jkqz_privellege'];
           }*/

           if (($row['user_temp_privellege'] == '') && ($prv == $row['privellege_option'])) {
               return $prv;
           }else{
                if (!empty($row['user_temp_privellege'])) {
                    $_SESSION['jkqz_privellege'] = $row['user_temp_privellege'];
                    return $_SESSION['jkqz_privellege'];
                }else{
                    //@todo: check this line below... is it really working
                    $_SESSION['jkqz_privellege'] = $row['privellege_option'];
                    return $_SESSION['jkqz_privellege'];
                }
           }
           
        }

        $query->close();
    }







    function addPrivellege($id){
        global $connect;
        
        $query =  $connect->prepare("INSERT INTO tbl_privellege(privellege_name, privellege_option, privellege_added_date, privellege_added_by, privellege_status) VALUES(?,?,?,?,?)");

        $query->bind_param('sssss',$privellege_name, $privellege_option, $privellege_added_date, $privellege_added_by, $privellege_status);

        $privellege_name = $_POST['name'];
        $privellege_option = $_POST['option'];
        $privellege_added_date = $_POST['addedDate'];
        $privellege_added_by = $id;
        $privellege_status = "active";

        $query->execute();

        if ($query->affected_rows >= 1) {
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Privellege Added successfull <i class='fa fa-check'></i></strong></center>
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
                                <center><strong class=\"\"> Failed to Add Privellege (Privellege data exist in database) <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }


        $query->close();
    }

    #END CLASS

}