<?php
require_once 'connection.php';

    #START CLASS
class Envelope{

	function fetchRequiredEnvelope(){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_participant, tbl_compertition WHERE tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_participant.participant_status = ? AND tbl_compertition.compertition_status = ?");
        $query->bind_param('ss', $status, $status);
        $status = "active";
        $query->execute();
        $result = $query->get_result();
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) >= 1) {
            $query2 =  $connect->prepare("SELECT * FROM tbl_compertition, tbl_envelope WHERE tbl_compertition.compertition_id = tbl_envelope.compertition_id AND tbl_compertition.compertition_status = ? AND tbl_envelope.envelope_juzuu = ? AND tbl_envelope.envelope_type = ? AND tbl_envelope.envelope_status = ?");
            $query2->bind_param('ssss', $active, $juzuu, $type, $waiting);
            $juzuu = $row['participant_juzuu'];
            $type = $row['participant_type'];
            $waiting = "waiting";
            $active = "active";
            $query2->execute();

            $result2 = $query2->get_result();

            if(mysqli_num_rows($result2) >= 1){
                while($row2 = mysqli_fetch_assoc($result2)){
                print"<div class='col-lg-3 col-md-4 col-sm-6 animate'>
                        <form action='' method='post'>
                            <input type='hidden' class='form-control' value='".$row['participant_id']."' name='participant_id'>
                            <input type='hidden' class='form-control' value='".$row2['envelope_id']."' name='envelope_id'>
                            <button class='btn-hover color-3 info-box' name='selectEnvelope'>
                                <center style='margin: auto;'>
                                    <b class='h3'>".$row2['envelope_number']."</b> <b> JUZUU ".$row2['envelope_juzuu']."</b>
                                </center>
                            </button>
                        </form> 
                    </div>";
                }
            }else{
                print "<div id=\"ifr\" class='ifr'>
                    <div class=\"col-md-12\">
                        <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                            <center><strong class=\"\"> Sorry! No envelope found in database</strong></center>
                        </div>
                    </div>
                </div>";
            }
            $query2->close();
        }else{
            print"<div id=\"ifr\" class='ifr'>
                    <div class=\"col-md-12\">
                        <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                            <!--<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>-->
                            <center><strong class=\"\"> Waiting for active participant <i class='fa fa-spinner fa-pulse'></i></strong></center>
                        </div>
                    </div>
                </div>";
        }
        $query->close();
        
    }


    

