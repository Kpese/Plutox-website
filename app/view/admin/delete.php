<?php use function App\config\url; ?>

<?php require_once "inc/adminheader.php"  ?>

        <div class="content-inner w-100">
          <!-- Page Header-->
          <header class="bg-white shadow-sm px-4 py-3 z-index-20">
            <div class="container-fluid px-0">
              <h2 class="mb-0 p-1">Delete Posts</h2>
            </div>
          </header>
       
          <div class="mt-4 m-5 row">
        <form method="post" action="<?php url('/admin/delete') ?>" enctype="multipart/form-data">
          <div class="row">

            <div class="col-lg-6">
                <label>Title:</label>
                <input type="text" class="form-control" name="title" placeholder="delete by movie name" required>
            </div>
            <div class="col-lg-6">
            <button type="submit" name="submit" class="btn btn-primary mt-3 btn-lg">Delete Post</button>
            </div>
        </form>
        </div>


        <?php require_once "inc/adminfooter.php"  ?>