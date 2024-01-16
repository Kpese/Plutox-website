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
  <div class="container text-center"> <!--container starts-->

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

      <h1 class="display-5">Movies Categories</h1>

      <nav class="nav justify-content-center mt-4 mb-2">
        <a class="nav-link btn btn-light" href="<?php url('/movies') ?>">Home</a>
        <a class="nav-link btn btn-light" href="<?php url('/movies/action') ?>">Action</a>
        <a class="nav-link btn btn-light" href="<?php url('/movies/adventure') ?>">Adventure</a>
        <a class="nav-link btn btn-light" href="<?php url('/movies/comedy') ?>">Comedy</a>
        <a class="nav-link btn btn-light" href="<?php url("/movies/comments") ?>">Comments</a>

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="<?php url('/movies/search') ?>" method="get" class="search-form">
            <input type="text" name="search" placeholder="Search">
            <!-- <button class="btn js-search-close"><span class="bi-x"></span></button> -->
            <button type="submit" class="border-1 mt-1 search">search</button>
          </form>

        </div><!-- End Search Form -->

      </nav>
      <div class="mb-5">
               <a href="https://www.facebook.com/samuelpeter.eigbe" target="_blank" class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-facebook text-light bg-dark rounded-4 bg-cover" viewBox="0 0 16 16">
                 <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                 </svg></a> 
                 <a href="https://wa.me/+2347063137059" target="_blank"  class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp text-light bg-dark rounded-circle" viewBox="0 0 16 16">
                  <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                  </svg></a>  
                  <a href="https://www.linkedin.com/in/peter-eigbe-687a3928b/" target="_blank"  class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-linkedin text-light bg-dark rounded-5" viewBox="0 0 16 16">
                  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                  </svg></a>
              </div>
    </div>