<?php
use function App\config\url;
// require_once "../../config/Helpers.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php url('/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php url('/css/style.css') ?>">

    <title>PlutoX</title>
</head>
<body>
<div class="container text-center mt-5"> <!--container starts-->
<div class="d-flex ms-4 mb-4">
      <a class="btn btn-light text-danger btn-sm" href="<?php url('/movies/logout') ?>" role="button">Logout</a>

      <button id="toggleButton" class="ms-2 rounded">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
            class="bi bi-moon-fill fa-moon  rounded-circle p-1  rounded-circle text-dark" viewBox="0 0 16 16">
            <path
              d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278" />
          </svg>
        </button>
      </div>
<div class="bg-gradient">
<h1 class="display-5">Movies Categories</h1>
<nav class="nav justify-content-center  mb-4">
      <a class="nav-link btn btn-light" href="<?php url('/movies') ?>" role="button">Home</a>
      <a class="nav-link btn btn-light" href="<?php url("/movies/comments") ?>">Comments</a>
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
<div class="container text-center mt-5 mb-5"> <!--container starts-->
            <!-- ======= Single Post Content ======= -->
            <div class="single-post">
          
              <h1 class="mb-5 mt-4">Movie: <span class="text-warning-emphasis mb-0"><?php echo $rows['title'] ?></span> </h1>
              <p class="card-text"><span class="fw-bold mt-0">Directed By: </span><?php echo $rows['directed_by'] ?></p>
              <figure class="my-4">
                <!-- <img src="../../../public/assets/img/<?php echo $rows['images'] ?>" alt="" class="image-fluid single-page rounded-5"> -->
<iframe src="<?php echo $rows['video_link'] ?>" height="550px" width="100%" frameborder="0"  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" ></iframe>
                <!-- <div class="single-post-thumb-outer single-post-video-outer"><div class="post-thumb iframe-video"><iframe title="SUNRISE Trailer (2024) 
                Alex Pettyfer, Guy Pearce"  frameborder="0" allowfullscreen=""  class=" lazyloaded"></iframe></div></div> -->
                <figcaption>Click here to download <a class="text-decoration-none fs-4 text-warning" href="<?php echo $rows['link'] ?>">movie</a></figcaption>
              </figure>
              <p class="card-text mb-0"><?php echo htmlspecialchars_decode(nl2br($rows['description']))?></p>
              <!-- nl2br -->
</div><!-- End Single Post Content -->
</div>
<!-- ======= Comments Form ======= -->

<h5 class="comment-title mb-3 text-center">Leave a Comment</h5>
  <form action="<?php  url('/movies/commentUpdate/'.$rows['id']) ?>" method="POST">
    <div class="row justify-content-center">
      <div class="col-lg-12 mb-3 w-75">
        <!-- <label for="comment-name">Name</label> -->
        <input type="text" name="name" required class="form-control" placeholder="Enter your name">
      </div>
      <div class="col-lg-12 mb-3 w-75">
        <!-- <label for="comment-message">Message</label> -->
        <textarea class="form-control" required name="message" placeholder="Enter your message"rows="5"
          ></textarea>
      </div>
      <div class="col-12 text-center mb-3">
        <input type="submit" name="submit" class="btn btn-primary" value="Post comment">
      </div>
    </div>
  </form>
<!-- End Comments Form -->

<?php require_once "inc/moviefooter.php"  ?>