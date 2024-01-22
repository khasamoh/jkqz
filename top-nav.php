    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header" style="">
                <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="#" onClick="return false;" class="bars"></a>
                <a class="navbar-brand" href="home.php">
                    <img src="images/jkqz_logo.png" alt="" style="max-width:42px;">
                    <span class="logo-name"><b>J K Q Z</b></span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="pull-left">
                    <li>
                        <a href="#" onClick="return false;" class="sidemenu-collapse">
                            <i class="material-icons">reorder</i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- #START NAV-BAR RIGHT -->
                    <li class="dropdown user_profile">
                        <a href="#" onClick="return false;" class="dropdown-toggle" data-toggle="dropdown"
                            role="button" style="padding-right:20px">
                            <?php
                               print("<img src='assets/images/".$_SESSION['picture']."' width='32' height='32' alt='User'>");
                            ?>
                            <b>
                            <?php
                                if (!empty($_SESSION['jkqz_privellege'])) {
                                   echo $_SESSION['jkqz_name']."(<b>".$_SESSION['jkqz_privellege']."</b>)";
                                }else{
                                    echo 'user';
                                }
                            ?>
                            </b>
                        </a>
                        <ul class="dropdown-menu pullDown">
                            <li class="body">
                                <ul class="user_dw_menu">
                                    <!--<li>
                                        <a href="#">
                                            <i class="material-icons">person</i>Profile
                                        </a>
                                    </li>-->
                                    <li>
                                        <a class="darkTheme">
                                            <i class="material-icons">brightness_2</i> Dark Mode
                                        </a>
                                    </li>
                                    <li>
                                        <a class="lightTheme">
                                            <i class="material-icons">brightness_6</i>Light Mode
                                        </a>
                                    </li>
                                    <li>
                                        <a href="out.php">
                                            <i class="material-icons">power_settings_new</i>Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- #END NAV-BAR RIGHT -->
                </ul>
            </div>
        </div>
    </nav>