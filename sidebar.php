<div class="menu">
    <ul class="list">
        <?php
        include 'class/sidebar-menu.php';
        $menu = new Sidebar();

        $filename = basename($_SERVER['PHP_SELF']);
        #Start call Menu Sidebar
        if ($_SESSION["jkqz_privellege"] == "admin") {
            $menu->Dashboard();
            $menu->admin();
            $menu->systemSetting();
            $menu->viewResult();
        }

        if ($_SESSION["jkqz_privellege"] == "mudiru") {
            $menu->Dashboard();
        }

        if ($_SESSION["jkqz_privellege"] == "jaji kiongozi") {
            $menu->Dashboard();
            $menu->jajiKiongozi();
            $menu->viewResult();
        }

         if ($_SESSION["jkqz_privellege"] == "audience") {
            $menu->audience();
        }

        if ($_SESSION["jkqz_privellege"] == "jaji hifdhi" || $_SESSION["jkqz_privellege"] == "jaji makharij" || $_SESSION["jkqz_privellege"] == "jaji tajwid" || $_SESSION["jkqz_privellege"] == "jaji tashjii") {
            $menu->Dashboard();
        }
        #End call Menu Sidebar
        ?>  
    </ul>
</div>