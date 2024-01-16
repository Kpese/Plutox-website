
<?php use function App\config\url; ?>
        <!-- Page Footer-->
        <footer class="position-absolute bottom-0 bg-darkBlue text-white text-center py-3 w-100 text-xs" id="footer">
            <div class="container-fluid">
              <div class="row gy-2">
                <div class="col-sm-6 text-sm-start">
                <p class="mb-0">Pluto<span class="text-danger">X </span> &copy; <?php echo date(format: '2023 - Y');?></p>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
     <!-- JavaScript files-->

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

     <script src="<?php url('/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?php url('/js/Chart.min.js') ?>"></script>
    <script src="<?php url('/js/just-validate.min.js') ?>"></script>
    <script src="<?php url('/js/choices.min.js') ?>"></script>
    <script src="<?php url('/js/charts-home.js') ?>"></script>
    <!-- Main File-->
    <script src="<?php url('/js/front.js') ?>"></script>
    <script src="<?php url('/js/main.js') ?>"></script>
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
    
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
$(document).ready(function() {
    $(".mysummernote").summernote({
      height:250
    });
    $('.dropdown-toggle').dropdown();
});
</script>

  </body>
</html>