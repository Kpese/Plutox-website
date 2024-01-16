<?php require_once "inc/adminheader.php"  ?>
<?php use function App\config\url; ?>

      <div class="content-inner w-100">
        <!-- Page Header-->
        <header class="bg-white shadow-sm px-4 py-3 z-index-20">
          <div class="container-fluid px-0">
            <h2 class="mb-0 p-1">Comments</h2>
          </div>
        </header>

        <div class="text-center mt-3">
          <ul>
            <?php foreach ($rows as $row): ?>
              <div class="card mb-4 w-75" style=" margin:auto">
                <h5 class="card-header">
                  <?php echo ucfirst($row['title']) ?> Movies
                  <a href="<?php url('/admin/deleteComment/'.$row['id']) ?>" type="submit" name="submit" class="btn btn-primary btn-SM">Delete Comment</a>
                </h5>
                <div class="card-body">
                  <span>
                    <?php echo $row['message'] ?>
                  </span>
                  <h5 class="card-title"><span class="text-warning-emphasis fs-6"><em>by
                        <?php echo ucfirst($row['name']) ?>
                      </em></span></h5>
                </div>
              </div>
            <?php endforeach; ?>
          </ul>
        </div>

        <?php require_once "inc/adminfooter.php"  ?>