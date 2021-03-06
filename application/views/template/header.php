<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="<?= base_url() ?>assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url() ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url() ?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url() ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!-- FullCalendar -->
    <link href='<?= base_url() ?>assets/vendor/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />
    <!-- Main CSS-->
    <link href="<?= base_url() ?>assets/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <?php $a = $this->session->userdata('datauser'); ?>
        <header class="header-desktop3 d-none d-lg-block">
            <div class="section__content section__content--p35">
                <div class="header3-wrap">
                    <div class="header__logo">
                        <a href="<?= base_url('home'); ?>">
                            <img src="<?= base_url() ?>assets/images/icon/logo1.png" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__navbar">
                        <ul class="list-unstyled">
                            <li class="has-sub">
                                <a href="<?= base_url('home') ?>">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="bot-line"></span>
                                </a>
                            </li>
                            <?php if ($a['level'] != 2) : ?>
                                <li>
                                    <a href="<?= base_url('home/jadwal') ?>">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span class="bot-line"></span>Jadwal</a>
                                </li>
                            <?php endif; ?>
                            <?php if ($a['level'] == 1) { ?>
                                <li>
                                    <a href="<?= base_url('inspeksi') ?>">
                                        <i class="fas fa-trophy"></i>
                                        <span class="bot-line"></span>Inspeksi</a>
                                </li>
                            <?php } ?>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Pages
                                </a>
                                <ul class="header3-sub-list list-unstyled">
                                    <li>
                                        <a href="<?= base_url('inspeksi/harian') ?>">Harian</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('inspeksi/apar') ?>">Apar</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('inspeksi/hydrant') ?>">Hydrant</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('inspeksi/fire') ?>">Fire Alarm</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('inspeksi/p3k') ?>">P3K</a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('inspeksi/shk') ?>">SHK</a>
                                    </li>
                                </ul>
                            </li>
                            <?php if ($a['level'] == 0) { ?>
                                <li>
                                    <a href="<?= base_url('home/user') ?>">
                                        <i class="fas fa-user"></i>
                                        <span class="bot-line"></span>User</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="header__tool">
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="<?= base_url() ?>assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#"><?php echo $a['username']; ?>
                                    </a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="<?= base_url() ?>assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#"><?php echo $a['username'];
                                                            ?></a>
                                            </h5>
                                            <!-- <span class="email">johndoe@example.com</span> -->
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="<?= base_url('login/logout') ?>">
                                            <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP-->

        <!-- HEADER MOBILE-->
        <header class="header-mobile header-mobile-2 d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?= base_url('home'); ?>">
                            <img src="<?= base_url() ?>assets/images/icon/logo1.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="<?= base_url('home') ?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <?php if ($a['level'] != 2) { ?>
                            <li>
                                <a href="<?= base_url('home/jadwal') ?>">
                                    <i class="fas fa-calendar-alt"></i>Jadwal</a>
                            </li>
                        <?php } ?>
                        <?php if ($a['level'] == 1) { ?>
                            <li>
                                <a href="<?= base_url('inspeksi') ?>">
                                    <i class="far fa-check-square"></i>Inspeksi</a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="<?= base_url('inspeksi/harian') ?>">
                                <i class="fas fa-table"></i>Harian</a>
                        </li>
                        <li>
                            <a href="<?= base_url('inspeksi/apar') ?>">
                                <i class="fas fa-table"></i>Apar</a>
                        </li>
                        <li>
                            <a href="<?= base_url('inspeksi/hydrant') ?>">
                                <i class="fas fa-table"></i>Hydrant</a>
                        </li>
                        <li>
                            <a href="<?= base_url('inspeksi/p3k') ?>">
                                <i class="fas fa-table"></i>P3k</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="<?= base_url('inspeksi/fire') ?>">
                                <i class="fas fa-table"></i>Fire Alarm</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="<?= base_url('inspeksi/shk') ?>">
                                <i class="fas fa-table"></i>SHK</a>
                        </li>
                        <?php if ($a['level'] == 0) { ?>
                            <li>
                                <a href="<?= base_url('home/user') ?>">
                                    <i class="fas fa-user"></i>User</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="sub-header-mobile-2 d-block d-lg-none">
            <div class="header__tool">
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="<?= base_url() ?>assets/images/icon/avatar-01.jpg" alt="John Doe" />
                        </div>
                        <div class="content">
                            <a class="js-acc-btn" href="#"><?= $a['username']; ?></a>
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="info clearfix">
                                <div class="image">
                                    <a href="#">
                                        <img src="<?= base_url() ?>assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="name">
                                        <a href="#"><?= $a['username']; ?></a>
                                    </h5>
                                    <!-- <span class="email">johndoe@example.com</span> -->
                                </div>
                            </div>
                            <div class="account-dropdown__footer">
                                <a href="<?= base_url('login/logout') ?>">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HEADER MOBILE -->