<?php
//require_once 'connection.php';
#START CLASS
class Sidebar{

    function Dashboard(){
        global $filename;

        print"<li class='";if ($filename == "admin.php" || $filename == "jaji.php" || $filename == "jaji-kiongozi.php") {echo "active";} print"'>
            <a href='home.php' class='selected "; if ($filename == "admin.php" || $filename == "jaji.php"|| $filename == "jaji-kiongozi.php") {echo "toggled waves-effect waves-block";} print"'>
                <i class='fa fa-tachometer-alt'></i>
                <span>Dashboard</span>
            </a>
        </li>";
    }


    function jajiKiongozi(){
        global $filename;

        print"<li class='";if ($filename == 'envelope.php') {echo 'active';} print"'>
            <a href='envelope.php' class='selected'>
                <i class='fa fa-envelope'></i>
                <span>Select Envelope</span>
            </a>
        </li>";
    }


     function audience(){
        global $filename;

        print"<li class='";if ($filename == 'audience.php') {echo 'active';} print"'>
            <a href='audience.php' class='selected'>
                <i class='fa fa-tachometer-alt'></i>
                <span>Dashboard</span>
            </a>
        </li>";
    }
    
    function viewResult(){
        global $filename;

        print"<li class='"; if ($filename == 'hifdhi-results.php' || $filename == 'tashjii-results.php' || $filename == 'more-results.php' || $filename == 'edit-results.php') {echo 'active';} print"'>
            <a href='#' onClick='return false;' class='menu-toggle'>
                <i class='fas fa-file-pdf'></i>
                <span>Final Results</span>
            </a>
            <ul class='ml-menu'>
                <li class='"; if ($filename == 'hifdhi-results.php') {echo 'active';} print"'>
                    <a href='hifdhi-results.php'>
                    <i class='fa fa-angle-right'></i>
                        <span>Hifdhi Results</span>
                    </a>
                </li>
                <li class='"; if ($filename == 'tashjii-results.php') {echo 'active';} print"'>
                    <a href='tashjii-results.php'>
                    <i class='fa fa-angle-right'></i>
                        <span>Tashjii Results</span>
                    </a>
                </li>";
                if ($_SESSION['jkqz_privellege'] == 'admin' || $_SESSION['jkqz_privellege'] == 'jaji kiongozi' || $_SESSION['jkqz_privellege'] == 'mudiru') {
                    print"<li class='"; if ($filename == 'more-results.php' || $filename == 'edit-results.php') {echo 'active';} print"'>
                    <a href='more-results.php'>
                    <i class='fa fa-angle-right'></i>
                        <span>More Results</span>
                    </a>
                </li>";
                }
            print"</ul>
        </li>";
    }



    function admin(){
        global $filename;

        print"<li class='"; if ($filename == 'view-user.php' || $filename == 'view-online-user.php' || $filename == 'view-participant.php' || $filename == 'view-envelope.php' || $filename == 'envelope.php' || $filename == 'user-log.php' || $filename == 'view-ayah.php'  || $filename == 'add-envelope-question.php') {echo 'active';} print"'>
            <a href='#' onClick='return false;' class='menu-toggle'>
                <i class='fas fa-server'></i>
                <span>Admin</span>
            </a>
            <ul class='ml-menu'>
                <li class='"; if ($filename == 'view-user.php') {echo 'active';} print"'>
                    <a href='view-user.php'>
                    <i class='fa fa-angle-right'></i>
                        <span>View User</span>
                    </a>
                </li>
                <li class='"; if ($filename == 'view-online-user.php') {echo 'active';} print"'>
                    <a href='view-online-user.php'>
                    <i class='fa fa-angle-right'></i>
                        <span>Who Is Online</span>
                    </a>
                </li>
                <li class='"; if ($filename == 'view-participant.php') {echo 'active';} print"'>
                    <a href='view-participant.php'>
                    <i class='fa fa-angle-right'></i>
                        <span>View Participant</span>
                    </a>
                </li>
                <li class='"; if ($filename == 'view-envelope.php') {echo 'active';} print"'>
                    <a href='view-envelope.php'>
                    <i class='fa fa-angle-right'></i>
                        <span>View Envelope</span>
                    </a>
                </li>
                <li class='"; if ($filename == 'envelope.php') {echo 'active';} print"'>
                    <a href='envelope.php'>
                    <i class='fa fa-angle-right'></i>
                        <span>Select Envelope</span>
                    </a>
                </li>
            </ul>
        </li>";
    }


    function systemSetting(){
        global $filename;

        print"<li class='"; if ($filename == 'envelope-question.php' || $filename == 'compertition.php' || $filename == 'view-column.php' || $filename == 'view-privellege.php') {echo 'active';} print"'>
            <a href='#' onClick='return false;' class='menu-toggle'>
                <i class='fas fa-cogs'></i>
                <span>System Setting</span>
            </a>
            <ul class='ml-menu'>
                <li class='"; if ($filename == 'compertition.php') {echo 'active';} print"'>
                    <a href='compertition.php'>
                    <i class='fa fa-angle-right'></i>
                        <span>Compertition</span>
                    </a>
                </li>
                <li class='"; if ($filename == 'envelope-question.php') {echo 'active';} print"'>
                    <a href='envelope-question.php'>
                    <i class='fa fa-angle-right'></i>
                        <span>Envelope Question</span>
                    </a>
                </li>
                <li class='"; if ($filename == 'view-column.php') {echo 'active';} print"'>
                    <a href='view-column.php'>
                    <i class='fa fa-angle-right'></i>
                        <span>Marking Column</span>
                    </a>
                </li>
                <li class='"; if ($filename == 'view-privellege.php') {echo 'active';} print"'>
                    <a href='view-privellege.php'>
                    <i class='fa fa-angle-right'></i>
                        <span>View Privellege</span>
                    </a>
                </li>
            </ul>
        </li>";
    }


#END CLASS
}