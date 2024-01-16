<?php require_once "inc/commentheader.php"  ?>
<?php use function App\config\url; ?>



<div class="text-center">
<ul>
  <?php foreach($rows as $row) : ?>
    <div class="card mb-4 w-75" style=" margin:auto"> 
  <h5 class="card-header"><?php echo ucfirst($row['title'])?> Movies</h5>
  <div class="card-body">
  <span><?php echo $row['message']?></span>
    <h5 class="card-title"><span class="text-warning-emphasis fs-6"><em>by <?php echo ucfirst($row['name'])?></em></span></h5>
    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
<?php endforeach;?>
</ul>
</div>
  </div>
  
  <?php require_once "inc/moviefooter.php"  ?>