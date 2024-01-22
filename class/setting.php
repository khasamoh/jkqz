<?php
require_once 'connection.php';

#START CLASS
class Setting{


    function fetchAllSetting(){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_setting WHERE setting_status = ?");
        $query->bind_param('s',$status);
        $status = "active";
        $query->execute();

        $result = $query->get_result();
        
        if(mysqli_num_rows($result) >= 1){
            
            while($row = mysqli_fetch_assoc($result)){
                print"<tr>
                    <td>".$row['setting_name']."</td>
                    <td class='center'>".$row['setting_value1']."</td>
                    <td class='center'>";
                    if (!empty($row['setting_value2'])) {
                        print $row['setting_value2'];
                    }else{
                        print "--no data--";
                    }
                    print "</td>
                    <td class='center'>";
                    if (!empty($row['setting_value3'])) {
                        print $row['setting_value3'];
                    }else{
                        print "--no data--";
                    }
                    print"</td>
                    <td class='center'>@todo...</td>
                </tr>";
            }
        }
        
        $query->close();
    }


    function importSetting($user_id){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_setting WHERE setting_status = ? AND compertition_id = ? AND setting_name <> ?");
        $query->bind_param('sis',$status, $fromId, $type);
        $status = "active";
        $type = "active_type";
        $fromId = $_POST['fromId'];
        $toId = $_POST['toId'];
        $query->execute();
        $result = $query->get_result();

        if(mysqli_num_rows($result) > 0){
            $query1 =  $connect->prepare("INSERT INTO tbl_setting (setting_name, setting_value1, setting_value2, setting_value3, setting_value4, setting_value5, setting_added_by, setting_status, compertition_id) VALUES (?,?,?,?,?,?,?,?,?)");
            
            foreach ($result as $key => $value) {
                //@todo: code to insert
                $query1->bind_param('ssssssisi', $val1, $val2, $val3, $val4, $val5, $val6, $user_id, $val7, $toId);
                $val1 = $value['setting_name'];
                $val2 = $value['setting_value1'];
                $val3 = $value['setting_value2'];
                $val4 = $value['setting_value3'];
                $val5 = $value['setting_value4'];
                $val6 = $value['setting_value5'];
                $val7 = $value['setting_status'];
                $query1->execute();
                //var_dump($val4);
            }
        }else{
            print "<div id=\"ifr\" class='ifr ifr-hide'>
                    <div class=\"col-md-12\">
                        <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                            <center><strong class=\"\"> Sorry! No data found in Database <i class='fa fa-warning'></i></strong></center>
                        </div>
                    </div>
                </div>";
        }
        $query->close();
    }


    function fetchEnvelopeQuestion(){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_setting, tbl_compertition WHERE tbl_setting.compertition_id = tbl_compertition.compertition_id AND tbl_setting.setting_name = ? AND tbl_setting.setting_status = ? AND tbl_compertition.compertition_status = ?");
        $query->bind_param('sss', $name, $status, $status);
        $name = "envelope_questions";
        $status = "active";
        $query->execute();

        $result = $query->get_result();
        
        if(mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_assoc($result)){
                print"<tr>
                        <td class='center'>".$row['setting_value2']."</td>
                        <td class='center'>";
                        if (!empty($row['setting_value1'])) {
                            print $row['setting_value1'];
                        }else{
                            print "--no data--";
                        }
                        print "</td>
                        <td class='center'>";
                        if (!empty($row['setting_value3'])) {
                            print $row['setting_value3'];
                        }else{
                            print "--no data--";
                        }
                        print"</td>
                        <td class='center'>@todo...</td>
                    </tr>";
            }
        }
        