/*
function fetchParticipantResults($envelope_id){
        global $connect;

        #-- START HIFDHI
        $query0 =  $connect->prepare("SELECT * FROM tbl_envelope WHERE envelope_id = ?");
        $query0->bind_param('s', $envelope_id);
        $query0->execute();
        $result = $query0->get_result();

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

        }
        if ($row['envelope_type'] == 'hifdhi') {
            print"<ul class='nav nav-tabs' role='tablist'>
                <li role='presentation'>
                    <a href='#hifdhi' data-toggle='tab' class='show active'>
                        HIFDHI
                    </a>
                    </li>
                <li role='presentation'>
                    <a href='#makharij' data-toggle='tab' class=''>
                        MAKHARIJ
                    </a>
                </li>
                <li role='presentation'>
                    <a href='#tajwid' data-toggle='tab' class=''>
                        TAJWID
                    </a>
                </li>
              </ul>
              <div class='tab-content'>
              <div role='tabpanel' class='tab-pane fade in active show' id='hifdhi'>";
                #-- START HIFDHI
                $query1 =  $connect->prepare("SELECT * FROM tbl_hifdhi, tbl_envelope, tbl_participant_envelope, tbl_participant, tbl_compertition, tbl_user WHERE tbl_hifdhi.envelope_id = tbl_envelope.envelope_id AND tbl_envelope.envelope_id = tbl_participant_envelope.envelope_id AND tbl_participant_envelope.participant_id = tbl_participant.participant_id AND tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_hifdhi.user_id = tbl_user.user_id AND tbl_hifdhi.envelope_id = ?");
                $query1->bind_param('s', $envelope_id);
                $query1->execute();
                $result = $query1->get_result();

                if (mysqli_num_rows($result) > 0) {
                    $participant_name = "";
                    print"<form action='' method='post'>
                    <table class='table table-bordered table-striped'>
                            <thead class='no-bg'>
                            <tr>
                            <td colspan='6' class='center no-bg'>
                                    <b>HIFDHI</b>
                                </td>
                            </tr>
                            <tr>
                              <th class='center no-bg'>JAJI</th>
                              <th class='center no-bg'>SAKA</th>
                              <th class='center no-bg'>KIB</th>
                              <th class='center no-bg'>NENO</th>
                              <th class='center no-bg'>SHAKLI</th>              
                              <th class='center no-bg'>KZH</th>
                            </tr>
                          </thead>
                        <tbody>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $participant_name = $row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname'];
                        print"<tr>
                                <td class='center'>
                                ".$row['username']."
                                    <input type='hidden' class='form-control' name='jaji[]' value='".$row['user_id']."'>
                                    <input type='hidden' class='form-control' name='envelope_id' value='".$row['envelope_id']."'>
                                    <input type='hidden' class='form-control' name='count' value='".mysqli_num_rows($result)."'>
                                </td>
                                <td class='center'>
                                    <input id='saka' type='number' class='form-control mark center border' max='6' min='0' name='saka[]' value='".$row['hifdhi_saka']."' required>
                                </td>
                                <td class='center'>
                                    <input id='kib' type='number' class='form-control mark center border' max='' min='0' name='kib[]' value='".$row['hifdhi_kib']."' required=''>
                                </td>
                                <td class='center'>
                                    <input id='neno' type='number' class='form-control mark center border' max='' min='0' name='neno[]' value='".$row['hifdhi_neno']."' required=''>
                                </td>
                                <td class='center'>
                                    <input id='shakli' type='number' class='form-control mark center border' max='' min='0' name='shakli[]' value='".$row['hifdhi_shakli']."' required=''>
                                </td>
                                <td class='center'>
                                    <input id='kzh' type='number' class='form-control mark center border' max='' min='0' name='kzh[]' value='".$row['hifdhi_kzh']."' required=''>
                                </td>
                            </tr>";
                    }
                    print"<tr>
                            <td colspan='6' class='center no-bg'>
                                    <b>".$participant_name."</b></br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                        <center>
                                <button class='btn btn-info' name='saveHifdhi'><i class='fa fa-save'></i> save</button>
                        </center>
                    </form>";
                }else{
                    print "<div id=\"ifr\" class='ifr'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> Sorry! no Hifdhi data in the Database <i class='fa fa-check'></i></strong></center>
                                </div>
                            </div>
                        </div>";
                }
                $query1->close();
                #-- END HIFDHI
            print"</div>
            <div role='tabpanel' class='tab-pane fade in show' id='makharij'>";
                #-- START MAKHARIJ
            $query2 =  $connect->prepare("SELECT * FROM tbl_makharij, tbl_envelope, tbl_participant_envelope, tbl_participant, tbl_compertition, tbl_user WHERE tbl_makharij.envelope_id = tbl_envelope.envelope_id AND tbl_envelope.envelope_id = tbl_participant_envelope.envelope_id AND tbl_participant_envelope.participant_id = tbl_participant.participant_id AND tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_makharij.user_id = tbl_user.user_id AND tbl_makharij.envelope_id = ?");
            $query2->bind_param('s', $envelope_id);
            $query2->execute();
            $result = $query2->get_result();

            if (mysqli_num_rows($result) > 0) {
                print"<form action='' method='post'>
                <table class='table table-bordered table-striped'>
                        <thead class='no-bg'>
                        <tr>
                            <td colspan='4' class='center no-bg'>
                                    <b>MAKHARIJ</b>
                                </td>
                            </tr>
                        <tr>
                          <th class='center no-bg'>JAJI</th>
                          <th class='center no-bg'>REE</th>
                          <th class='center no-bg'>MAKH</th>
                          <th class='center no-bg'>SIFAAT</th>
                        </tr>
                      </thead>
                    <tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $participant_name = $row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname'];
                    print"<tr>
                            <td class='center'>
                            ".$row['username']."
                                <input type='hidden' class='form-control' name='jaji[]' value='".$row['user_id']."'>
                                <input type='hidden' class='form-control' name='envelope_id' value='".$row['envelope_id']."'>
                                <input type='hidden' class='form-control' name='count' value='".mysqli_num_rows($result)."'>
                            </td>
                            <td class='center'>
                                <input id='saka' type='number' class='form-control mark center border' max='6' min='0' name='ree[]' value='".$row['makharij_ree']."' required>
                            </td>
                            <td class='center'>
                                <input id='kib' type='number' class='form-control mark center border' max='' min='0' name='makh[]' value='".$row['makharij_makh']."' required=''>
                            </td>
                            <td class='center'>
                                <input id='neno' type='number' class='form-control mark center border' max='' min='0' name='sifaat[]' value='".$row['makharij_sifaat']."' required=''>
                            </td>
                        </tr>";
                }
                print"<tr>
                        <td colspan='6' class='center no-bg'>
                                <b>".$participant_name."</b></br>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <center>
                        <button class='btn btn-info' name='saveMakharij'><i class='fa fa-save'></i> save</button>
                    </center>
                </form>";
            }else{
                print "<div id=\"ifr\" class='ifr'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Sorry! no Hifdhi data in the Database <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }
            $query2->close();
            #-- END MAKHARIJ
            print"</div>
            <div role='tabpanel' class='tab-pane fade in show' id='tajwid'>";
              #-- START TAJWID
            $query3 =  $connect->prepare("SELECT * FROM tbl_tajwid, tbl_envelope, tbl_participant_envelope, tbl_participant, tbl_compertition, tbl_user WHERE tbl_tajwid.envelope_id = tbl_envelope.envelope_id AND tbl_envelope.envelope_id = tbl_participant_envelope.envelope_id AND tbl_participant_envelope.participant_id = tbl_participant.participant_id AND tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_tajwid.user_id = tbl_user.user_id AND tbl_tajwid.envelope_id = ?");
            $query3->bind_param('s', $envelope_id);
            $query3->execute();
            $result = $query3->get_result();

            if (mysqli_num_rows($result) > 0) {
                print"<form action='' method='post'>
                <table class='table table-bordered table-striped'>
                        <thead class='no-bg'>
                        <tr>
                        <td colspan='7' class='center no-bg'>
                                <b>TAJWID</b>
                            </td>
                        </tr>
                        <tr>
                          <th class='center no-bg'>JAJI</th>
                          <th class='center no-bg'>NUTA</th>
                          <th class='center no-bg'>MIM_SAK</th>
                          <th class='center no-bg'>QAL</th>
                          <th class='center no-bg'>IDGH</th>
                          <th class='center no-bg'>KZ_MAD</th>              
                          <th class='center no-bg'>WA_IB</th>
                        </tr>
                      </thead>
                    <tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $participant_name = $row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname'];
                    print"<tr>
                            <td class='center'>
                            ".$row['username']."
                                <input type='hidden' class='form-control' name='jaji[]' value='".$row['user_id']."'>
                                <input type='hidden' class='form-control' name='envelope_id' value='".$row['envelope_id']."'>
                                <input type='hidden' class='form-control' name='count' value='".mysqli_num_rows($result)."'>
                            </td>
                            <td class='center'>
                                <input id='saka' type='number' class='form-control mark center border' max='6' min='0' name='nu_ta[]' value='".$row['tajwid_nu_ta']."' required>
                            </td>
                            <td class='center'>
                                <input id='kib' type='number' class='form-control mark center border' max='' min='0' name='mim_sak[]' value='".$row['tajwid_mim_sak']."' required=''>
                            </td>
                            <td class='center'>
                                <input id='neno' type='number' class='form-control mark center border' max='' min='0' name='qal[]' value='".$row['tajwid_qal']."' required=''>
                            </td>
                            <td class='center'>
                                <input id='shakli' type='number' class='form-control mark center border' max='' min='0' name='idgh[]' value='".$row['tajwid_idgh']."' required=''>
                            </td>
                            <td class='center'>
                                <input id='kzh' type='number' class='form-control mark center border' max='' min='0' name='kz_mad[]' value='".$row['tajwid_kz_mad']."' required=''>
                            </td>
                            <td class='center'>
                                <input id='kzh' type='number' class='form-control mark center border' max='' min='0' name='wa_ib[]' value='".$row['tajwid_wa_ib']."' required=''>
                            </td>
                        </tr>";
                }
                print"<tr>
                        <td colspan='7' class='center no-bg'>
                                <b>".$participant_name."</b></br>
                            </td>
                        </tr>
                    </tbody>
                </table>
                    <center>
                        <button class='btn btn-info' name='saveTajwid'><i class='fa fa-save'></i> save</button>
                    </center>
                </form>";
            }else{
                print "<div id=\"ifr\" class='ifr'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Sorry! no Hifdhi data in the Database <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }
            $query3->close();
            #-- END TAJWID
            print"</div>
        </div>";
        }else if ($row['envelope_type'] == 'tashjii') {
            print"<ul class='nav nav-tabs' role='tablist'>
            <li role='presentation'>
                <a href='#tashjii' data-toggle='tab' class='show active'>
                    TASHJII
                </a>
            </li>
          </ul>
            <div role='tabpanel' class='tab-pane fade in active show' id='tashjii'>";
            #-- START TASHJII
                $query4 =  $connect->prepare("SELECT * FROM tbl_tashjii, tbl_envelope, tbl_participant_envelope, tbl_participant, tbl_compertition, tbl_user WHERE tbl_tashjii.envelope_id = tbl_envelope.envelope_id AND tbl_envelope.envelope_id = tbl_participant_envelope.envelope_id AND tbl_participant_envelope.participant_id = tbl_participant.participant_id AND tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_tashjii.user_id = tbl_user.user_id AND tbl_tashjii.envelope_id = ?");
                $query4->bind_param('s', $envelope_id);
                $query4->execute();
                $result = $query4->get_result();

                if (mysqli_num_rows($result) > 0) {
                    $participant_name = "";
                    print"<form action='' method='post'>
                    <table class='table table-bordered table-striped'>
                            <thead class='no-bg'>
                            <tr>
                            <td colspan='6' class='center no-bg'>
                                    <b>HIFDHI</b>
                                </td>
                            </tr>
                            <tr>
                              <th class='center no-bg'>JAJI</th>
                              <th class='center no-bg'>SAKA</th>
                              <th class='center no-bg'>KIB</th>
                              <th class='center no-bg'>NENO</th>
                              <th class='center no-bg'>SHAKLI</th>              
                              <th class='center no-bg'>TAJWID</th>
                            </tr>
                          </thead>
                        <tbody>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $participant_name = $row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname'];
                        print"<tr>
                                <td class='center'>
                                ".$row['username']."
                                    <input type='hidden' class='form-control' name='jaji[]' value='".$row['user_id']."'>
                                    <input type='hidden' class='form-control' name='envelope_id' value='".$row['envelope_id']."'>
                                    <input type='hidden' class='form-control' name='count' value='".mysqli_num_rows($result)."'>
                                </td>
                                <td class='center'>
                                    <input id='saka' type='number' class='form-control mark center border' max='6' min='0' name='saka[]' value='".$row['tashjii_saka']."' required>
                                </td>
                                <td class='center'>
                                    <input id='kib' type='number' class='form-control mark center border' max='' min='0' name='kib[]' value='".$row['tashjii_kib']."' required=''>
                                </td>
                                <td class='center'>
                                    <input id='neno' type='number' class='form-control mark center border' max='' min='0' name='neno[]' value='".$row['tashjii_neno']."' required=''>
                                </td>
                                <td class='center'>
                                    <input id='shakli' type='number' class='form-control mark center border' max='' min='0' name='shakli[]' value='".$row['tashjii_shakli']."' required=''>
                                </td>
                                <td class='center'>
                                    <input id='kzh' type='number' class='form-control mark center border' max='' min='0' name='tajwid[]' value='".$row['tashjii_tajwid']."' required=''>
                                </td>
                            </tr>";
                    }
                    print"<tr>
                            <td colspan='6' class='center no-bg'>
                                    <b>".$participant_name."</b></br>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                        <center>
                            <button class='btn btn-info' name='saveTashjii'><i class='fa fa-save'></i> save</button>
                        </center>
                    </form>";
                }else{
                    print "<div id=\"ifr\" class='ifr'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> Sorry! no Tashjii data in the Database <i class='fa fa-check'></i></strong></center>
                                </div>
                            </div>
                        </div>";
                }
                $query4->close();
                #-- END TASHJII
            print"</div>
        </div>";
        }else{
            print"Sorry! Envelope type not found in the Database";
        }
        

        

        

    }

    function fetchParticipantResultsToPrint($envelope_id,$marks){
        global $connect;

        #-- START HIFDHI
        $query0 =  $connect->prepare("SELECT * FROM tbl_envelope WHERE envelope_id = ?");
        $query0->bind_param('s', $envelope_id);
        $query0->execute();
        $result = $query0->get_result();

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

        }
        if ($row['envelope_type'] == 'hifdhi') {
            print"
              <div class='tab-content'>
              <div>";
                #-- START HIFDHI
                $query1 =  $connect->prepare("SELECT * FROM tbl_hifdhi, tbl_envelope, tbl_participant_envelope, tbl_participant, tbl_compertition, tbl_user WHERE tbl_hifdhi.envelope_id = tbl_envelope.envelope_id AND tbl_envelope.envelope_id = tbl_participant_envelope.envelope_id AND tbl_participant_envelope.participant_id = tbl_participant.participant_id AND tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_hifdhi.user_id = tbl_user.user_id AND tbl_hifdhi.envelope_id = ?");
                $query1->bind_param('s', $envelope_id);
                $query1->execute();
                $result = $query1->get_result();

                if (mysqli_num_rows($result) > 0) {
                    $participant_name = "";
                    $participant_juzuu = "";
                    print"<table class='table table-bordered'>
                            <thead class='no-bg'>
                            <tr>
                            <td colspan='6' class='center no-bg'>
                                    <h4>HIFDHI</h4>
                                </td>
                            </tr>
                            <tr>
                              <th class='center no-bg'>JAJI</th>
                              <th class='center no-bg'>SAKA</th>
                              <th class='center no-bg'>KIB</th>
                              <th class='center no-bg'>NENO</th>
                              <th class='center no-bg'>SHAKLI</th>              
                              <th class='center no-bg'>KZH</th>
                            </tr>
                          </thead>
                        <tbody>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $participant_name = $row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname'];
                        $participant_juzuu = $row['participant_juzuu'];
                        print"<tr>
                                <td class='center'>
                                ".$row['username']."
                                    <input type='hidden' class='form-control' name='jaji[]' value='".$row['user_id']."'>
                                    <input type='hidden' class='form-control' name='envelope_id' value='".$row['envelope_id']."'>
                                    <input type='hidden' class='form-control' name='count' value='".mysqli_num_rows($result)."'>
                                </td>
                                <td class='center'>
                                    <input id='saka' type='number' class='form-control mark center border' max='6' min='0' name='saka[]' value='".$row['hifdhi_saka']."' required>
                                </td>
                                <td class='center'>
                                    <input id='kib' type='number' class='form-control mark center border' max='' min='0' name='kib[]' value='".$row['hifdhi_kib']."' required=''>
                                </td>
                                <td class='center'>
                                    <input id='neno' type='number' class='form-control mark center border' max='' min='0' name='neno[]' value='".$row['hifdhi_neno']."' required=''>
                                </td>
                                <td class='center'>
                                    <input id='shakli' type='number' class='form-control mark center border' max='' min='0' name='shakli[]' value='".$row['hifdhi_shakli']."' required=''>
                                </td>
                                <td class='center'>
                                    <input id='kzh' type='number' class='form-control mark center border' max='' min='0' name='kzh[]' value='".$row['hifdhi_kzh']."' required=''>
                                </td>
                            </tr>";
                    }
                    print"
                        </tbody>
                        <center><h4 style='font-size:35px'>".$participant_name.", Juzuu ".$participant_juzuu."<br> <i>Marks: ".$marks."</i></h4></center><br>
                    </table><br><br>";
                }else{
                    print "<div id=\"ifr\" class='ifr'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> Sorry! no Hifdhi data in the Database <i class='fa fa-check'></i></strong></center>
                                </div>
                            </div>
                        </div>";
                }
                $query1->close();
                #-- END HIFDHI
            print"</div>
            <div>";
                #-- START MAKHARIJ
            $query2 =  $connect->prepare("SELECT * FROM tbl_makharij, tbl_envelope, tbl_participant_envelope, tbl_participant, tbl_compertition, tbl_user WHERE tbl_makharij.envelope_id = tbl_envelope.envelope_id AND tbl_envelope.envelope_id = tbl_participant_envelope.envelope_id AND tbl_participant_envelope.participant_id = tbl_participant.participant_id AND tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_makharij.user_id = tbl_user.user_id AND tbl_makharij.envelope_id = ?");
            $query2->bind_param('s', $envelope_id);
            $query2->execute();
            $result = $query2->get_result();

            if (mysqli_num_rows($result) > 0) {
                print"<table class='table table-bordered'>
                        <thead class='no-bg'>
                        <tr>
                            <td colspan='4' class='center no-bg'>
                                    <h4>MAKHARIJ</h4>
                                </td>
                            </tr>
                        <tr>
                          <th class='center no-bg'>JAJI</th>
                          <th class='center no-bg'>REE</th>
                          <th class='center no-bg'>MAKH</th>
                          <th class='center no-bg'>SIFAAT</th>
                        </tr>
                      </thead>
                    <tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    print"<tr>
                            <td class='center'>
                            ".$row['username']."
                                <input type='hidden' class='form-control' name='jaji[]' value='".$row['user_id']."'>
                                <input type='hidden' class='form-control' name='envelope_id' value='".$row['envelope_id']."'>
                                <input type='hidden' class='form-control' name='count' value='".mysqli_num_rows($result)."'>
                            </td>
                            <td class='center'>
                                <input id='saka' type='number' class='form-control mark center border' max='6' min='0' name='ree[]' value='".$row['makharij_ree']."' required>
                            </td>
                            <td class='center'>
                                <input id='kib' type='number' class='form-control mark center border' max='' min='0' name='makh[]' value='".$row['makharij_makh']."' required=''>
                            </td>
                            <td class='center'>
                                <input id='neno' type='number' class='form-control mark center border' max='' min='0' name='sifaat[]' value='".$row['makharij_sifaat']."' required=''>
                            </td>
                        </tr>";
                }
                print"
                    </tbody>
                </table><br><br>";
            }else{
                print "<div id=\"ifr\" class='ifr'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Sorry! no Hifdhi data in the Database <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }
            $query2->close();
            #-- END MAKHARIJ
            print"</div>
            <div>";
              #-- START TAJWID
            $query3 =  $connect->prepare("SELECT * FROM tbl_tajwid, tbl_envelope, tbl_participant_envelope, tbl_participant, tbl_compertition, tbl_user WHERE tbl_tajwid.envelope_id = tbl_envelope.envelope_id AND tbl_envelope.envelope_id = tbl_participant_envelope.envelope_id AND tbl_participant_envelope.participant_id = tbl_participant.participant_id AND tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_tajwid.user_id = tbl_user.user_id AND tbl_tajwid.envelope_id = ?");
            $query3->bind_param('s', $envelope_id);
            $query3->execute();
            $result = $query3->get_result();

            if (mysqli_num_rows($result) > 0) {
                print"<table class='table table-bordered'>
                        <thead class='no-bg'>
                        <tr>
                        <td colspan='7' class='center no-bg'>
                                <h4>TAJWID</h4>
                            </td>
                        </tr>
                        <tr>
                          <th class='center no-bg'>JAJI</th>
                          <th class='center no-bg'>NUTA</th>
                          <th class='center no-bg'>MIM_SAK</th>
                          <th class='center no-bg'>QAL</th>
                          <th class='center no-bg'>IDGH</th>
                          <th class='center no-bg'>KZ_MAD</th>              
                          <th class='center no-bg'>WA_IB</th>
                        </tr>
                      </thead>
                    <tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    print"<tr>
                            <td class='center'>
                            ".$row['username']."
                                <input type='hidden' class='form-control' name='jaji[]' value='".$row['user_id']."'>
                                <input type='hidden' class='form-control' name='envelope_id' value='".$row['envelope_id']."'>
                                <input type='hidden' class='form-control' name='count' value='".mysqli_num_rows($result)."'>
                            </td>
                            <td class='center'>
                                <input id='saka' type='number' class='form-control mark center border' max='6' min='0' name='nu_ta[]' value='".$row['tajwid_nu_ta']."' required>
                            </td>
                            <td class='center'>
                                <input id='kib' type='number' class='form-control mark center border' max='' min='0' name='mim_sak[]' value='".$row['tajwid_mim_sak']."' required=''>
                            </td>
                            <td class='center'>
                                <input id='neno' type='number' class='form-control mark center border' max='' min='0' name='qal[]' value='".$row['tajwid_qal']."' required=''>
                            </td>
                            <td class='center'>
                                <input id='shakli' type='number' class='form-control mark center border' max='' min='0' name='idgh[]' value='".$row['tajwid_idgh']."' required=''>
                            </td>
                            <td class='center'>
                                <input id='kzh' type='number' class='form-control mark center border' max='' min='0' name='kz_mad[]' value='".$row['tajwid_kz_mad']."' required=''>
                            </td>
                            <td class='center'>
                                <input id='kzh' type='number' class='form-control mark center border' max='' min='0' name='wa_ib[]' value='".$row['tajwid_wa_ib']."' required=''>
                            </td>
                        </tr>";
                }
                print"
                    </tbody>
                </table><br>";
            }else{
                print "<div id=\"ifr\" class='ifr'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Sorry! no Hifdhi data in the Database <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
            }
            $query3->close();
            #-- END TAJWID
            print"</div>
        </div>";
        }else if ($row['envelope_type'] == 'tashjii') {
            print"
            <div>";
            #-- START TASHJII
                $query4 =  $connect->prepare("SELECT * FROM tbl_tashjii, tbl_envelope, tbl_participant_envelope, tbl_participant, tbl_compertition, tbl_user WHERE tbl_tashjii.envelope_id = tbl_envelope.envelope_id AND tbl_envelope.envelope_id = tbl_participant_envelope.envelope_id AND tbl_participant_envelope.participant_id = tbl_participant.participant_id AND tbl_participant.compertition_id = tbl_compertition.compertition_id AND tbl_compertition.compertition_id = tbl_user.compertition_id AND tbl_tashjii.user_id = tbl_user.user_id AND tbl_tashjii.envelope_id = ?");
                $query4->bind_param('s', $envelope_id);
                $query4->execute();
                $result = $query4->get_result();

                if (mysqli_num_rows($result) > 0) {
                    $participant_name = "";
                    $participant_juzuu = "";
                    print"<form action='' method='post'>
                    <table class='table table-bordered'>
                            <thead class='no-bg'>
                            <tr>
                            <td colspan='6' class='center no-bg'>
                                    <h4>TASHJII</h4>
                                </td>
                            </tr>
                            <tr>
                              <th class='center no-bg'>JAJI</th>
                              <th class='center no-bg'>SAKA</th>
                              <th class='center no-bg'>KIB</th>
                              <th class='center no-bg'>NENO</th>
                              <th class='center no-bg'>SHAKLI</th>              
                              <th class='center no-bg'>TAJWID</th>
                            </tr>
                          </thead>
                        <tbody>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $participant_name = $row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname'];
                        $participant_juzuu = $row['participant_juzuu'];
                        print"<tr>
                                <td class='center'>
                                ".$row['username']."
                                    <input type='hidden' class='form-control' name='jaji[]' value='".$row['user_id']."'>
                                    <input type='hidden' class='form-control' name='envelope_id' value='".$row['envelope_id']."'>
                                    <input type='hidden' class='form-control' name='count' value='".mysqli_num_rows($result)."'>
                                </td>
                                <td class='center'>
                                    <input id='saka' type='number' class='form-control mark center border' max='6' min='0' name='saka[]' value='".$row['tashjii_saka']."' required>
                                </td>
                                <td class='center'>
                                    <input id='kib' type='number' class='form-control mark center border' max='' min='0' name='kib[]' value='".$row['tashjii_kib']."' required=''>
                                </td>
                                <td class='center'>
                                    <input id='neno' type='number' class='form-control mark center border' max='' min='0' name='neno[]' value='".$row['tashjii_neno']."' required=''>
                                </td>
                                <td class='center'>
                                    <input id='shakli' type='number' class='form-control mark center border' max='' min='0' name='shakli[]' value='".$row['tashjii_shakli']."' required=''>
                                </td>
                                <td class='center'>
                                    <input id='kzh' type='number' class='form-control mark center border' max='' min='0' name='tajwid[]' value='".$row['tashjii_tajwid']."' required=''>
                                </td>
                            </tr>";
                    }
                    print"
                        </tbody>
                        <center><h4 style='font-size:35px'>".$participant_name.", Juzuu ".$participant_juzuu."<br> <i>Marks: ".$marks."</i></h4></center><br>
                    </table>
                    </form>";
                }else{
                    print "<div id=\"ifr\" class='ifr'>
                            <div class=\"col-md-12\">
                                <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                        <span aria-hidden=\"true\">&times;</span>
                                    </button>
                                    <center><strong class=\"\"> Sorry! no Tashjii data in the Database <i class='fa fa-check'></i></strong></center>
                                </div>
                            </div>
                        </div>";
                }
                $query4->close();
                #-- END TASHJII
            print"</div>
        </div>";
        }else{
            print"Sorry! Envelope type not found in the Database";
        }
        

        

        

    }

*/






    function selectEnvelope(){
        global $connect;

        $query =  $connect->prepare("SELECT * FROM tbl_envelope WHERE envelope_status = ?");
        $query->bind_param('s', $status);
        $status = "active";
        $query->execute();
        $result = $query->get_result();
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) >= 1) {
            print "<div id=\"ifr\" class='ifr ifr-hide'>
                    <div class=\"col-md-12\">
                        <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                            <center><strong class=\"\"> Sorry! you have already select an envolepe <i class='fa fa-check'></i></strong></center>
                        </div>
                    </div>
                </div>";
            
        }else{
            
            $query2 =  $connect->prepare("UPDATE tbl_envelope SET envelope_status = ? WHERE envelope_id = ?");
            $query2->bind_param('ss', $active, $envelope_id);
            $active = "active";
            $envelope_id = $_POST['envelope_id'];
            $participant_id = $_POST['participant_id'];
            $query2->execute();

            if($query2->affected_rows >= 1){
                $query3 =  $connect->prepare("INSERT INTO tbl_participant_envelope(participant_id, envelope_id) VALUES (?, ?)");
                $query3->bind_param('ii', $participant_id, $envelope_id);
                $envelope_id = $_POST['envelope_id'];
                $participant_id = $_POST['participant_id'];
                $query3->execute();

                if ($query3->affected_rows >= 1) {
                    print"<div id=\"ifr\" class='ifr ifr-hide'>
                        <div class=\"col-md-12\">
                            <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                                <center><strong class=\"\"> Envelepe selected successfull <i class='fa fa-check'></i></strong></center>
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
                                <center><strong class=\"\"> Sorry! failed to choose partcipant envelope <i class='fa fa-check'></i></strong></center>
                            </div>
                        </div>
                    </div>";
                }

                $query3->close();

            }else{
                print "<div id=\"ifr\" class='ifr ifr-hide'>
                    <div class=\"col-md-12\">
                        <div class=\"alert alert-warning\" role=\"alert\" id=\"myAlert\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                            <center><strong class=\"\"> Sorry! failed to choose envelope <i class='fa fa-check'></i></strong></center>
                        </div>
                    </div>
                </div>";
            }

            $query2->close();

        }

        $query->close();
    }




