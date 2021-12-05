<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $judul; ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/vendor/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/vendor/node_modules/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/vendor/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/vendor/node_modules/selectric/public/selectric.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/vendor/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/vendor/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/vendor/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url(); ?>public/vendor/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url(); ?>public/vendor/assets/css/components.css">
    
    <!-- jquery -->
    <script src="<?= base_url(); ?>public/vendor/node_modules/jquery/dist/jquery.min.js"></script>
</head>

<body style="background-color:#F8FAFB;">
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg" style="background-color:#A569BD ;"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>

                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>

                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url(); ?>public/img/profile/<?= $user_session['image']; ?>" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= $user_session['nama_admin']; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="<?= base_url('member'); ?>" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="<?= base_url('setting/index'); ?>" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <?php
            $level_id = $this->session->userdata('level_id');
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
            $queryMenu = "SELECT `user_menu`.`id`, `nama_menu`
                        FROM `user_menu` JOIN `user_access_menu`
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`.`level_id` = $level_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";

            $menu = $this->db->query($queryMenu)->result_array();
            ?>
            <div class="main-sidebar" style="background-image:linear-gradient(#DAE2F8,#D6A4A4);">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand mt-2">
                        <img alt="image" style="width:60px; height:60px; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.5);" src="<?= base_url(); ?>public/img/profile/<?= $user_session['image']; ?>" class="rounded-circle mr-1">
                        <br>
                        <b><i class="fas fa-circle text-success"></i> Online</b>
                    </div>
                    <hr>
                    <ul class="sidebar-menu">
                        <?php foreach ($menu as $m) : ?>
                            <li style="font-size:11px;" class="menu-header text-dark"><?= $m['nama_menu']; ?></li>
                            <?php
                            $menu_id = $m['id'];
                            $querySubMenu = "SELECT * FROM `user_sub_menu` JOIN `user_menu`
                                            ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                            WHERE `user_sub_menu`.`menu_id` = $menu_id
                                            AND `user_sub_menu`.`is_active` = 1";

                            $sub_menu = $this->db->query($querySubMenu)->result_array();
                            ?>
                            <?php foreach ($sub_menu as $sm) : ?>
                                <li class=""><a class="nav-link" href="<?= base_url($sm['url']); ?>"><i class="text-dark <?= $sm['icon']; ?>" style="font-size:15px;"></i> <span class="text-dark" style="font-size:12px;"><?= $sm['menu']; ?></span></a></li>
                            <?php endforeach; ?>
                            <hr>
                        <?php endforeach; ?>
                        <!-- <li style="font-size:11px;" class="menu-header text-dark">Settings</li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i style="font-size:15px;" class="fas fa-sliders-h text-dark"></i><span class="text-dark">Menu</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?= base_url('admin/roleUser'); ?>"></i>Menu Management</a></li>
                                <li><a class="nav-link" href="<?= base_url('admin/userMenu'); ?>"></i>User Menu</a></li>
                                <li><a class="nav-link" href="<?= base_url('admin/subMenu'); ?>"></i>Sub Menu</a></li>
                            </ul>
                        </li> -->
                        <hr>
                </aside>
            </div>