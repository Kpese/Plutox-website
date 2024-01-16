<?php
use function App\config\url; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php url('/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php url('/css/style.css') ?>">

  <link rel="shortcut icon" href="<?php url('/favicon/favicon-32x32.png') ?>" type="image/x-icon">
  <title>PlutoX</title>
</head>

<body>

<div class="container mt-3 mb-0">
  <div class="brand fs-3 fw-bold text-body-info ">
    PlutoX
  </div>
</div>

  <div class="container text-center mt-1"> <!--container starts-->

  <div class="justify-content-between d-flex mb-3">
      <div class="text-danger">
        <em>Welcome
          <?php echo strtolower($_SESSION['name']) ?>
        </em>
      </div>

      <div class="d-flex ms-4">
        <a class="btn btn-light text-danger btn-sm" href="<?php url('/movies/logout') ?>" role="button">Logout</a>

        <button id="toggleButton" class="ms-2 rounded">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
            class="bi bi-moon-fill fa-moon  rounded-circle p-1  rounded-circle text-dark" viewBox="0 0 16 16">
            <path
              d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278" />
          </svg>
        </button>
      </div>
    </div>

    <div class="bg-gradient">

    <h1 class="display-5 text-center">Comments Section</h1>
<nav class="nav justify-content-center  mb-4">
      <a class="nav-link btn btn-light" href="<?php url('/movies') ?>" role="button">Home</a>
      <a class="nav-link btn btn-light" href="<?php url('/movies/action') ?>">Action</a>
      <a class="nav-link btn btn-light" href="<?php url('/movies/adventure') ?>">Adventure</a>
      <a class="nav-link btn btn-light" href="<?php url('/movies/comedy') ?>">Comedy</a>

      
        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="<?php url('/movies/search')  ?>" method="get" class="search-form">
            <input type="text" name="search" placeholder="Search">
            <!-- <button class="btn js-search-close"><span class="bi-x"></span></button> -->
            <button type="submit" class="border-1 mt-1 search">search</button>
          </form>
          
        </div><!-- End Search Form -->
    </nav>
</div>