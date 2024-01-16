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
        <h1 class="display-1 fw-bold mb-5"> 404 </h1>

        <h2 class="fw-bold mb-3">Page not found</h2>

        <p>Oops! the page you're looking for does not exist. It might have been moved or deleted.</p>

        <a class="btn btn-primary mt-5" href="<?php url('/movies') ?>" role="button">back to home</a>

    </div>


</body>

</html>