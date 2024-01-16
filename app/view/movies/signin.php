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
                    <p class="fw-light fs-3 mb-0">Login</p>
                  </div>
                </div>
              </div>
              <!-- Form Panel    -->
              <div class="col-lg-8 bg-white">

                <?php if(isset($error) && !empty($error)) : ?>
                  <div class="alert alert-danger">
                  <ul>
                    <?php foreach($error as $error): ?>
                      <li> <?php echo $error ?></li>
                    <?php endforeach; ?>
                  </ul>
                  </div>
                  <?php endif; ?>

                <div class="d-flex align-items-center px-4 px-lg-5 h-100">
                  <form class="login-form py-5 w-100" method="POST" action="<?php url('/movies/signin') ?>">
                  <div class="input-material-group mb-3">
                      <input class="input-material" type="email" name="email"  value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''  ?>">
                      <label class="label-material pb-2">Email Address</label>
                    </div>
                    <div class="input-material-group mb-4">
                      <input class="input-material" id="login-password" type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
                      <label class="label-material" for="login-password">Password</label>
                    </div>
                    <button class="btn btn-primary mb-3" name="moviesubmit" type="submit">Login</button><br><a class="text-sm text-paleBlue" href="<?php url('/movies/password_reset') ?>">Forgot Password?</a><br><small class="text-gray-500">Do not have an account? </small><a class="text-sm text-paleBlue" href="<?php url('/movies/signup') ?>">Signup</a>
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