        $query->close();
    }





    function settingEnvelopeQuestion($juzuu, $type){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_setting, tbl_compertition WHERE tbl_setting.compertition_id = tbl_compertition.compertition_id AND tbl_setting.setting_name = ? AND tbl_setting.setting_value2 = ? AND tbl_setting.setting_value1 = ? AND tbl_setting.setting_status = ? AND tbl_compertition.compertition_status = ?");
        $query->bind_param('sssss', $name, $juzuu, $type, $status, $status);
        $name = "envelope_questions";
        $status = "active";
        $query->execute();

        $result = $query->get_result();
        
        if(mysqli_num_rows($result) >= 1){
            $row = mysqli_fetch_assoc($result);
            return $row['setting_value3'];
        }else{
            return 0;
        }
        
        $query->close();
    }
    



    function addEnvelopeQuestion($id){
        global $connect;

        $query3 =  $connect->prepare("SELECT * FROM tbl_compertition WHERE compertition_status = ?");
        $query3->bind_param('s', $status3);
        $status3 = "active";
        $query3->execute();
        $result3 = $query3->get_result();
        if (mysqli_num_rows($result3) > 0) {
            $row3 = mysqli_fetch_assoc($result3);
        }

        $query =  $connect->prepare("INSERT INTO tbl_setting(setting_name, setting_value1, setting_value2, setting_value3, setting_added_by, setting_added_date, setting_status, compertition_id) VALUES(?,?,?,?,?,?,?,?)");

        $query->bind_param('ssiiiisi', $setting_name, $type, $juzuu, $question, $id, $date, $setting_status, $compertition_id);

        $setting_name = 'envelope_questions';
        $type = $_POST['type'];
        $juzuu = $_POST['juzuu'];
        $question = $_POST['question'];
        $date = $_POST['date'];
        $setting_status = 'active';
        $compertition_id = $row3['compertition_id'];
        $query->execute();

        if ($query->affected_rows >= 1) {
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Envelope Question Added successfull <i class='fa fa-check'></i></strong></center>
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
                                <center><strong class=\"\"> Sorry! Envelope Question exist in database <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }


        $query->close();
    }






    function addCompertition($id){
        global $connect;

        $query =  $connect->prepare("INSERT INTO tbl_compertition(compertition_name, compertition_date, compertition_address, compertition_added_by, compertition_added_date, compertition_status) VALUES(?,?,?,?,?,?)");
        $query->bind_param('sssiis', $compertitioName, $compertitionDate, $compertitionAddress, $id, $added_date, $compertition_status);

        $compertitioName = $_POST['compertitionName'];
        $compertitionAddress = $_POST['compertitionAddress'];
        $compertitionDate = $_POST['compertitionDate'];
        $added_date = $_POST['addedDate'];
        $compertition_status = 'waiting';
        $query->execute();

        if ($query->affected_rows > 0) {
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Compertition Added successfull <i class='fa fa-check'></i></strong></center>
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
                                <center><strong class=\"\"> Sorry! Compertition exist in database <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }

        $query->close();
    }


    function addColumn($id, $compertition_id = 0){
        global $connect;
        if ($compertition_id == 0) {
            $query =  $connect->prepare("SELECT * FROM tbl_compertition WHERE tbl_compertition.compertition_status = ?");
            $query->bind_param('s', $status);
            $status = "active";
            $query->execute();
            $result = $query->get_result();
            $row = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) > 0) {
                $compertition_id = $row['compertition_id']; 
            }else{
                $compertition_id = 0;
            }
        }

        $query2 =  $connect->prepare("INSERT INTO tbl_setting(setting_name, setting_value1, setting_value2, setting_value3, setting_value4, setting_value5, setting_added_by, setting_added_date, setting_status, compertition_id) VALUES(?,?,?,?,?,?,?,?,?,?)");
        $query2->bind_param('ssssssissi', $columnType, $columnName, $columnMark, $columnSequence, $columnTitle, $columnPrivellege, $id, $added_date, $setting_status, $compertition_id);

        for ($x=0; $x < count($_POST['columnName']); $x++) {
            $columnType = "marking_column";
            $columnName = $_POST['columnName'][$x];
            $columnMark = $_POST['columnMark'][$x];
            $columnTitle = $_POST['columnTitle'][$x];
            $columnSequence = $_POST['columnSequence'][$x];
            $columnPrivellege = $_POST['columnPrivellege'][$x];
            $added_date+=1;
            $setting_status = 'active';
            $query2->execute();
        }
        if ($query2->affected_rows > 0) {
            print "<div id=\"ifr\" class='ifr ifr-hide'>
                <div class=\"col-md-12\">
                    <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        <center><strong class=\"\"> Column Added successfull <i class='fa fa-check'></i></strong></center>
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
                        <center><strong class=\"\"> Sorry! Column exist in database <i class='fa fa-warning'></i></strong></center>
                    </div>
                </div>
            </div>";
        }

        $query2->close();
    }



    function addCompertitionWizard($id){
        global $connect;

        $query =  $connect->prepare("INSERT INTO tbl_compertition(compertition_name, compertition_date, compertition_address, compertition_added_by, compertition_added_date, compertition_status) VALUES(?,?,?,?,?,?)");
        $query->bind_param('sssiis', $compertitioName, $compertitionDate, $compertitionAddress, $id, $added_date, $compertition_status);
        $compertition_id = 0;
        $compertitioName = $_POST['compertitionName'];
        $compertitionAddress = $_POST['compertitionAddress'];
        $compertitionDate = $_POST['compertitionDate'];
        $added_date = $_POST['addedDate'];
        $compertition_status = 'waiting';
        $query->execute();

        if ($query->affected_rows > 0) {
            $compertition_id = $query->insert_id;
            $query1 =  $connect->prepare("INSERT INTO tbl_setting(setting_name, setting_value1, setting_value2, setting_value3, setting_added_by, setting_added_date, setting_status, compertition_id) VALUES(?,?,?,?,?,?,?,?)");
            $query1->bind_param('ssiiissi', $setting_name, $type, $juzuu, $question, $id, $added_date, $setting_status, $compertition_id);

            for ($i=0; $i < count($_POST['type']); $i++) {
                $setting_name = 'envelope_questions';
                $type = $_POST['type'][$i];
                $juzuu = $_POST['juzuu'][$i];
                $question = $_POST['question'][$i];
                $added_date+=1;
                $setting_status = 'active';
                $query1->execute();
            }

            /*$query2 =  $connect->prepare("INSERT INTO tbl_setting(setting_name, setting_value1, setting_value2, setting_value3, setting_value4, setting_value5, setting_added_by, setting_added_date, setting_status, compertition_id) VALUES(?,?,?,?,?,?,?,?,?,?)");
            $query2->bind_param('ssssssissi', $columnType, $columnName, $columnMark, $columnSequence, $columnTitle, $columnPrivellege, $id, $added_date, $setting_status, $compertition_id);

            for ($x=0; $x < count($_POST['columnName']); $x++) {
                $columnType = "marking_column";
                $columnName = $_POST['columnName'][$x];
                $columnMark = $_POST['columnMark'][$x];
                $columnTitle = $_POST['columnTitle'][$x];
                $columnSequence = $_POST['columnSequence'][$x];
                $columnPrivellege = $_POST['columnPrivellege'][$x];
                $added_date+=1;
                $setting_status = 'active';
                $query2->execute();
            }
            */
            $this->addColumn($id, $compertition_id);
            if (true) {
                //@todo: success added new row code...
            }
        }else{
            print "<div id=\"ifr\" class='ifr ifr-hide'>
                <div class=\"col-md-12\">
                    <div class=\"alert alert-danger\" role=\"alert\" id=\"myAlert\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                        <center><strong class=\"\"> Sorry! Compertition exist in database <i class='fa fa-warning'></i></strong></center>
                    </div>
                </div>
            </div>";
        }
        $query->close();
        $query1->close();
        $query2->close();
    }








    function makeActiveCompertition($id){
        global $connect;

        $query =  $connect->prepare("UPDATE tbl_compertition SET compertition_status = ? WHERE compertition_id = ?");
        $query->bind_param('si', $active, $id);
        $active = 'active';
        $query->execute();

        $query1 =  $connect->prepare("UPDATE tbl_compertition SET compertition_status = ? WHERE compertition_id <> ?");
        $query1->bind_param('si', $waiting, $id);
        $waiting = 'waiting';
        $query1->execute();

        if ($query->affected_rows >= 1) {
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Compertition Activated successfull <i class='fa fa-check'></i></strong></center>
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
                                <center><strong class=\"\"> Sorry! Failed to activate Compertition <i class='fa fa-warning'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }

        $query->close();
        $query1->close();
    }





    function markingColumn(){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_privellege WHERE privellege_status <> ? ORDER BY privellege_option DESC");
        $query->bind_param('s', $status);
        $status = "deleted";
        $query->execute();
        $result = $query->get_result();
        
        if(mysqli_num_rows($result) >= 1){
            foreach ($result as $key => $value) {
                print "<div class=\"table-responsive\">
                   <table class=\"table table-bordered\">
                       <thead>
                           <th colspan='20' class=\"center upper\">".$value['privellege_option']."</th>
                       </thead>
                       <tbody>
                           <tr>";
                               $this->markingColumnData($value['privellege_option']);
                           print"</tr>
                       </tbody>
                   </table>
                </div></br>";
            }
        }
        
        $query->close();
    }





    function markingColumnData($prv){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_setting, tbl_compertition WHERE tbl_setting.compertition_id = tbl_compertition.compertition_id AND setting_value5 = ? AND tbl_setting.setting_name = ? AND setting_status <> ? AND tbl_compertition.compertition_status = ? ORDER BY setting_value3 ASC");
        $query->bind_param('ssss', $prv, $markingColumn, $status, $status1);
        $markingColumn = "marking_column";
        $status = "deleted";
        $status1 = "active";
        $query->execute();
        $result = $query->get_result();
        
        if(mysqli_num_rows($result) > 0){
            foreach ($result as $key => $value) {
                print"<td class='center upper'>".$value['setting_value1']."[".$value['setting_value2']."]</td>";
            }
        }else{
            print"<td class='center'>No column added</td>";
        }
    }


#END CLASS
}