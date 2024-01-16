<?php use function App\config\url; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PlutoX </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="<?php url('/css/choices.min.css') ?>">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php url('/css/style.default.css') ?>" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php url('/css/custom.css') ?>">
    
  <link rel="shortcut icon" href="<?php url('/favicon/favicon-32x32.png') ?>" type="image/x-icon">

    
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  </head>

<body>

<div class="page">
    <!-- Main Navbar-->
    <header class="header z-index-50">
      <nav class="nav navbar py-3 px-0 shadow-sm text-white position-relative">
        <!-- Search Box-->
        <div class="search-box shadow-sm">
          <button class="dismiss d-flex align-items-center">
            <svg class="svg-icon svg-icon-heavy">
              <use xlink:href="#close-1"> </use>
            </svg>
          </button>
          <form id="searchForm" action="#" role="search">
            <input class="form-control shadow-0" type="text" placeholder="What are you looking for...">
          </form>
        </div>
        <div class="container-fluid w-100">
          <div class="navbar-holder d-flex align-items-center justify-content-between w-100">
            <!-- Navbar Header-->
            <div class="navbar-header">
              <!-- Navbar Brand --><a class="navbar-brand d-none d-sm-inline-block" href="url('/admin/index.php')">
                <div class="brand-text d-none d-lg-inline-block"><span>Admin </span><strong>Dashboard</strong></div>
                <div class="brand-text d-none d-sm-inline-block d-lg-none"><strong>BD</strong></div>
              </a>
              <!-- Toggle Button--><a class="menu-btn active" id="toggle-btn"
                href="#"><span></span><span></span><span></span></a>
            </div>
            <!-- Navbar Menu -->
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              <!-- Search-->
              <li class="nav-item d-flex align-items-center"><a id="search" href="#">
                  <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                    <use xlink:href="#find-1"> </use>
                  </svg></a></li>

              <!-- Languages dropdown    -->
              <!-- <li class="nav-item dropdown"><a class="nav-link text-white dropdown-toggle d-flex align-items-center" id="languages" href="#" data-bs-toggle="dropdown" aria-expanded="false"><img class="me-2" src="img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                  <ul class="dropdown-menu dropdown-menu-end mt-3 shadow-sm" aria-labelledby="languages">
                    <li><a class="dropdown-item" rel="nofollow" href="#"> <img class="me-2" src="img/flags/16/DE.png" alt="English"><span class="text-xs text-gray-700">German</span></a></li>
                    <li><a class="dropdown-item" rel="nofollow" href="#"> <img class="me-2" src="img/flags/16/FR.png" alt="English"><span class="text-xs text-gray-700">French                                         </span></a></li>
                  </ul>
                </li> -->
              <!-- Logout    -->
              <li class="nav-item"><a class="nav-link text-white" href="<?php url('/admin/logout') ?>"> <span
                    class="d-none d-sm-inline">Logout</span>
                  <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                    <use xlink:href="#security-1"> </use>
                  </svg></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="page-content d-flex align-items-stretch">
      <!-- Side Navbar -->
      <nav class="side-navbar z-index-40">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center py-4 px-3"><img
            class="avatar shadow-0 img-fluid rounded-circle" src="<?php url('/assets/img/admin.jpg') ?>" alt="...">
          <div class="ms-3 title">
            <h1 class="h4 mb-2"><?php echo $_SESSION['name'] ?></h1>
            <p class="text-sm text-gray-500 mb-1"><?php echo $_SESSION['profession'] ?></p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span
          class="text-uppercase text-gray-400 text-xs letter-spacing-0 mx-3 px-2 heading">Main</span>
        <ul class="list-unstyled py-4">
          <li class="sidebar-item"><a class="sidebar-link" href="<?php url('/admin/index') ?>">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#real-estate-1"> </use>
              </svg>Home </a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="<?php url('/admin/create') ?>">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#portfolio-grid-1"> </use>
              </svg>Create </a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="<?php url('/admin/update') ?>">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#sales-up-1"> </use>
              </svg>Update </a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="<?php url('/admin/delete') ?>">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#survey-1"> </use>
              </svg>Delete </a></li>
          <li class="sidebar-item"><a class="sidebar-link" href="<?php url('/admin/comment') ?>">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#survey-1"> </use>
              </svg>Comment </a></li>

          <li class="sidebar-item"><a class="sidebar-link" href="<?php url('/admin/login') ?>">
              <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                <use xlink:href="#disable-1"> </use>
              </svg>Login page </a></li>
        </ul>
      </nav>