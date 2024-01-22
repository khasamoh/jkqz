<?php
include "session.php";
if(isset($_SESSION['jkqz_privellege'])){
    if ($_SESSION['jkqz_privellege'] == "admin") {
    print"<script>window.location.href = 'admin.php';</script>";
    }elseif ($_SESSION['jkqz_privellege'] == "mudiru") {
        print"<script>window.location.href = 'jaji.php';</script>";
    }elseif ($_SESSION['jkqz_privellege'] == "audience") {
        print"<script>window.location.href = 'audience.php';</script>";
    }elseif ($_SESSION['jkqz_privellege'] == "envelope") {
        print"<script>window.location.href = 'envelope.php';</script>";
    }elseif ($_SESSION['jkqz_privellege'] == "jaji kiongozi") {
        print"<script>window.location.href = 'jaji-kiongozi.php';</script>";
    }elseif ($_SESSION['jkqz_privellege'] == "jaji hifdhi") {
        print"<script>window.location.href = 'jaji.php';</script>";
    }elseif ($_SESSION['jkqz_privellege'] == "jaji makharij") {
        print"<script>window.location.href = 'jaji.php';</script>";
    }elseif ($_SESSION['jkqz_privellege'] == "jaji tajwid") {
        print"<script>window.location.href = 'jaji.php';</script>";
    }elseif ($_SESSION['jkqz_privellege'] == "jaji tashjii") {
        print"<script>window.location.href = 'jaji.php';</script>";
    }else{
        print"<script>window.location.href = 'out.php';</script>";
    }
}else{
    print"<script>alert('no session prv')</script>";
}
?>