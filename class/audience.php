<?php
require_once 'class/jaji.php';

    #START CLASS
class Audience extends Jaji{

    function audienceDashboard(){
        if ($this->checkSelectedEnvelope() > 0) {
            $this->viewAyah();
        }else{
            if ($this->checkSelectedParticipant() > 0) {
                $this->showActiveParticipant();
            }else{
                print"<div id=\"ifr\" class='ifr'>
                    <div class=\"col-md-12\">
                        <div class=\"alert alert-info\" role=\"alert\" id=\"myAlert\">
                            <center><strong class=\"\"> Waiting for active participant <i class='fa fa-spinner fa-pulse'></i></strong></center>
                        </div>
                    </div>
                </div>";
            }
        }
    }




    function showAudience(){
        if ($this->checkSelectedEnvelope() > 0) {
            return $this->checkSelectedEnvelope();
        }else{
            if ($this->checkSelectedParticipant() > 0) {
                return $this->checkSelectedParticipant();
            }else{
                return 0;
            }
        }
    }




    function viewAyah(){
        global $connect;
        
        $query =  $connect->prepare("SELECT tbl_participant.participant_fname, tbl_participant.participant_mname, tbl_participant.participant_lname, tbl_participant.participant_type, tbl_envelope.envelope_number, tbl_envelope.envelope_juzuu, tbl_envelope.envelope_id, tbl_question.question_id, tbl_question.question_path FROM tbl_participant, tbl_participant_envelope, tbl_envelope, tbl_question WHERE tbl_participant.participant_id = tbl_participant_envelope.participant_id AND tbl_participant_envelope.envelope_id = tbl_envelope.envelope_id AND tbl_envelope.envelope_id = tbl_question.envelope_id AND tbl_envelope.envelope_status = ? AND tbl_question.question_status <> ?");
        $query->bind_param('ss', $active, $status);
        $active = "active";
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
                    print "<a href='#qs".$i."' data-toggle='tab' class='show active'>Qsn ".$i."</a>";
                }else{
                    print "<a href='#qs".$i."' data-toggle='tab' class=''>Qsn ".$i."</a>";
                }
                print "</li>";
            }

            print "</ul>
                <center><div class='tab-content'>";
            while($row = mysqli_fetch_assoc($result)){
                $title = $row['participant_fname']." ".$row['participant_mname']." ".$row['participant_lname']." - Envelope number ".$row['envelope_number'].", Juzuu ".$row['envelope_juzuu'];
                if ($qsn == 1) {
                    print "<div role='tabpanel' class='tab-pane fade in active show' id='qs".$qsn."'>";
                }else{
                    print"<div role='tabpanel' class='tab-pane fade in' id='qs".$qsn."'>";
                }
                print "<div class='sticky'>";
                $this->generateJajiTableHead($row['question_id'], $_SESSION['jkqz_privellege'], $_SESSION['jkqz_id'], $title, $row['participant_type']);
                print"</div>
                    <img class='img-responsive max-width' src='".$row['question_path']."'/>
                </div>";
                $envelope_number = $row['envelope_number'];
                $envelope_juzuu = $row['envelope_juzuu'];
                $qsn+=1;
            }
            print "</div>
            </center>
                <!--start modal to hide ayah at first time to audience-->
                <div class='modal fade' id='button' onclick='showOverlay()' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
                    <div class='modal-dialog modal-dialog-centered' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalCenterTitle'>Selected envelope questions
                                </h5>
                            </div>
                            <div class='modal-body center'>
                                <span style='font-size:10em; font-weight:bold'>
                                    ".$envelope_number."
                                </span>
                                <span style='font-size:3em'> 
                                    <b></b> JUZUU ".$envelope_juzuu."
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end modal to hide ayah at first time to audience-->";
        }
        $query->close();
    }

    #END CLASS
}