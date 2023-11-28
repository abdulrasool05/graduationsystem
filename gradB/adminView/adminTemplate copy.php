<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="adminStyling.css" rel="stylesheet" type="text/css">

    <title>Admin Template</title>
  </head>
  <body>
   
    <div class="flex-shrink-0 p-3 bg-dark shadow-lg sidebar">
        <div class="d-flex p-2 text-decoration-none">
    
            <a href = "adminDash.php" class="btn text-light fw-bold fs-3 w-100">
                GradSys 🎓
            </a>

        </div>

            <ul class="list-unstyled ps-0">
                
                
                <li class="mb-1">
                    <button class="btn btn-toggle fw-bold text-light navbarbuttons w-100 d-flex justify-content-start" data-bs-toggle="collapse" data-bs-target="#students-collapse" aria-expanded="true">
                        Students &#10507;
                    </button>
                    <div class="collapse" id="students-collapse">
                        <ul class="btn-toggle-nav">
                            <li><a href="adminStudList.php" class="text-decoration-none link-light">Student List</a></li>
                        </ul>
                    </div>
                </li>

                <li class="mb-1">
                    <button class="btn btn-toggle fw-bold text-light navbarbuttons w-100 d-flex justify-content-start" data-bs-toggle="collapse" data-bs-target="#photos-collapse" aria-expanded="true">
                        Photo &#10507;
                    </button>
                    <div class="collapse" id="photos-collapse">
                        <ul class="btn-toggle-nav">
                            <li><a href="adminPhotoUpload.php" class="text-decoration-none link-light">Upload Photos</a></li>
                            <li><a href="adminPhotoSize.php" class="text-decoration-none link-light">Resize Photos</a></li>
                            <li><a href="adminMissingPhotos.php" class="text-decoration-none link-light">Missing Photos</a></li>
                            <li><a href="adminCachePhotos.php" class="text-decoration-none link-light">Cache Photos</a></li>
                        </ul>
                    </div>
                </li>

                <li class="mb-1">
                    <button class="btn btn-toggle fw-bold text-light navbarbuttons w-100 d-flex justify-content-start" data-bs-toggle="collapse" data-bs-target="#show-collapse" aria-expanded="true">
                        Shows &#10507;
                    </button>
                    <div class="collapse" id="show-collapse">
                        <ul class="btn-toggle-nav">
                            <li><a href="adminManageShows.php" class="text-decoration-none link-light">Manage Shows</a></li>
                            <li><a href="adminSpecificShows.php" class="text-decoration-none link-light">Manage Specific Shows</a></li>
                        </ul>
                    </div>
                </li>

                <li class="mb-1">
                    <a href = "adminSlides.php" class="btn fw-bold text-light navbarbuttons w-100 d-flex justify-content-start">
                        Slideshow
                    </a>
                </li>

                <li class="mb-1">
                    <a href = "adminLog.php" class="btn fw-bold text-light navbarbuttons w-100 d-flex justify-content-start">
                        Logs
                    </a>
                </li>

                <li class="mb-1">
                    <a href = "adminConfig.php" class="btn fw-bold text-light navbarbuttons w-100 d-flex justify-content-start">
                        Config
                    </a>
                </li>

            </ul>
    
            <div class="d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true">
                <!-- <button class="btn fs-5 fw-bold text-light profileSidebar">
                    <img class="rounded-circle" src="https://i.stack.imgur.com/34AD2.jpg" width="32" height="32">
                    USER
                </button> -->

                <button class="btn btn-secondary dropdown-toggle fs-5 fw-bold text-light profileSidebar bg-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="rounded-circle" src="https://i.stack.imgur.com/34AD2.jpg" width="32" height="32">
                    USER
                </button>
                <ul class="dropdown-menu bg-light-subtle">
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>

            </div>
</div>    


<!-- START OF JAVASCRIPT -->
  <script src="https://code.jquery.com/jquery-3.6.1.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.js" crossorigin="anonymous"></script>


	<!-- ADD ANY ADDITIONAL JAVASCRIPT BELOW HERE -->


</body>
</html>
