<?php require_once "inc/adminheader.php"  ?>
<?php use function App\config\url; ?>

        <div class="content-inner w-100">
          <!-- Page Header-->
          <header class="bg-white shadow-sm px-4 py-3 z-index-20">
            <div class="container-fluid px-0">
              <h2 class="mb-0 p-1">Create Posts</h2>
            </div>
          </header>

<div class="mt-4 m-5 row">
        <form method="post" action="<?php url('/admin/create') ?>" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-4">
                <label>Category id:</label>
                <input type="number" max="3" min="1" class="form-control" name="cat_id" required>
            </div>
            <div class="col-lg-4">
                <label>Title:</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="col-lg-4">
                <label>Stars:</label>
                <input type="text" class="form-control" placeholder="e.g sam, peace" name="star" required>
            </div>
            <div class="col-lg-4">
                <label>Released Year:</label>
                <input type="text" class="form-control" name="release_year" placeholder="2024" required>
            </div>

            <div class="col-lg-4">
                <label>Links:</label>
                <input type="text" class="form-control" name="link" placeholder="http://www..." required>
            </div>

            <div class="col-lg-4">
                <label>video_Links:</label>
                <input type="text" class="form-control" name="video_link" placeholder="http://www..." required>
            </div>

            <div class="col-lg-4">
                <label>Directed By:</label>
                <input type="text" class="form-control" name="directed_by" placeholder="samuel" required>
            </div>
            
            </div>
            <div class="">
                <label>Description:</label>
                <textarea name="description" class="mysummernote" required placeholder="post your description here"></textarea>
            </div>
            <div class="col-lg-3 mt-3">
                <label>Images:</label><br>
                <input type="file" name="images" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
        </div>
        <?php require_once "inc/adminfooter.php"  ?>