/*



    function editJajiHifdhiResult($count, $envelope_id){
        global $connect;

        for ($i=0; $i < $count; $i++) {

            $jaji = $_POST['jaji'][$i];
            $saka = $_POST['saka'][$i];
            $kib = $_POST['kib'][$i];
            $neno = $_POST['neno'][$i];
            $shakli = $_POST['shakli'][$i];
            $kzh = $_POST['kzh'][$i];

            $query = $connect->prepare("UPDATE tbl_hifdhi SET hifdhi_saka = ?, hifdhi_kib = ?, hifdhi_neno = ?, hifdhi_shakli = ?, hifdhi_kzh = ? WHERE envelope_id = ? AND user_id = ?");
            $query->bind_param('iiiiiii', $saka, $kib, $neno, $shakli, $kzh, $envelope_id, $jaji);
            $query->execute();
        }

        $query->close();

    }




    function editJajiMakharijResult($count, $envelope_id){
        global $connect;

        for ($i=0; $i < $count; $i++) {

            $jaji = $_POST['jaji'][$i];
            $ree = $_POST['ree'][$i];
            $makh = $_POST['makh'][$i];
            $sifaat = $_POST['sifaat'][$i];

            $query = $connect->prepare("UPDATE tbl_makharij SET makharij_ree = ?, makharij_makh = ?, makharij_sifaat = ? WHERE envelope_id = ? AND user_id = ?");
            $query->bind_param('iiiii', $ree, $makh, $sifaat, $envelope_id, $jaji);
            $query->execute();
        }
        
        $query->close();

    }





    function editJajiTajwidResult($count, $envelope_id){
        global $connect;

        for ($i=0; $i < $count; $i++) {

            $jaji = $_POST['jaji'][$i];
            $nu_ta = $_POST['nu_ta'][$i];
            $mim_sak = $_POST['mim_sak'][$i];
            $qal = $_POST['qal'][$i];
            $idgh = $_POST['idgh'][$i];
            $kz_mad = $_POST['kz_mad'][$i];
            $wa_ib = $_POST['wa_ib'][$i];

            $query = $connect->prepare("UPDATE tbl_tajwid SET tajwid_nu_ta = ?, tajwid_mim_sak = ?, tajwid_qal = ?, tajwid_idgh = ?, tajwid_kz_mad = ?, tajwid_wa_ib = ? WHERE envelope_id = ? AND user_id = ?");
            $query->bind_param('iiiiiiii', $nu_ta, $mim_sak, $qal, $idgh, $kz_mad, $wa_ib, $envelope_id, $jaji);
            $query->execute();
        }
        
        $query->close();

    }







    function editJajiTashjiiResult($count, $envelope_id){
        global $connect;

        for ($i=0; $i < $count; $i++) {

            $jaji = $_POST['jaji'][$i];
            $saka = $_POST['saka'][$i];
            $kib = $_POST['kib'][$i];
            $neno = $_POST['neno'][$i];
            $shakli = $_POST['shakli'][$i];
            $tajwid = $_POST['tajwid'][$i];

            $query = $connect->prepare("UPDATE tbl_tashjii SET tashjii_saka = ?, tashjii_kib = ?, tashjii_neno = ?, tashjii_shakli = ?, tashjii_tajwid = ? WHERE envelope_id = ? AND user_id = ?");
            $query->bind_param('iiiiiii', $saka, $kib, $neno, $shakli, $tajwid, $envelope_id, $jaji);
            $query->execute();
        }
        
        $query->close();

    }

    */

    #END CLASS
}