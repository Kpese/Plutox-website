<?php require_once "inc/movieheader.php"  ?>
<?php use function App\config\url; ?>


<h4 class="fw-normal">Comedy Categories</h4>
<div class="container mt-2">
<div class="d-flex justify-content-evenly">
<nav class="nav justify-content-center mb-4">
      <a class="nav-link btn btn-light" href="<?php url('/movies/action') ?>" role="button">Action</a>
      <a class="nav-link btn btn-light" href="<?php url('/movies/adventure') ?>">Adventure</a>
    </nav>
</div>
</div>

<div class="container" >
<div style="display:flex; justify-content:center"> <!-- image body starts-->
    <div class="row mt-5"> <!--rows starts-->
    <?php foreach($rows as $row) : ?>
      <div class="col-xxl-6 col-lg-12 col-md-12 col-sm-12 mb-4">
<div class="card h-100 rounded-5 shadow" style="max-width:700px">
  <div class="row">
    <div class="col-md-5">
  <img src="<?php url('/assets/img/');echo $row['images']?>" class="image-fluid rounded-5 w-100" alt="...">
    </div>
    <div class="col-md-7">
      <div class="card-body">
      <h3 class="card-title fw-normal"><?php echo ucfirst($row['title']) ?></h3>
    <p class="card-text text-danger">Genre: <?php echo $row['category'] ?></p>
    <p class="card-text mb-0"> <?php echo substr($row['description'], 0, 180).'...' ?></p>
    <a href="<?php url('/movies/single_page/'.$row['id']) ?>" class='text-decoration-none text-danger'> read more</a>
    <p class="card-text mt-3 mb-0"><span class="fs-6 fw-medium">Stars:</span> <?php echo $row['main_star'] ?></p> 
    <p class="card-text mb-0"><span class="fs-6 fw-medium">Released Date:</span> <?php echo $row['release_year'] ?></p>
      </div>
    </div>
  </div>
</div>
  </div>
<?php endforeach; ?>

</div> <!-- rows ends-->
</div>  <!-- image body ends-->
</div>

<?php require_once "inc/moviefooter.php"  ?>