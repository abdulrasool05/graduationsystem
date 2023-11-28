  
   <div class="flex-shrink-0 p-3 bg-dark shadow-lg sidebar">
        <div class="d-flex p-2 text-decoration-none">
    
            <a href = "adminTemplate0.php" class="btn text-light fw-bold fs-3 w-100">
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
                            <li><a href="?page=studList" class="text-decoration-none link-light">Student List</a></li>
                        </ul>
                    </div>
                </li>

                <li class="mb-1">
                    <button class="btn btn-toggle fw-bold text-light navbarbuttons w-100 d-flex justify-content-start" data-bs-toggle="collapse" data-bs-target="#photos-collapse" aria-expanded="true">
                        Photo &#10507;
                    </button>
                    <div class="collapse" id="photos-collapse">
                        <ul class="btn-toggle-nav">
                            <li><a href="?page=uploadPhotos" class="text-decoration-none link-light">Upload Photos</a></li>
                            <li><a href="?page=resizePhotos" class="text-decoration-none link-light">Resize Photos</a></li>
                            <li><a href="?page=missingPhotos" class="text-decoration-none link-light">Missing Photos</a></li>
                            <li><a href="?page=cachePhotos" class="text-decoration-none link-light">Cache Photos</a></li>
                        </ul>
                    </div>
                </li>

                <li class="mb-1">
                    <button class="btn btn-toggle fw-bold text-light navbarbuttons w-100 d-flex justify-content-start" data-bs-toggle="collapse" data-bs-target="#show-collapse" aria-expanded="true">
                        Shows &#10507;
                    </button>
                    <div class="collapse" id="show-collapse">
                        <ul class="btn-toggle-nav">
                            <li><a href="?page=manageShows" class="text-decoration-none link-light">Manage Shows</a></li>
                            <li><a href="?page=manageSpecificShows" class="text-decoration-none link-light">Manage Specific Shows</a></li>
                        </ul>
                    </div>
                </li>

                <li class="mb-1">
                    <a href = "?page=slideshow" class="btn fw-bold text-light navbarbuttons w-100 d-flex justify-content-start">
                        Slideshow
                    </a>
                </li>

                <li class="mb-1">
                    <a href = "?page=awards" class="btn fw-bold text-light navbarbuttons w-100 d-flex justify-content-start">
                        Awards
                    </a>
                </li>

                <li class="mb-1">
                    <a href = "?page=logs" class="btn fw-bold text-light navbarbuttons w-100 d-flex justify-content-start">
                        Logs
                    </a>
                </li>

                <li class="mb-1">
                    <a href = "?page=config" class="btn fw-bold text-light navbarbuttons w-100 d-flex justify-content-start">
                        Settings
                    </a>
                </li>

            </ul>


            <div class="profileSidebar">
                <a class="btn text-light w-100 d-flex justify-content-start"><?php $student = getAdminName(getEmail()); echo $student;?></a>
                <a class="btn text-light w-100 d-flex justify-content-start"><?php echo getEmail(); ?></a>
                <a class="btn fw-bold text-light navbarbuttons w-100 d-flex justify-content-start" href = "../logout.php">Logout -></a>
            </div>
</div>    

