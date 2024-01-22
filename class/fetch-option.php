<?php
require_once 'connection.php';
require_once 'class/setting.php';

#START CLASS
class Option extends Setting{


    function fetchPrivellegeOption(){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_privellege WHERE privellege_status = ? ORDER BY privellege_id DESC");
        $query->bind_param('s',$status);
        $status = "active";
        $query->execute();

        $result = $query->get_result();
        
        if(mysqli_num_rows($result) >= 1){
            
            while($row = mysqli_fetch_assoc($result)){
                print("<option value=\"".$row['privellege_id']."\">".$row['privellege_option']."</option>");
            }
        }else{
            print("<option value=\"0\">--no privellege found in database--</option>");
        }
        
        $query->close();
    }




    function fetchCompertitionOption(){
        global $connect;
        
        $query =  $connect->prepare("SELECT * FROM tbl_compertition WHERE compertition_status <> ? ORDER BY compertition_id DESC");
        $query->bind_param('s',$status);
        $status = "deleted";
        $query->execute();

        $result = $query->get_result();
        
        if(mysqli_num_rows($result) >= 1){
            
            while($row = mysqli_fetch_assoc($result)){
                print("<option value='".$row['compertition_id']."'>".$row['compertition_name']." [".$row['compertition_date']."]</option>");
            }
        }else{
            print("<option value='0'>--no compertition found in database--</option>");
        }
        
        $query->close();
    }





    function fetchJuzuuOption(){

        for ($i=1; $i <= 30; $i++) { 
             print("<option value='".$i."'>".$i."</option>");
        }
    }

    

#END CLASS
}