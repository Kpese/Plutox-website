
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
    <link rel="stylesheet" href="<?php url('/style.css') ?>">
    <title>PlutoX</title>
</head>
<body class="bg-dark text-light">

<div class="container text-center mt-5"> <!--container starts-->
<span class="">
<a class="btn btn-primary me-3" href="<?php url('/movies/signin') ?>" role="button">Sign In</a>
<a class="btn btn-primary" href="<?php url('/movies/signup') ?>" role="button">Sign Up</a>
</span>
<div class="bg-gradient mt-3">
<p class="display-4 fw-bold">Welcome to Pluto<span class=" text-danger">X</span></p>

<p>This is best place to get amazing review of different categories of movies.</p>
<p>click here to view </p><a class="btn btn-primary" href="<?php url('/movies') ?>">MOVIE REVIEWS</a>

</div>

  
</body>
</html>