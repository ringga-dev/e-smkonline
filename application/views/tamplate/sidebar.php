<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-<sup>School</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('ui_con/Dashboard') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- user menu -->
    <?php
    $role_id =  $this->session->userdata('role_id');

    $queryMenu = "SELECT `user_menu`.* FROM `user_menu` 
                    JOIN `user_akses_menu` ON `user_menu`.`id` = `user_akses_menu`.`menu_id` 
                    WHERE `user_akses_menu`.`role_id` = $role_id AND `user_akses_menu`.`is_aktif` = 1
                    ORDER BY `user_akses_menu`.`menu_id` ASC";
    $menu = $this->db->query($queryMenu)->result_array();
    foreach ($menu as $m) :

    ?>

        <li class="nav-item">
            <a class="nav-link collapsed" data-toggle="collapse" data-target="#<?= $m['menu'] ?>" aria-expanded="true" aria-controls="<?= $m['menu'] ?>">
                <i class="fas fa-fw <?= $m['logo'] ?>"></i>
                <span><?= $m['menu'] ?></span>
            </a>
            <?php
            $menuid = $m['id'];
            $querySubMenu = "SELECT `user_sub_menu`.*
                                FROM `user_sub_menu` JOIN `user_menu` 
                                ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                                WHERE `user_sub_menu`.`menu_id` = $menuid 
                                AND `user_sub_menu`.`is_aktif` = 1";
            $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

            <div id="<?= $m['menu'] ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <?php foreach ($subMenu as $sm) : ?>
                        <a class="collapse-item" href="<?= base_url() . $sm['url'] ?>"><?= $sm['title'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php endforeach; ?>



    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Addons
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item active" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> -->
</ul>
<!-- End of Sidebar -->