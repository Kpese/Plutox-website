<?php use function App\config\url; ?>

<?php require_once "inc/adminheader.php"  ?>

        <div class="content-inner w-100">
          <!-- Page Header-->
          <header class="bg-white shadow-sm px-4 py-3 z-index-20">
            <div class="container-fluid px-0">
              <h2 class="mb-0 p-1">Dashboard</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="pb-0">
            <div class="container-fluid">
              <div class="card mb-0">
                <div class="card-body">
                  <div class="row gx-5 bg-white">
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                      <div class="d-flex align-items-center">
                        <div class="icon flex-shrink-0 bg-violet">
                          <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#user-1"> </use>
                          </svg>
                        </div>
                        <div class="mx-3">
                          <h6 class="h4 fw-light text-gray-600 mb-3">Action<br>Movies</h6>
                        </div>
                        <div class="number"><strong class="text-lg"><?php echo $action ?></strong></div>
                      </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                      <div class="d-flex align-items-center">
                        <div class="icon flex-shrink-0 bg-red">
                          <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#survey-1"> </use>
                          </svg>
                        </div>
                        <div class="mx-3">
                          <h6 class="h4 fw-light text-gray-600 mb-3">Adventure<br>Movies</h6>
                        </div>
                        <div class="number"><strong class="text-lg"><?php echo $adventure ?></strong></div>
                      </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                      <div class="d-flex align-items-center">
                        <div class="icon flex-shrink-0 bg-green">
                          <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#numbers-1"> </use>
                          </svg>
                        </div>
                        <div class="mx-3">
                          <h6 class="h4 fw-light text-gray-600 mb-3">Comedy<br>Movies</h6>
                        </div>
                        <div class="number"><strong class="text-lg"><?php echo $comedy ?></strong></div>
                      </div>
                    </div>
                     <!-- Item -->
                     <div class="col-xl-3 col-sm-6 py-4 border-lg-end border-gray-200">
                      <div class="d-flex align-items-center">
                        <div class="icon flex-shrink-0 bg-warning">
                          <svg class="svg-icon svg-icon-sm svg-icon-heavy">
                            <use xlink:href="#user-1"> </use>
                          </svg>
                        </div>
                        <div class="mx-3">
                          <h6 class="h4 fw-light text-gray-600 mb-3">Comments<br>Section</h6>
                        </div>
                        <div class="number"><strong class="text-lg"><?php echo $comment ?></strong></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Dashboard Header Section -->
         
          <!-- Client Section-->
          <section class="pb-0">
            <div class="container-fluid">
              <div class="row gy-4">
                <!-- Work Amount  -->
                <div class="col-lg-6">
                  <div class="card mb-0">
                    <!-- <div class="card-close">
                      <div class="dropdown">
                        <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                        <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                      </div>
                    </div> -->
                    <div class="card-body d-flex flex-column">
                      <h3 class="pt-3 text-center">TOTAL POSTS</h3>
                      <div class="pie-with-centered-text text-center my-5">
                        <canvas class="z-index-20" id="pieChart"></canvas>
                        <div class="text"><strong class="display-1"><?php echo $total ?></strong></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Client Profile -->
                <div class="col-lg-6">
                  <div class="card mb-0">
                    <div class="card-close">
                      <div class="dropdown">
                        <button class="dropdown-toggle text-sm" type="button" id="closeCard1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>
                        <div class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="closeCard1"><a class="dropdown-item py-1 px-3 remove" href="#"> <i class="fas fa-times"></i>Close</a><a class="dropdown-item py-1 px-3 edit" href="#"> <i class="fas fa-cog"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-body text-center">
                      <div class="client-avatar mb-3"><img class="img-fluid w-75 rounded-circle shadow-0" src="<?php url('/assets/img/admin.jpg') ?>" alt="...">
                        <!-- <div class="status bg-green"></div> -->
                      </div>
                      <h3 class="fw-normal"><?php echo $_SESSION['name'] ?></h3>
                      <p class="text-sm text-gray-500 mb-1"><?php echo $_SESSION['profession'] ?></p>
                      <div class="row py-4 gy-3">
                        <div class="col-4"><strong class="d-block lh-1"><?php echo $action ?></strong><small>Action</small></div>
                        <div class="col-4"><strong class="d-block lh-1"><?php echo $adventure ?></strong><small>Adventure</small></div>
                        <div class="col-4"><strong class="d-block lh-1"><?php echo $comedy ?></strong><small>Comedy</small></div>
                      </div>
                      <div class="d-flex justify-content-between"><a class="text-gray-500 text-sm" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a><a class="text-gray-500 text-sm" href="#" target="_blank"><i class="fab fa-twitter"></i></a><a class="text-gray-500 text-sm" href="#" target="_blank"><i class="fab fa-google"></i></a><a class="text-gray-500 text-sm" href="#" target="_blank"><i class="fab fa-instagram"></i></a><a class="text-gray-500 text-sm" href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
             
              </div>
            </div>
          </section>
         
          <?php require_once "inc/adminfooter.php"  ?>