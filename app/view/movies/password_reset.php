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
    <!-- Favicon-->
  <link rel="shortcut icon" href="<?php url('/favicon/favicon-32x32.png') ?>" type="image/x-icon">
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center position-relative py-5">
        <div class="card shadow-sm w-100 rounded overflow-hidden bg-none">
          <div class="card-body p-0">
            <div class="row gx-0 align-items-stretch"> 
              <!-- Logo & Information Panel-->
              <div class="col-lg-4">
                <div class="info d-flex justify-content-center flex-column p-4 h-100">
                  <div class="py-5 px-3">
                    <h1 class="display-3 fw-bold">Pluto<span class="text-danger">X</span></h1>
                    <p class="fw-light fs-3 mb-0">Reset Password</p>
                  </div>
                </div>
              </div>
              <!-- Form Panel    -->
              <div class="col-lg-8 bg-white">
            
                <div class="d-flex align-items-center flex-column px-4 px-lg-5 h-100">
             <div class="mt-4 ">
             <h1 class="display-5 ">Password Reset</h1>
              <p>Enter your email address below, and we'll send you a link to reset your password.</p>
            </div>
            <?php
                  if(isset($_GET['reset']) && $_GET['reset'] == 'success') : ?>
                    <div class="alert alert-danger">
                    <p>Please check your email</p>
                    </div>
                  <?php endif; ?> 
                  <form class="login-form py-5 w-75" method="POST" action="<?php url('/movies/reset_request') ?>">
                  <div class="input-material-group mb-3">
                      <input class="input-material" type="email" name="email"  value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''  ?>">
                      <label class="label-material pb-2">Email Address</label>
                    </div>
                    <button class="btn btn-primary mb-3" name="reset_password" type="submit">Reset Password</button>

                   <p class="mb-0 mt-5">Remember?</p> 
                   <a class="text-sm text-paleBlue" href="<?php url('/movies/signin') ?>">Signin</a>
                   
                  </form>  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   <!-- JavaScript files-->
   <script src="<?php url('/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php url('/js/Chart.min.js') ?>"></script>
    <script src="<?php url('/js/just-validate.min.js') ?>"></script>
    <script src="<?php url('/js/choices.min.js') ?>"></script>
    <script src="<?php url('/js/charts-home.js') ?>"></script>
    <!-- Main File-->
    <script src="<?php url('/js/front.js') ?>"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>